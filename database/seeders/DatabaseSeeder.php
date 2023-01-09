<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Card;
use App\Models\debittransaction;
use App\Models\loan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nik' => '0000000000000001',
            'email' => 'andrewchris@q2.com',
            'name' => 'Andrew Christian',
            'role' => 'User',
            'email_verified_at' => date_default_timezone_get(),
            'password' => Hash::make('Andr3wQ2123!@#'),
            'active' => 1,
            'ktp' => 'image/oFwiCM3hTMMPVbCFJlDPomiWjFXa5YbRbwATEj3m.jpg',
        ]);
        Card::create([
            'money' => 101000000,
        ]);
        debittransaction::create([
            'srccard' => date("y").'00000000000001',
            'destcard' => date("y").'00000000000002',
            'nominal' => 100000,
        ]);
        debittransaction::create([
            'srccard' => date("y").'00000000000001',
            'destcard' => date("y").'00000000000003',
            'nominal' => 200000,
        ]);
        debittransaction::create([
            'srccard' => date("y").'00000000000001',
            'destcard' => date("y").'00000000000002',
            'nominal' => 500000,
        ]);
        loan::create([
            'cardnumber' => date("y").'00000000000001',
            'nominal' => 2500000,
            'totalpayment' => 2550000,
            'monthlypayment' => 212500,
            'installment' => 12,
            'status' => 'Aproved',
        ]);
        User::create([
            'nik' => '0000000000000002',
            'email' => 'dennis@q2.com',
            'name' => 'Dennis',
            'role' => 'User',
            'email_verified_at' => date_default_timezone_get(),
            'password' => Hash::make('D3nn1sQ2123!@#'),
            'active' => 1,
            'ktp' => 'image/oFwiCM3hTMMPVbCFJlDPomiWjFXa5YbRbwATEj3m.jpg',
        ]);
        Card::create([
            'money' => 102000000,
        ]);
        debittransaction::create([
            'srccard' => date("y").'00000000000002',
            'destcard' => date("y").'00000000000001',
            'nominal' => 110000,
        ]);
        debittransaction::create([
            'srccard' => date("y").'00000000000002',
            'destcard' => date("y").'00000000000003',
            'nominal' => 220000,
        ]);
        debittransaction::create([
            'srccard' => date("y").'00000000000002',
            'destcard' => date("y").'00000000000003',
            'nominal' => 50000,
        ]);
        loan::create([
            'cardnumber' => date("y").'00000000000002',
            'nominal' => 3000000,
            'totalpayment' => 3060000,
            'monthlypayment' => 225000,
            'installment' => 12,
            'status' => 'Waiting Aproval',
        ]);
        User::create([
            'nik' => '0000000000000003',
            'email' => 'vanessaratana@q2.com',
            'name' => 'Vanessa Rattana',
            'role' => 'User',
            'email_verified_at' => date_default_timezone_get(),
            'password' => Hash::make('Van3ssaQ2123!@#'),
            'active' => 1,
            'ktp' => 'image/oFwiCM3hTMMPVbCFJlDPomiWjFXa5YbRbwATEj3m.jpg',
        ]);
        Card::create([
            'money' => 103000000,
        ]);
        debittransaction::create([
            'srccard' => date("y").'00000000000003',
            'destcard' => date("y").'00000000000001',
            'nominal' => 111000,
        ]);
        debittransaction::create([
            'srccard' => date("y").'00000000000003',
            'destcard' => date("y").'00000000000002',
            'nominal' => 225000,
        ]);
        debittransaction::create([
            'srccard' => date("y").'00000000000003',
            'destcard' => date("y").'00000000000001',
            'nominal' => 50000,
        ]);
        loan::create([
            'cardnumber' => date("y").'00000000000003',
            'nominal' => 3000000,
            'totalpayment' => 3060000,
            'monthlypayment' => 225000,
            'installment' => 12,
            'status' => 'Waiting Aproval',
        ]);
        User::create([
            'nik' => 'admin',
            'email' => 'avw@admin.com',
            'name' => 'admin',
            'role' => 'Admin',
            'email_verified_at' => date_default_timezone_get(),
            'password' => Hash::make('Adm1nQ2123!@#'),
            'active' => 1,
        ]);
    }
}
