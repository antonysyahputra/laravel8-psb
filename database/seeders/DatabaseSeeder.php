<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use App\Models\Unit;
use App\Models\Employer;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
            //     'name' => 'Antony',
            //     'email' => 'anto@gmail.com',
            //     'password' => bcrypt('123456')
            // ]);
            
            // User::create([
                //     'name' => 'Nurita',
                //     'email' => 'nuri@gmail.com',
                //     'password' => bcrypt('123456')
                // ]);
                
        Unit::create([
            "name" => "YAYASAN",
            "slug" => "yayasan",
        ]);
        Unit::create([
            "name" => "RA",
            "slug" => "ra",
        ]);

        Unit::create([
            "name" => "SD",
            "slug" => "sd",
        ]);

        Unit::create([
            "name" => "SMP",
            "slug" => "smp",
        ]);

        Unit::create([
            "name" => "SMA",
            "slug" => "sma",
        ]);

        Unit::create([
            "name" => "TAHFIZH",
            "slug" => "tahfizh",
        ]);

        Employee::factory(150)->create();

        // Employee::create([
        //     "name" => "Andi Syahputra Nst",
        //     "username" => "andi-syahputra-nst",
        //     "no_hp" => "085398769876",
        //     "unit_id" => 1,
        // ]);

        // Employee::create([
        //     "name" => "Olviani",
        //     "username" => "olviani",
        //     "no_hp" => "085398769840",
        //     "unit_id" => 2,
        // ]);

        // Employee::create([
        //     "name" => "Pandapotan Limbong",
        //     "username" => "pandapotan-limbong",
        //     "no_hp" => "085398769436",
        //     "unit_id" => 3,
        // ]);
        // Employee::create([
        //     "name" => "Ali Naiah Siregar",
        //     "username" => "ali-nafiah-siregar",
        //     "no_hp" => "085398769876",
        //     "unit_id" => 4,
        // ]);
        // Employee::create([
        //     "name" => "Nur Fadilla Sinaga",
        //     "username" => "nur-fadilla-sinaga",
        //     "no_hp" => "085323769876",
        //     "unit_id" => 5,
        // ]);
        // Employee::create([
        //     "name" => "Saadah Mukhtar",
        //     "username" => "saadah-mukhtar",
        //     "no_hp" => "085398769876",
        //     "unit_id" => 6,
        // ]);
    }
}
