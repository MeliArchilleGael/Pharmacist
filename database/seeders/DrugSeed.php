<?php

namespace Database\Seeders;

use App\Models\Drugs;
use Illuminate\Database\Seeder;

class DrugSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Drugs::create([
           'name'=>'Bioderma',
           'slug'=>'Bioderma',
           'description'=>'Description of the drug named Bioderma',
           'quantity'=>'23',
           'price'=>'1500',
           'date_preemption'=>'2023-05-23',
           'status'=>'Available',
           'image'=>'images/product_01.png',
        ]);

        Drugs::create([
            'name'=>'Chanca Piedra',
            'slug'=>'Chanca_Piedra',
            'description'=>'Description of the drug named Chanca Piedra',
            'quantity'=>'4',
            'price'=>'2500',
            'date_preemption'=>'2024-05-20',
            'status'=>'Available',
            'image'=>'images/product_02.png',
        ]);

        Drugs::create([
            'name'=>'Umcka Cold Care',
            'slug'=>'Umcka_Cold_Care',
            'description'=>'Description of the drug named Umcka Cold Care',
            'quantity'=>'10',
            'price'=>'5000',
            'date_preemption'=>'2022-10-20',
            'status'=>'Available',
            'image'=>'images/product_03.png',
        ]);

        Drugs::create([
            'name'=>'Cetyl Pure',
            'slug'=>'Cetyl_Pure',
            'description'=>'Description of the drug named Cetyl Pure',
            'quantity'=>'14',
            'price'=>'3000',
            'date_preemption'=>'2022-12-22',
            'status'=>'Available',
            'image'=>'images/product_04.png',
        ]);
        Drugs::create([
            'name'=>'Ibuprofen',
            'slug'=>'Ibuprofen',
            'description'=>'Description of the drug named Ibuprofen',
            'quantity'=>'14',
            'price'=>'5000',
            'date_preemption'=>'2022-12-20',
            'status'=>'Available',
            'image'=>'images/product_06.png',
        ]);
    }
}
