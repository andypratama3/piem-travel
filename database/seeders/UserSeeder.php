<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'superadmin',
            'admin',
            'user',
        ];

        foreach ($roles as $role => $value) {
            $roleName = $value;
            $role[$role] = Role::whereSlug(Str::slug($roleName))->first();

        }
    }
}
