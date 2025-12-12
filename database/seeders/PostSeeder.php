<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Lancement officiel de Hazina Mining Hub',
                'slug' => 'lancement-officiel-hazina-mining-hub',
                'content' => "C'est avec une immense fierté que nous annonçons le lancement officiel de Hazina Mining Hub, une initiative pionnière destinée à transformer le paysage minier de la République Démocratique du Congo.

Notre mission est claire : créer un écosystème inclusif où les acteurs locaux peuvent prospérer. Nous croyons fermement que la richesse de notre sous-sol doit avant tout profiter aux communautés locales et au développement national.

À travers nos quatre pôles d'excellence - Hazina Lab, Training, Connect et Green - nous offrons une gamme complète de services pour accompagner les entrepreneurs, former les talents et promouvoir des pratiques durables.

Rejoignez-nous dans cette aventure pour bâtir ensemble l'avenir minier du Congo.",
                'image' => '/images/hero-bg.png',
                'published_at' => now(),
            ],
            [
                'title' => 'La sous-traitance : un levier de croissance',
                'slug' => 'sous-traitance-levier-croissance',
                'content' => "La loi sur la sous-traitance dans le secteur privé offre des opportunités inédites pour les PME congolaises. Cependant, pour saisir ces opportunités, il est crucial de se structurer et de répondre aux standards internationaux.

Chez Hazina Mining Hub, nous accompagnons les entreprises locales dans leur mise à niveau. De la conformité administrative à l'excellence opérationnelle, nous vous donnons les clés pour devenir des partenaires incontournables des grandes entreprises minières.

Il ne s'agit pas seulement de remplir des quotas, mais de créer de la valeur ajoutée réelle et durable.",
                'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Innovation technologique dans les mines',
                'slug' => 'innovation-technologique-mines',
                'content' => "L'industrie minière est en pleine mutation technologique. L'automatisation, l'intelligence artificielle et l'analyse de données transforment les méthodes d'exploration et d'exploitation.

Hazina Lab se positionne à la pointe de cette innovation. Nous collaborons avec des startups et des chercheurs pour développer des solutions adaptées aux réalités du terrain congolais.

Notre objectif est de favoriser l'émergence d'une 'Mine 4.0' en RDC, plus sûre, plus productive et plus respectueuse de l'environnement.",
                'image' => 'https://images.unsplash.com/photo-1518558997970-4ddc236affcd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80',
                'published_at' => now()->subDays(5),
            ],
        ];

        foreach ($posts as $post) {
            \App\Models\Post::create($post);
        }
    }
}
