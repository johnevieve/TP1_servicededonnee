<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commentaire::factory()
            ->count(30)
            ->create();

        $sites = Site::all();

        $sites->each(function($site) {
            $site->nbCommentaires = Commentaire::where('site_id', $site->id)->count();
            $site->save();
        });
    }
}
