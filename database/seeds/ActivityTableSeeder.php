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
        for($i = 1;$i <= 12;$i++) {
            $event = new Activity([
                'title' => 'title' . $i,
                'date' => "2022-{$i}-15",
                'organization_id' => 1,
                'notes' => 'Created by ActivityTableSeeder.php', 
            ]);
            $event->save();
        }
    }
}
