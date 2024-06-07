<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Game;
use App\Models\Portal;
use Illuminate\Validation\Rules\Exists;

class PublicationController extends Controller
{
    public function index(News $news)
    {
        $publications = Publication::get();
        return view('test.news.publications.index', ['publications' => $publications, 'news' => $news]);
    }

    public function create(News $news)
    {
        $portal = Portal::find($news->news_id);
        $games = Game::find($portal->portal_id);
        return view('test.news.publications.create', ['portal' => $portal, 'news' => $news, 'games' => $games]);
    }

    public function store(Request $request)
    {
        dd($request->file);
        exit();

        $image = $request->file('img');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
        


        $validated = $request->validate([
            'news_id' =>['required'],
            'game_id' =>['required'],
            'title' =>['required'],
            'content' =>['required'],
            'date' =>['required'],
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $imageName = time().'.'.$request->img->extension();
        $request->img->move(public_path('images'), $imageName);

        $validated['img'] = 'images/' . $validated['img'];
        Publication::create($validated);

        $news = News::find($request->input('news_id'));
        session()->flash('status', 'Publication Created!');
        return to_route('test.news.index', ['news' => $news]);
    }

    public function show($id)
    {
        $publications = Publication::findOrFail($id);
        return view('test.news.publications.show', ['publications' => $publications]);
    }

    
    static public function findFrom(string $columnName, $value){
        return Publication::where($columnName, $value)->get();
    }

    public function edit(Publication $publication)
    {
        return view('test.news.publications.edit', ['publications' => $publication]);
    }

    public function update(Request $request, Publication $publication)
    {
        $validated = $request->validate([
            'news_id' =>['required'],
            'game_id' =>['required'],
            'title' =>['required'],
            'content' =>['required'],
            'date' =>['required']
        ]);
        dd($request);
        exit();
        $publication->update($validated);
        $news = News::find($request->input('news_id'));
        session()->flash('status', 'Publication Update!');
        return to_route('test.news.index', ['news' => $news]);
    }

    public function destroy(News $news , Publication $publication)
    {
        $publication->delete();
        session()->flash('status', 'Publication Deleted!');
        return to_route('test.news.index' , $news);
    }
}