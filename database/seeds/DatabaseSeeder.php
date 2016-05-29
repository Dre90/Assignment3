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
            ['postnr' => 1337, 'placeName' => 'Sandvika'],
            ['postnr' => 1400, 'placeName' => 'Ski'],
            ['postnr' => 1501, 'placeName' => 'Moss'],
            ['postnr' => 1601, 'placeName' => 'Fredrikstad']
        );

        $users = array(
            ['name' => 'Ola Norman', 'email' => 'test@test.no', 'password' => bcrypt('password'), 'address' => 'Jongsåsveien 2 F', 'postnr' => 1337 , 'phonenumber' => 12345678, 'userImage' => 'default.jpg'],
            ['name' => 'Kari Norman', 'email' => 'test2@test.no', 'password' => bcrypt('password'), 'address' => 'Nordbyveien 122', 'postnr' => 1400, 'phonenumber' => 87654321, 'userImage' => 'default.jpg']
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
            ['title' => 'Lampe', 'categoryId' => 3, 'description' => 'En veldig fin lampe', 'itemImage' => 'Lampe_empire_stil.jpg', 'userId' => 1, 'givenAway' => false, 'created_at' => '2016-05-22 12:08:24', 'updated_at' => '2016-05-22 12:08:24'],
            ['title' => 'Fiskestang', 'categoryId' => 8, 'description' => 'En veldig fin og lite brukt iskestang', 'itemImage' => 'fiskestang.jpg', 'userId' => 1, 'givenAway' => false, 'created_at' => '2016-05-22 12:08:24', 'updated_at' => '2016-05-22 12:08:24'],
            ['title' => 'Bord', 'categoryId' => 7, 'description' => 'Et veldig fint bord', 'itemImage' => 'bord.jpg', 'userId' => 2, 'givenAway' => false, 'created_at' => '2016-05-22 12:08:24', 'updated_at' => '2016-05-22 12:08:24']
        );

        $conversations = array(
            ['interestedId' => 2, 'ownerId' => 1, 'itemId' => 1],
            ['interestedId' => 1, 'ownerId' => 2, 'itemId' => 2]
        );

        $messages = array(
            ['body' => 'First sample text in conversation one', 'conversationId' => 1, 'userId' => 1],
            ['body' => 'Second sample text in conversation one', 'conversationId' => 1, 'userId' => 2],
            ['body' => 'First sample text in conversation two', 'conversationId' => 2, 'userId' => 2],
            ['body' => 'Second sample text in conversation two', 'conversationId' => 2, 'userId' => 1],
            ['body' => 'Third sample text in conversation two', 'conversationId' => 2, 'userId' => 2]
        );

        DB::table('messages')->delete();
        $this->command->info('Messages table deleted!');

        DB::table('conversations')->delete();
        $this->command->info('Conversations table deleted!');

        DB::table('items')->delete();
        $this->command->info('Items table deleted!');

        DB::table('categories')->delete();
        $this->command->info('Category table deleted!');

        DB::table('users')->delete();
        $this->command->info('Users table deleted!');

        DB::table('posts')->delete();
        $this->command->info('Post table deleted!');



        DB::table('posts')->insert($posts);
        $this->command->info('Post table seeded!');

        DB::table('users')->insert($users);
        $this->command->info('Users table seeded!');

        DB::table('categories')->insert($categories);
        $this->command->info('Category table seeded!');

        DB::table('items')->insert($items);
        $this->command->info('Items table seeded!');

        DB::table('conversations')->insert($conversations);
        $this->command->info('Conversations table seeded!');

        DB::table('messages')->insert($messages);
        $this->command->info('Messages table seeded!');

    }
}
