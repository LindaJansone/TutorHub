<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Private Math Lessons',
                'author' => 'Alice Johnson',
                'subject' => 'Mathematics',
                'grades' => '6-8',
                'price' => 20,
                'language' => 'ENG',
                'body' => 'Offering private math lessons for middle school students. Tailored to individual needs.',
        ]);

        Post::create([
            'title' => 'Privātstundas vēsturē',
                'author' => 'Janis Ozols',
                'subject' => 'History',
                'grades' => '9-12',
                'price' => '25',
                'language' => 'LV',
                'body' => 'Piedāvāju privātstundas vēsturē vidusskolas skolēniem. Personalizēta pieeja mācībām.',
        ]);

        Post::create([
            'title' => 'Literatūras privātstundas',
                'author' => 'Anna Liepa',
                'subject' => 'Literature',
                'grades' => '7-9',
                'price' => 15,
                'language' => 'LV',
                'body' => 'Privātstundas latviešu literatūrā un dzejā. Palīdzēšu sagatavoties eksāmeniem un pārbaudes darbiem.',
                
]);

        Post::create([
            'title' => 'Chemistry Tutoring',
                'author' => 'Bob Smith',
                'subject' => 'Science',
                'grades' => '10-12',
                'price' => 30,
                'language' => 'ENG',
                'body' => 'Providing comprehensive chemistry tutoring for high school students. Focus on understanding key concepts.',
            ]);

        Post::create([
            'title' => 'Physics Tutoring',
                'author' => 'Charlie Brown',
                'subject' => 'Science',
                'grades' => '9-12',
                'price' => 28,
                'language' => 'ENG',
                'body' => 'Offering basic and advanced physics tutoring for high school students. Hands-on learning approach.',
        ]);

        Post::create([
            'title' => 'Bioloģijas privātstundas',
            'author' => 'Ilze Balode',
            'subject' => 'Biology',
            'grades' => '8-10',
            'price' => 22,
            'language' => 'LV',
            'body' => 'Piedāvāju privātstundas bioloģijā. Palīdzēšu izprast sarežģītos tematus un sagatavoties pārbaudījumiem.',
            ]);
    }
}