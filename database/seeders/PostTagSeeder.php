<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        for ($i = 1; $i <= 40; $i++) {

            $data[] = [
                'tag_id' => rand(1, 10),
                'post_id' => rand(1, 20)
            ];
        }
        foreach ($data as $item) {
            DB::table('post_tag')->insert($item);
        }
    }
}
