<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Vote;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countMax = 30;

        while (Vote::all()->count() != $countMax) {
            $count = $countMax - Vote::all()->count();

            $votes = Vote::factory($count)->make();

            $votes->each(function ($vote) {
                Vote::firstOrCreate([
                    'user_id' => $vote->user_id,
                    'site_id' => $vote->site_id
                ],
                    ['voter' => $vote->voter]
                );
            });
        }

        $sites = Site::all();

        $sites->each(function ($site) {
            $site->nbVotes = Vote::where('site_id', $site->id)->count();
            $site->save();
        });
    }
}
