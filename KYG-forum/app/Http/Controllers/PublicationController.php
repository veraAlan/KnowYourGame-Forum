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
        return view('news.publications.index', compact('publication', 'news'));
    }

    public function create(Request $request, News $news)
    {

        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }

        $validated = $request->validate([
            'news_id' => 'required',
            'game_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
            'img' => 'required'
        ]);

        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);
        $validated['img'] = 'images/' . $imageName;
        dd($validated);
        exit();
        Publication::create($validated);

        return redirect()->route('news.publications.index', ['news' => $news])->with('status', 'created');
    }


    public function update(Request $request, News $news, Publication $publication)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }

        $validated = $request->validate([
            'publication_id' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

        $publication->update($validated);
        return redirect()->route('news.publications.index', ['news' => $news, '#show-update'])->with(['status' => 'updated', 'idupdated' => $publication->publication_id]);
    }

    public function destroy(Request $request, News $news, Publication $publication)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $publication->delete();
        return redirect()->route('wiki.article.section.index', ['news' => $news])->with('status', 'deleted');
    }
}
