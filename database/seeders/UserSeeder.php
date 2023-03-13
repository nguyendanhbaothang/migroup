<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = new User();
        $item->name = "Nguyễn Danh Bảo Thắng";
        $item->email = "thang@gmail.com";
        $item->password = Hash::make('123456');
        $item->address = 'Quảng Trị';
        $item->phone  = "0392292507";
        $item->image ='thang.jpg';
        $item->gender ='Nam';
        $item->birthday ='2003/11/25';
        $item->group_id ='1';
        // $item->image ='thang.ipg';
        $item->save();
    }
}
