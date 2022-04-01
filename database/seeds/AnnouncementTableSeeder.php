<?php

use Illuminate\Database\Seeder;
use App\Announcement;
use App\Media;

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
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fermentum urna sed eros porta, id pretium velit accumsan. Quisque finibus nisi vitae tempus finibus. Aliquam imperdiet rutrum leo. Praesent non feugiat ex, in dapibus eros. Suspendisse bibendum nisl quis mi consequat, in feugiat dolor blandit. Cras lacinia ligula id ante pellentesque, nec luctus lorem tristique. Nulla tortor erat, tempus ut leo ut, venenatis volutpat ante. Mauris odio mi, mollis at quam at, dictum dapibus nibh. Curabitur elementum mollis nisl. Nam egestas elit vel velit finibus tristique. Suspendisse potenti. In porta hendrerit augue in lacinia. Suspendisse vitae felis malesuada, molestie elit at, pulvinar ante. Quisque sed condimentum nisi. Etiam at neque malesuada, scelerisque ligula ut, aliquam ex.',
            ]);
            $image = new Media;
            $image->path = 'test_path_'.$i;
            $announcement->save();
            $announcement->media()->save($image);
        }
    }
}
