<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\education_qualifications;

class Education extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            ['institution'=>'Aiub','graduate_at'=>'Doloribus illum aut','added_at'=>'12/4/2022','advisor_id'=>'2145']

            ];
            education_qualifications::insert($users);
    }
}
