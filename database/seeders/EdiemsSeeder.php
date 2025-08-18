<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EdiemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('datos')->insert([
            [
                "usuario_id"=>1,
                "propiedad" =>"PASSWORD EDIEMS",
                "valor"=>"dfasdfasd",
                "url"=>"https://google.com"
            ]
         ]);
    }
}
