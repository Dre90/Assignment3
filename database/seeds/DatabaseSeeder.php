<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            ['postnr' => 1001, 'placeName' => 'Oslo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['postnr' => 1337, 'placeName' => 'Sandvika', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['postnr' => 1400, 'placeName' => 'Ski', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['postnr' => 1501, 'placeName' => 'Moss', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['postnr' => 1601, 'placeName' => 'Fredrikstad', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        );

        $users = array(
            ['name' => 'Ola Norman', 'email' => 'test@test.no', 'password' => bcrypt('password'), 'address' => 'Jongsåsveien 2 F', 'postnr' => 1337 , 'phonenumber' => 12345678, 'userImage' => 'default.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kari Norman', 'email' => 'test2@test.no', 'password' => bcrypt('password'), 'address' => 'Nordbyveien 122', 'postnr' => 1400, 'phonenumber' => 87654321, 'userImage' => 'default.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        );

        $categories = array(
            ['categoryName' => 'Antikviteter og kunst', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['categoryName' => 'Dyr og utstyr', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['categoryName' => 'Elektronikk og hvitevarer', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['categoryName' => 'Fritid, hobby og underholdning', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['categoryName' => 'Hage, oppussing og hus', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['categoryName' => 'Klær, kosmetikk og accessoirer', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['categoryName' => 'Møbler og interiør', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['categoryName' => 'Sport og friluftsliv', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['categoryName' => 'Utstyr til bil, båt og MC', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]

        );

        $items = array(
            ['title' => 'Lampe', 'categoryId' => 3, 'description' => 'En veldig fin lampe. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tristique ex ligula, ut ullamcorper lacus venenatis quis. Sed placerat scelerisque tristique. Integer mollis consequat felis id tincidunt. Donec maximus venenatis ultrices. Fusce felis mauris, tincidunt eget gravida eu, dictum vel enim. Curabitur vitae metus porttitor sapien hendrerit accumsan id ut leo. Phasellus in accumsan neque. Donec sollicitudin auctor mi condimentum tristique. Nam consequat turpis a quam sollicitudin pretium. Sed vestibulum fermentum lectus eget finibus. Curabitur condimentum rutrum eros non gravida. Suspendisse auctor tellus et aliquet dictum. Pellentesque hendrerit ut dui ut sodales. Duis sit amet lorem turpis.', 'itemImage' => 'Lampe_empire_stil.jpg', 'userId' => 1, 'givenAway' => false, 'created_at' => '2016-05-22 12:08:24', 'updated_at' => '2016-05-22 12:08:24'],
            ['title' => 'Fiskestang', 'categoryId' => 8, 'description' => 'En veldig fin og lite brukt iskestang. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tristique ex ligula, ut ullamcorper lacus venenatis quis. Sed placerat scelerisque tristique. Integer mollis consequat felis id tincidunt. Donec maximus venenatis ultrices. Fusce felis mauris, tincidunt eget gravida eu, dictum vel enim. Curabitur vitae metus porttitor sapien hendrerit accumsan id ut leo. Phasellus in accumsan neque. Donec sollicitudin auctor mi condimentum tristique. Nam consequat turpis a quam sollicitudin pretium. Sed vestibulum fermentum lectus eget finibus. Curabitur condimentum rutrum eros non gravida. Suspendisse auctor tellus et aliquet dictum. Pellentesque hendrerit ut dui ut sodales. Duis sit amet lorem turpis.', 'itemImage' => 'fiskestang.jpg', 'userId' => 1, 'givenAway' => false, 'created_at' => '2016-05-22 12:08:24', 'updated_at' => '2016-05-22 12:08:24'],
            ['title' => 'Bord', 'categoryId' => 7, 'description' => 'Et veldig fint bord. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tristique ex ligula, ut ullamcorper lacus venenatis quis. Sed placerat scelerisque tristique. Integer mollis consequat felis id tincidunt. Donec maximus venenatis ultrices. Fusce felis mauris, tincidunt eget gravida eu, dictum vel enim. Curabitur vitae metus porttitor sapien hendrerit accumsan id ut leo. Phasellus in accumsan neque. Donec sollicitudin auctor mi condimentum tristique. Nam consequat turpis a quam sollicitudin pretium. Sed vestibulum fermentum lectus eget finibus. Curabitur condimentum rutrum eros non gravida. Suspendisse auctor tellus et aliquet dictum. Pellentesque hendrerit ut dui ut sodales. Duis sit amet lorem turpis.', 'itemImage' => 'bord.jpg', 'userId' => 2, 'givenAway' => false, 'created_at' => '2016-05-22 12:08:24', 'updated_at' => '2016-05-22 12:08:24']
        );

        $conversations = array(
            ['interestedId' => 2, 'ownerId' => 1, 'itemId' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['interestedId' => 1, 'ownerId' => 2, 'itemId' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        );

        $messages = array(
            ['body' => 'First sample text in conversation one', 'conversationId' => 1, 'userId' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['body' => 'Second sample text in conversation one', 'conversationId' => 1, 'userId' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['body' => 'First sample text in conversation two', 'conversationId' => 2, 'userId' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['body' => 'Second sample text in conversation two', 'conversationId' => 2, 'userId' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['body' => 'Third sample text in conversation two', 'conversationId' => 2, 'userId' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
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
