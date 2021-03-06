<?php

use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Statistic;

use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();
        Album::truncate();
        Photo::truncate();
        Statistic::truncate();

        $this->call(SeedUserTable::class);
        $this->call(SeedAlbumTable::class);
        $this->call(SeedPhotoTable::class);
        $this->call(SeedStatisticTable::class);

    }
}
