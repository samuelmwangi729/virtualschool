<?php

use Illuminate\Database\Seeder;
use App\User;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'samuel mwangi',
            'Gender'=>'Male',
            'pname'=>'Mr Principal',
            'email'=>'0704922042',
            'dob'=>'2020-01-30 01:42:03',
            'uid'=>'7heyts6',
            'level'=>'Secondary School',
            'isAdmin'=>'1',
            'isInd'=>'0',
            'schoolName'=>'Sample High School',
            'password'=>Hash::make('P!@#four5sam')
        ]);
    }
}
