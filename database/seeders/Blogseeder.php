<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Blogseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([

            [
            'title' => 'My First Blog Post',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel arcu vel arcu tempor finibus ut eget elit. Nam non suscipit mi. Sed ac elit vel elit faucibus faucibus.',
            'featured_image' => 'https://images.unsplash.com/photo-1481016570479-9eab6349fde7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
}
    
    


