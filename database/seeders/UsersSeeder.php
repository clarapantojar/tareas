<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = new User();
        $user->name = "Administrador";
        $user->email = "admin@admin.com";
        $user->password = Hash::make("string_de_contrasenya");
        $user->save();//para registrar en la bbdd.
    }
}
