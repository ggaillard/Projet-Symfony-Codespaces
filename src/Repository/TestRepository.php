<?php
namespace App\Repository;

use App\Entity\Category;
use App\Entity\FortuneCookie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query;


 class TestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FortuneCookie::class);
    }


    /**
     * Exécute une requête SQL de test et retourne le résultat
     *
     * @return array Les noms des catégories.
     */
    public function testDQL(): array
{
    $qb = $this->createQueryBuilder('fc')
        ->select('fc.id', 'fc.fortune')
        ->Join('fc.category', 'c')
        ->where('c.id = :categoryId')
        ->setParameter('categoryId', 1);

    $query = $qb->getQuery();
    dump($query->getDQL()); // Ajoutez cette ligne pour voir la requête DQL

    return $query->getResult();
}
    

    /**
     * Exécute une requête SQL de test et retourne les noms des catégories en utilisant query\ResultSetMapping.
     *
     * @return array Les noms des catégories.
     */
    public function testSQL(): array
    {
        $entityManager = $this->getEntityManager();


    // Définir le ResultSetMapping en fonction de votre entité Category
    $rsm = new ResultSetMapping();
    $rsm->addEntityResult('App\Entity\FortuneCookie', 'fc');
    $rsm->addFieldResult('fc', 'id', 'id');
    $rsm->addFieldResult('fc', 'fortune', 'fortune');



        // Définir la requête SQL
        $sql = 'SELECT fc.id, fc.fortune 
                FROM fortune_cookie fc
                JOIN category c ON fc.category_id = c.id
                WHERE c.id = :categoryId';

        $nativeQuery = $entityManager->createNativeQuery($sql, $rsm);
        $nativeQuery->setParameter('categoryId', 1);
        dump($sql);
        return $nativeQuery->getResult(Query::HYDRATE_ARRAY);

    }
}   
