<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LibrarianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Librarian',
            'password' => bcrypt('password'),
            'email' => 'librarian@librarian.com',
            'phone' => '01915151681',
            'role' => 'librarian',
        ]);
    }
}
