<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pet')->insert( array(
            [
                'name' => 'ชิวาวา', 
                'type_id' => 1,
            ],
            
            [
                'name' => 'บางแก้ว', 
                'type_id' => 1,
            ],
            [
                'name' => 'เปอร์เซีย',
                'type_id' => 2,
            ],
            [
                'name' => 'ปอม',
                'type_id' => 1,
            ],

            [
                'name' => 'สก็อตติช',
                'type_id' => 2,
            ],

            [
                'name' => 'แฮมสเตอร์',
                'type_id' => 3,
            ],

            )
        );
    }
}
