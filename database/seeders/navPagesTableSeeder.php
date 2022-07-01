<?php
namespace Database\Seeders;
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
        Page::create([
            'name' => 'Ward Activities',
            'route' => 'activities',
            'order' => '2',
        ]);
        Page::create([
            'name' => 'Announcements',
            'route' => 'announcements',
            'order' => '1',
        ]);
        Page::create([
            'name' => 'ChurchofJesusChrist.org',
            'href' => 'https://www.churchofjesuschrist.org',
            'order' => '3',
        ]);
        Page::create([
            'name' => 'Home',
            'order' => '4',
        ]); 
        Page::create([
            'name' => 'HomeMedia',
            'order' => '5',
        ]);
    }
}
