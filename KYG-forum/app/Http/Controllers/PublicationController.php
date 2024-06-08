<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Game;
use App\Models\Portal;
use Illuminate\Validation\Rules\Exists;
use Symfony\Component\Console\Input\Input;

class PublicationController extends Controller
{
    public function index(News $news, Publication $publication)
    {
        $publications = News::where('news_id', $news->news_id)->get();
        return view('test.news.publications.index', compact('publication', 'news'));
    }

    public function create(Request $request, News $news)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }

        $validated = $request->validate([
            'new_id' => 'required',
            'game_id' => 'required',
            'title' => 'required',
            'content' => 'required|min:6',
            'date' => 'required|{date()}'
        ]);

        Publication::create($validated);

        return redirect()->route('news.publication.index', ['news' => $news])->with('status', 'created');
    }



    public function show($id)
    {
        $publications = Publication::findOrFail($id);
        return view('test.news.publications.show', ['publications' => $publications]);
    }


    static public function findFrom(string $columnName, $value)
    {
        return Publication::where($columnName, $value)->get();
    }

    public function edit(Publication $publication)
    {
        return view('test.news.publications.edit', ['publications' => $publication]);
    }

    public function update(Request $request, News $news, Publication $publication)
    {
        if (session()->token() !== $request ->Input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }

        $validated = $request->validate([
            'news_id' => 'required',
            'game_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'date' => 'required|{date()}'
        ]);

        $publication->update($validated);
        return redirect()->route('news.publication.index', ['news' => $news, '#show-update'])->with(['status' => 'update', 'idupdated' => $publication->publication_id]);
    }

    public function destroy(Request $request, News $news, Publication $publication)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $publication->delete();
        return redirect()->route('news.publication.index', ['news' => $news])->with('status', 'deleted');
    }
}
