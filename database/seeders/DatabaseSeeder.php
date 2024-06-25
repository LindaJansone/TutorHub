<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users = [
            ['name' => 'Valters', 'email' => 'john@gmail.com', 'password' => Hash::make('password')],
            ['name' => 'Anna', 'email' => 'jane@gmail.com', 'password' => Hash::make('password')],
            ['name' => 'Peteris', 'email' => 'Peteris@inbox.lv', 'password' => Hash::make('password')],
            ['name' => 'Ieva', 'email' => 'Ieva@inbox.lv', 'password' => Hash::make('password')],
            ['name' => 'Janis', 'email' => 'Janis@inbox.lv', 'password' => Hash::make('password')],
            ['name' => 'Linda', 'email' => 'a@a.lv', 'password' => Hash::make('aaa')],
            ['name' => 'Dainis', 'email' => 'javascript_hater@gmail.com', 'password' => Hash::make('password')],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $Peteris = User::where('name', 'Peteris')->first();
        $Ieva = User::where('name', 'Ieva')->first();
        $Janis = User::where('name', 'Janis')->first();
        $Valters = User::where('name', 'Valters')->first();
        $Anna = User::where('name', 'Anna')->first();
        $Dainis = User::where('name', 'Dainis')->first();

        Post::create([
            'title' => 'Private Math Lessons',
                'author_id' =>  $Ieva->id,
                'subject' => 'Mathematics',
                'grades' => '6-8',
                'price' => 20,
                'language' => 'ENG',
                'body' => 'Offering private math lessons for middle school students. Tailored to individual needs.',
        ]);

        Post::create([
            'title' => 'Privātstundas vēsturē',
                'author_id' =>  $Peteris->id,
                'subject' => 'History',
                'grades' => '9-12',
                'price' => '25',
                'language' => 'LV',
                'body' => 'Piedāvāju privātstundas vēsturē vidusskolas skolēniem. Personalizēta pieeja mācībām.',
        ]);

        Post::create([
            'title' => 'Literatūras privātstundas',
                'author_id' =>  $Janis->id,
                'subject' => 'Literature',
                'grades' => '7-9',
                'price' => 15,
                'language' => 'LV',
                'body' => 'Privātstundas latviešu literatūrā un dzejā. Palīdzēšu sagatavoties eksāmeniem un pārbaudes darbiem.',
                
]);

        Post::create([
            'title' => 'Chemistry Tutoring',
                'author_id' => $Valters->id,
                'subject' => 'Science',
                'grades' => '10-12',
                'price' => 30,
                'language' => 'ENG',
                'body' => 'Providing comprehensive chemistry tutoring for high school students. Focus on understanding key concepts.',
            ]);

        Post::create([
            'title' => 'Physics Tutoring',
                'author_id' => $Anna->id,
                'subject' => 'Science',
                'grades' => '9-12',
                'price' => 28,
                'language' => 'ENG',
                'body' => 'Offering basic and advanced physics tutoring for high school students. Hands-on learning approach.',
        ]);

        Post::create([
            'title' => 'Bioloģijas privātstundas',
            'author_id' => $Dainis->id,
            'subject' => 'Biology',
            'grades' => '8-10',
            'price' => 22,
            'language' => 'LV',
            'body' => 'Piedāvāju privātstundas bioloģijā. Palīdzēšu izprast sarežģītos tematus un sagatavoties pārbaudījumiem.',
            ]);
    }
}