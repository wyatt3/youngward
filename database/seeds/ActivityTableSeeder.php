<?php

use Illuminate\Database\Seeder;

use App\Activity;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0;$i < 20;$i++) {
            $event = new Activity([
                'title' => 'title' . $i,
                'date' => '2021-05-15',
                'organization_id' => 1,
                'notes' => 'Created by ActivityTableSeeder.php', 
            ]);
            $event->save();
        }
    }
}
