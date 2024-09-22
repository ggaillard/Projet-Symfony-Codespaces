<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\FortuneCookieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TestRepository;

class FortuneController extends AbstractController
{
    
    #[Route('/', name: 'app_homepage')]
    public function index(Request $request, CategoryRepository $categoryRepository, EntityManagerInterface $entityManager): Response
    {
        // Enabled globally in the doctrine.yaml config
        //$entityManager->getFilters()
        //    ->enable('fortuneCookie_discontinued')
        //    ->setParameter('discontinued', true);
        $searchTerm = $request->query->get('q');
        if ($searchTerm) {
            $categories = $categoryRepository->search($searchTerm);
        } else {
            $categories = $categoryRepository->findAllOrdered();
        }

        return $this->render('fortune/homepage.html.twig',[
            'categories' => $categories
        ]);
    }

    #[Route('/category/{id}', name: 'app_category_show')]
    public function showCategory(int $id, CategoryRepository $categoryRepository, FortuneCookieRepository $fortuneCookieRepository): Response
    {
        $category = $categoryRepository->findWithFortunesJoin($id);
        if (!$category) {
            throw $this->createNotFoundException('Category not found!');
        }
        $stats = $fortuneCookieRepository->countNumberPrintedForCategory($category);

        return $this->render('fortune/showCategory.html.twig',[
            'category' => $category,
            'fortunesPrinted' => $stats->fortunesPrinted,
            'fortunesAverage' => $stats->fortunesAverage,
            'categoryName' => $stats->categoryName,
        ]);
    }
    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        $url = $this->generateUrl('app_about');
        return $this->render('fortune/about.html.twig');
    }
    #[Route('/categories-by-icon/{iconKey}', name: 'app_categories_by_icon')]
public function showCategoriesByIcon(string $iconKey, CategoryRepository $categoryRepository): Response
{
    $categories = $categoryRepository->findBy(['iconKey' => $iconKey]);

    return $this->render('fortune/categoriesByIcon.html.twig', [
        'categories' => $categories,
        'iconKey' => $iconKey,
    ]);
}
#[Route('/redirect-home', name: 'app_redirect_home')]
     public function redirectHome(): Response
     {
         return $this->redirectToRoute('app_homepage');
     }

#[Route('/handle-post', name: 'app_handle_post', methods: ['POST'])]
     public function handlePost(): Response
     {
         // Traitement de la requête POST
         return $this->render('fortune/handle_post.html.twig');
     }
     #[Route('/tests', name: 'app_tests')]
     public function tests(TestRepository $testRepository): Response
     {
         $testResult1 = $testRepository->testDQL();
         $testResult2 = $testRepository->testSQL();
         dump($testResult1, $testResult2);
         return $this->render('fortune/tests.html.twig',[
             'testResult1' => $testResult1,
             'testResult2' => $testResult2,
         ]);
     }
 
     


}
