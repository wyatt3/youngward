<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NavPagesTableSeeder::class);
        $this->call(ActivityTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AnnouncementTableSeeder::class);
        $this->call(HomePageModuleSeeder::class);
    }
}
