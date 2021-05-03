<?php

use Illuminate\Database\Seeder;

use App\Event;

class eventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0;$i < 20;$i++) {
            $event = new Event([
                'title' => 'title' . $i,
                'date' => '2021-05-15',
                'organization_id' => 1,
                'notes' => 'Created by eventTableSeeder.php', 
            ]);
            $event->save();
        }
    }
}
