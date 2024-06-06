<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Portal;
use App\Models\Wiki;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Show basic index with all Articles.
     * 
     * @param Wiki
     */
    public function index(Wiki $wiki)
    {
        $articles = Article::where('idwiki', $wiki->idwiki)->get();
        $portals = Portal::find($wiki->idportal);
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
            'idwiki' => 'required',
            'title' => 'required|min:3'
        ]);

       Article::create($validated);

       return redirect()->route('wiki.article.index', $wiki->idwiki)->with('status', 'created');
    }

    /**
     * Update the Articles's information.
     * 
     * @param Request
     * @param Wiki
     * @param Article
     */
    public function update(Request $request, Wiki $wiki, Article $article)
    {
        $validated = $request->validate([
            'idwiki' => 'required',
            'title' => 'required'
        ]);

        Article::find($article->idarticle)->update($validated);
        return redirect()->route('wiki.article.index', ['wiki' => $wiki, '#show-update'])->with(['status' => 'updated', 'idupdated' => $article->idarticle]);
    }

    /**
     * Delete the selected Article.
     * 
     * @param Request
     * @param Wiki
     * @param Article
     */
    public function destroy(Request $request, Wiki $wiki, Article $article){
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        Article::find($article->idarticle)->delete();
        return redirect()->route('wiki.article.index', $wiki)->with('status', 'deleted');
    }
}
