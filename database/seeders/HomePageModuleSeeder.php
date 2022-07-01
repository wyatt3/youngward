<?php
namespace Database\Seeders;
use App\HomePageModule;
use Illuminate\Database\Seeder;

class HomePageModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomePageModule::create([
            'name' => 'opener',
            'content' => 'Welcome to the Young Ward Web Site!',
        ]);
        HomePageModule::create([
            'name' => 'media',
        ]);
    }
}
