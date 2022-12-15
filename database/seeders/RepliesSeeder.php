<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Replies;

class RepliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            ['tittle'=>'stud','body'=>'kjhjk','mails_id'=>'524','advisor_id'=>'123456']

            ];
            Replies::insert($users);
    }
}
