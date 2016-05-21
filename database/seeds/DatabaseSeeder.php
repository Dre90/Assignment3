<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = array(
            ['postnr' => 1001, 'placeName' => 'Oslo'],
            ['postnr' => 1300, 'placeName' => 'Sandvika'],
            ['postnr' => 1400, 'placeName' => 'Ski'],
            ['postnr' => 1501, 'placeName' => 'Moss'],
            ['postnr' => 1601, 'placeName' => 'Fredrikstad']
        );

        $users = array(
            ['name' => 'Ola Norman', 'email' => 'test@test.no', 'password' => bcrypt('password'), 'address' => 'Skolegata', 'postnr' => 2819, 'phonenumber' => 12345678, 'userImage' => 'test.jpg'],
            ['name' => 'Kari Norman', 'email' => 'test2@test.no', 'password' => bcrypt('password'), 'address' => 'Parkveien', 'postnr' => 7810, 'phonenumber' => 87654321, 'userImage' => 'test.jpg']
        );

        $categories = array(
            ['categoryName' => 'Antikviteter og kunst'],
            ['categoryName' => 'Dyr og utstyr'],
            ['categoryName' => 'Elektronikk og hvitevarer'],
            ['categoryName' => 'Fritid, hobby og underholdning'],
            ['categoryName' => 'Hage, oppussing og hus'],
            ['categoryName' => 'Klær, kosmetikk og accessoirer'],
            ['categoryName' => 'Møbler og interiør'],
            ['categoryName' => 'Sport og friluftsliv'],
            ['categoryName' => 'Utstyr til bil, båt og MC']

        );

        $items = array(
            ['title' => 'Lampe', 'categoryId' => 3, 'description' => 'En veldig fin lampe', 'itemImage' => 'test.jpg', 'userId' => 1, 'givenAway' => false],
            ['title' => 'Fiskestang', 'categoryId' => 8, 'description' => 'En veldig fin og lite brukt iskestang', 'itemImage' => 'test.jpg', 'userId' => 1, 'givenAway' => false],
            ['title' => 'Bord', 'categoryId' => 7, 'description' => 'Et veldig fint bord', 'itemImage' => 'test.jpg', 'userId' => 2, 'givenAway' => false]
        );

        $conversations = array(
            ['interestedId' => '2', 'ownerId' => '1', 'itemId' => '1'],
            ['interestedId' => '1', 'ownerId' => '2', 'itemId' => '3']
        );

        $messages = array(
            ['body' => 'First sample text in conversation one', 'conversationId' => '1'],
            ['body' => 'Second sample text in conversation one', 'conversationId' => '1'],
            ['body' => 'First sample text in conversation two', 'conversationId' => '2'],
            ['body' => 'Second sample text in conversation two', 'conversationId' => '2'],
            ['body' => 'Third sample text in conversation two', 'conversationId' => '2']
        );

        DB::table('posts')->delete();
        $this->command->info('Post table deleted!');

        DB::table('users')->delete();
        $this->command->info('Users table deleted!');

        DB::table('items')->delete();
        $this->command->info('Items table deleted!');

        DB::table('categories')->delete();
        $this->command->info('Category table deleted!');

        DB::table('conversations')->delete();
        $this->command->info('Post table deleted!');

        DB::table('messages')->delete();
        $this->command->info('Post table deleted!');




        DB::table('posts')->insert($posts);
        $this->command->info('Post table seeded!');

        DB::table('users')->insert($users);
        $this->command->info('Users table seeded!');

        DB::table('categories')->insert($categories);
        $this->command->info('Category table seeded!');

        DB::table('conversations')->insert($conversations);
        $this->command->info('Items table seeded!');

        DB::table('messages')->insert($messages);
        $this->command->info('Items table seeded!');

    }
}
