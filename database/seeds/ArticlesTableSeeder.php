<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\String_;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([[
            'name'=>'Healthcare'],

                ['name'=>'Finances'],

                ['name'=>'Sports']]
         );

    }
}
