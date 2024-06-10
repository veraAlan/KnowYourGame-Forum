<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Wiki;
use App\Models\Article;

class SectionController extends Controller
{
    private $storage_path = 'sections/images/';

    /**
     * Show basic index with all Articles.
     * 
     * @param Wiki
     * @param Article
     */
    public function index(Article $article)
    {
        $wiki = $article->wiki;
        $sections = $article->sections;
        return view('wiki.article.section.index', compact('sections', 'article', 'wiki'));
    }

    /**
     * Create a new entry inside Wiki table.
     * 
     * @param Request
     * @param Article useful for getting url parameters
     */
    public function create(Request $request, Article $article)
    {
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $validated = $request->validate([
            'title' => 'required|min:6',
            'content' => 'required|min:6',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if(isset($validated['img'])){
            $validated['img'] = $this->storeImage($validated, $this->storage_path);
        }

        $validated['article_id'] = $article->article_id;
        Section::create($validated);
        return redirect()->route('wiki.article.section.index', $article)->with('status', 'created');
    }

    /**
     * Update the Articles's information.
     * 
     * @param Request
     * @param Section
     */
    public function update(Request $request, Section $section)
    {
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $validated = $request->validate([
            'title' => 'nullable',
            'content' => 'nullable',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        
        if(!isset($validated['title']) && !isset($validated['content']) && !isset($validated['img'])){
            return redirect()->route('wiki.article.section.index', [$section->article, '#show-update'])->with(['status' => 'At least 1 value needs to be changed.']);
        }

        // Solo realizar update de imagen si cambia la imagen.
        if(isset($validated['title'])){
            if(isset($validated['img'])){
                // If an image is validated, delete stored image and update a new one.
                if($section->img != null) $this->deleteImage($section->img);
                $validated['img'] = $this->storeImage($validated, $this->storage_path);
            }else{
                // If there is a name change but no image, only update the image name.
                $validated['img'] = $this->updateStoredName($section, $validated, $this->storage_path);
            }
        }

        $section->update($validated);
        return redirect()->route('wiki.article.section.index', ['article' => $section->article, '#show-update'])->with(['status' => 'updated', 'idupdated' => $section->section_id]);
    }

    /**
     * Delete the selected Article.
     * 
     * @param Request
     * @param Section
     */
    public function destroy(Request $request, Section $section){
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $article = $section->article;
        $section->delete();
        return redirect()->route('wiki.article.section.index', $article)->with('status', 'deleted');
    }
}