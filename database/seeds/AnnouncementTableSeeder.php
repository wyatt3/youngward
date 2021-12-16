<?php

use Illuminate\Database\Seeder;
use App\Announcement;

class AnnouncementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0;$i <= 35;$i++) {
            $announcement = new Announcement([
                'title' => 'Title ' . $i,
                'content' => 'Content ' . $i,
            ]);
            $announcement->save();
        }
    }
}
