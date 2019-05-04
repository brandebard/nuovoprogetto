<?php

use Illuminate\Database\Seeder;
use App\Models\Statistic;

class SeedStatisticTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Models\Statistic::class,30)->create();
    }
}
