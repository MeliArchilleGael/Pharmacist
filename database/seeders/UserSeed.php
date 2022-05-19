<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Pharmacist',
            'email' => 'pharmacist@pharma.com',
            'password' => Hash::make('password'),
            'telephone' => '+237 698 458 120',
            'address' => 'Baffousam',
            'role_id' => '1',
        ]);

        User::create([
            'name' => 'Customer 1',
            'email' => 'customer1@pharma.com',
            'password' => Hash::make('password'),
            'telephone' => '+237 689 451 895',
            'address' => 'Bamenda',
        ]);
        User::create([
            'name' => 'Customer 2',
            'email' => 'customer2@pharma.com',
            'password' => Hash::make('password'),
            'telephone' => '+237 678 451 481',
            'address' => 'Bamenda',
        ]);

        Customer::create([
            'name' => 'Customer 1',
            'email' => 'customer1@pharma.com',
            'password' => Hash::make('password'),
            'telephone' => '+237 689 451 895',
            'address' => 'Bamenda',
        ]);
        Customer::create([
            'name' => 'Customer 2',
            'email' => 'customer2@pharma.com',
            'password' => Hash::make('password'),
            'telephone' => '+237 678 451 481',
            'address' => 'Bamenda',
        ]);
    }
}
