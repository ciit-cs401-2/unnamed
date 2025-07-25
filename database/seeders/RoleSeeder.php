<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            "role_name" => "A",
            "description" => "Admin"
        ]);
        Role::create([
            "role_name" => "C",
            "description" => "Contributor"
        ]);
        Role::create([
            "role_name" => "S",
            "description" => "Subscriber"
        ]);
    }
}
