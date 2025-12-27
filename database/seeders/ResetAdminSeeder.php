<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class ResetAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::where('email', 'dev.neerajrekwar2@gmail.com')->first();

        if ($admin) {
            $admin->name = 'admin';
            $admin->email = 'admin2@flightfaremart.com';
            $admin->password = Hash::make('f;jsad4');
            $admin->save();
        }
    }
}