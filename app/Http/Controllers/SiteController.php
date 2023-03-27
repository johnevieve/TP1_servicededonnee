<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\Site;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $sites = Site::where('user_id', Auth::id())->get();
        return view('sites.index', ['sites' => $sites]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $url = $request->input('url');
       var_dump($url);

        return view('sites.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiteRequest $request): RedirectResponse
    {
        $attributes = $request->validated();
        Auth::user()->sites()->create($attributes);
        return redirect()->route('sites.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site): View
    {
        return view('sites.show', ['site' => $site]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site): View
    {
        return view('sites.edit', ['site' => $site]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiteRequest $request, Site $site): RedirectResponse
    {
        $attributes = $request->validated();
        $site->update($attributes);
        return redirect()->route('sites.edit', $site->id)->with('status', 'site-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        //
    }

    public function search(Request $request){
        $url = $request->input('url');

        $liste = [];
        $sites = Site::all();

        foreach ($sites as $site){
            if($site->domaine == $url) {
                return view('sites.show', ['site' => $site]);
            }

            $lev = levenshtein(preg_replace('/^(https?:\/\/)?(www\.)?/', '', $site->domaine),
                preg_replace('/^(https?:\/\/)?(www\.)?/', '', $url));

            if ($lev <= 3){
                $liste[$lev] = Site::find($site->domaine);
            }
        }

        ksort($liste);
        $listeLimite = array_slice($liste, 0, 3);

        return view('welcome', ['liste' => $listeLimite, 'url' => $url]);
    }
}
