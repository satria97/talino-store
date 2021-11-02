<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Schema\Index;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 5) as $index) {
            DB::table('categories')->insert([
                'nama' => 'Kategori ' . $index
            ]);
        }
    }
}
