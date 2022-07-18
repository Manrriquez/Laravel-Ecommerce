<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;


class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            [
                'id'=>1,
                'name'=>'UserAdmin',
                'type'=>'admin',
                'vendor_id'=>0,
                'mobile'=>'11982772332',
                'email'=>'admin@gmail.com',
                'password'=>'$2a$12$JpBNIxfdv3KYlebVbhhhAOLheABu8hS.CuaY4pA1hFcP83ART3MqW',
                'image'=>'',
                'status'=>1,
            ],
        ];
        
        Admin::insert($adminRecords);
    }
}
