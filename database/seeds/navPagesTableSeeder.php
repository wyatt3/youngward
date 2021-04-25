<?php

use Illuminate\Database\Seeder;

use App\NavPage as Page;

class navPagesTableSeeder extends Seeder
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
            'name' => 'Organizations',
            'route' => 'orgs',
            'order' => '2',
        ]);
        $page->save();
        $page = new Page([
            'name' => 'Ward News',
            'route' => 'news',
            'order' => '3',
        ]);
        $page->save();
        
    }
}
