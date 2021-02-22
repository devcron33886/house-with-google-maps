<?php

namespace Database\Seeders;

use App\Models\TaskTag;
use Illuminate\Database\Seeder;

class TaskTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskTag::factory()->times(20)->create();
    }
}
