<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Activity;
use App\Media;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 4;$i <= 4;$i++) {
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
