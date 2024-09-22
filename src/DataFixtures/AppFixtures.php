<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\FortuneCookieFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * Cette méthode charge des données de test dans la base de données.
     */
    public function load(ObjectManager $manager): void
    {
        // Crée une catégorie "Job" avec des fortune cookies associés
        $jobCategory = CategoryFactory::new()->create([
            'name' => 'Travail',
            'iconKey' => 'fa-dollar',
        ]);
        foreach ([
            'Il serait préférable de rester discret pour le moment.',
            '404 Fortune non trouvée. Abandon, Réessayer, Ignorer ?',
            'Tu ris maintenant, attends d\'être à la maison.',
            'Si ton travail n\'est pas terminé, accuse l\'ordinateur.',
        ] as $fortune) {
            FortuneCookieFactory::new()->create([
                'fortune' => $fortune,
                'category' => $jobCategory,
            ]);
        }

        // Crée une catégorie "Lunch" (Déjeuner) avec des fortune cookies associés
        $lunchCategory = CategoryFactory::new()->create([
            'name' => 'Déjeuner',
            'iconKey' => 'fa-utensils',
        ]);
        foreach ([
            'Tu auras à nouveau faim dans une heure.',
            'Les vampires frapperont bientôt si tu ne commandes pas à nouveau.',
            'Un joli gâteau t\'attend.',
            'Attention : ne mange pas ta fortune.',
        ] as $fortune) {
            FortuneCookieFactory::new()->create([
                'fortune' => $fortune,
                'category' => $lunchCategory,
            ]);
        }

        // Crée une catégorie "Proverbes" avec des fortune cookies associés
        $proverbCategory = CategoryFactory::new()->create([
            'name' => 'Proverbes',
            'iconKey' => 'fa-quote-left',
        ]);
        foreach ([
            'Une conclusion est simplement l\'endroit où tu as arrêté de réfléchir.',
            'Le cookie dit : "Tu me fais vraiment rire."',
            'Lorsque tu presses une orange, du jus d\'orange en sort. Parce que c\'est ce qu\'il y a à l\'intérieur.',
        ] as $fortune) {
            FortuneCookieFactory::new()->create([
                'fortune' => $fortune,
                'category' => $proverbCategory,
            ]);
        }

        // Crée une catégorie "Animaux de compagnie" avec des fortune cookies associés
        $petsCategory = CategoryFactory::new()->create([
            'name' => 'Animaux de compagnie',
            'iconKey' => 'fa-paw',
        ]);
        foreach ([
            'Il n\'y a pas de chat ordinaire.',
            'Ce n\'était pas du poulet.',
        ] as $fortune) {
            FortuneCookieFactory::new()->create([
                'fortune' => $fortune,
                'category' => $petsCategory,
            ]);
        }

        // Crée une catégorie "Amour" avec des fortune cookies associés
        $loveCategory = CategoryFactory::new()->create([
            'name' => 'Amour',
            'iconKey' => 'fa-heart',
        ]);
        foreach ([
            'Un extraterrestre de quelque sorte apparaîtra bientôt devant toi !',
            'T\'as-t-on dit que tes jambes étaient fatiguées ? Tu as occupé l\'esprit de quelqu\'un toute la journée.',
            'Cours.',
        ] as $fortune) {
            FortuneCookieFactory::new()->create([
                'fortune' => $fortune,
                'category' => $loveCategory,
            ]);
        }

        // Crée une catégorie "Nombre chanceux" avec des fortune cookies associés
        $luckyNumberCategory = CategoryFactory::new()->create([
            'name' => 'Nombre chanceux',
            'iconKey' => 'fa-clover',
        ]);
        foreach ([
            42,
            12,
            '10^2',
            'Jar Jar Binks',
            'Pi',
        ] as $fortune) {
            FortuneCookieFactory::new()->create([
                'fortune' => $fortune,
                'category' => $luckyNumberCategory,
            ]);
        }
    }
}
