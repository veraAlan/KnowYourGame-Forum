<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Portal;
use App\Models\Wiki;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * 
     */
    public function show(Article $article)
    {
        $wiki = $article->wiki;
        return view('portals.wiki.article', compact('wiki', 'article'));
    }

    /**
     * Show basic index with all Articles.
     * 
     * @param Wiki
     */
    public function index(Wiki $wiki)
    {
        $articles = Article::where('wiki_id', $wiki->wiki_id)->get();
        $portals = Portal::find($wiki->portal_id);
        return view('wiki.article.index', compact('articles', 'wiki', 'portals'));
    }

    /**
     * Create a new entry inside Wiki table.
     * 
     * @param Request
     * @param Wiki
     */
    public function create(Request $request, Wiki $wiki)
    {
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }

        $validated = $request->validate([
            'wiki_id' => 'required',
            'title' => 'required|min:3'
        ]);

       Article::create($validated);

       return redirect()->route('wiki.article.index', $wiki->wiki_id)->with('status', 'created');
    }

    /**
     * Update the Articles's information.
     * 
     * @param Request
     * @param Wiki
     * @param Article
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required'
        ]);

        $article->update($validated);
        return redirect()->route('wiki.article.index', ['wiki' => $article->wiki, '#show-update'])->with(['status' => 'updated', 'idupdated' => $article->article_id]);
    }

    /**
     * Delete the selected Article.
     * 
     * @param Request
     * @param Wiki
     * @param Article
     */
    public function destroy(Request $request, Article $article){
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $article->delete();
        return redirect()->route('wiki.article.index', $article->wiki)->with('status', 'deleted');
    }
}
