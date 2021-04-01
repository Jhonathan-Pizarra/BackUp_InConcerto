<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Schema::disableForeignKeyConstraints();
        $this->call(ResourcesTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(FestivalsTableSeeder::class);
        $this->call(FeedingPlacesTableSeeder::class);
        $this->call(CalendarsTableSeeder::class);
        $this->call(LodgingsTableSeeder::class);
        $this->call(FeedingsTableSeeder::class);
        $this->call(TransportsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ArtistsTableSeeder::class);
        $this->call(ConcertsTableSeeder::class);
        $this->call(EssaysTableSeeder::class);
        $this->call(ActivityFestivalsTableSeeder::class);
        Schema::enableForeignKeyConstraints();

    }
}
