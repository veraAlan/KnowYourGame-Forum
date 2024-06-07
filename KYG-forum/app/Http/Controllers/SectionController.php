<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Wiki;
use App\Models\Article;

class SectionController extends Controller
{
    /**
     * Show basic index with all Articles.
     * 
     * @param Wiki
     * @param Article
     */
    public function index(Wiki $wiki, Article $article)
    {
        $sections = Section::where('article_id', $article->article_id)->get();
        return view('wiki.article.section.index', compact('sections', 'article', 'wiki'));
    }

    /**
     * Create a new entry inside Wiki table.
     * 
     * @param Request
     * @param Wiki useful for getting url parameters
     * @param Article useful for getting url parameters
     */
    public function create(Request $request, Wiki $wiki, Article $article,)
    {
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }

        $validated = $request->validate([
            'wiki_id' => 'required',
            'article_id' => 'required',
            'content' => 'required|min:6'
        ]);

       Section::create($validated);

       return redirect()->route('wiki.article.section.index', ['wiki' => $wiki, 'article' => $article])->with('status', 'created');
    }

    /**
     * Update the Articles's information.
     * 
     * @param Request
     * @param Wiki useful for getting url parameters
     * @param Article useful for getting url parameters
     * @param Section
     */
    public function update(Request $request, Wiki $wiki, Article $article, Section $section)
    {
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }

        $validated = $request->validate([
            'section_id' => 'required',
            'content' => 'required'
        ]);

        $section->update($validated);
        return redirect()->route('wiki.article.section.index', ['wiki' => $wiki, 'article' => $article, '#show-update'])->with(['status' => 'updated', 'idupdated' => $section->section_id]);
    }

    /**
     * Delete the selected Article.
     * 
     * @param Request
     * @param Wiki useful for getting url parameters
     * @param Article useful for getting url parameters
     * @param Section
     */
    public function destroy(Request $request, Wiki $wiki, Article $article, Section $section){
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $section->delete();
        return redirect()->route('wiki.article.section.index', ['wiki' => $wiki, 'article' => $article])->with('status', 'deleted');
    }
}