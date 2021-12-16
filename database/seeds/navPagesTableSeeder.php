<?php

use Illuminate\Database\Seeder;

use App\NavPage as Page;

class NavPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = new Page([
            'name' => 'Home',
            'route' => 'index',
            'order' => '1',
        ]);
        $page->save();
        $page = new Page([
            'name' => 'Ward Activities',
            'route' => 'activity.index',
            'order' => '3',
        ]);
        $page->save();
        $page = new Page([
            'name' => 'Announcements',
            'route' => 'announcements',
            'order' => '2',
        ]);
        $page->save();
        $page = new Page([
            'name' => 'ChurchofJesusChrist.org',
            'href' => 'https://www.churchofjesuschrist.org',
            'order' => '4',
        ]);
        $page->save();
        
    }
}
