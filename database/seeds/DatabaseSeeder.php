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
//         $this->call(UsersTableSeeder::class);
//          $this->call(ContentsTableSeeder::class);
//        $this->call(ZadiaksTableSeeder::class);
//         $this->call(CompatibilityHoroscopesTableSeeder::class);
         $this->call(ContnetsTableMinimalSeeder::class);
    }
}
