<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * Show basic index with all wikis.
     */
    public function index(Discussion $discussion)
    {
        $replies = $discussion->replies;
        return view('game.portal.forum.discussion.reply.index', compact('discussion', 'replies'));
    }

    /**
     * Insert method for Reply table
     * 
     * @param Request
     */
    public function create(Request $request, Discussion $discussion){
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }

        $validated = $request->validate([
            'content' => 'required|min:3'
        ]);
        $validated['discussion_id'] = $discussion->discussion_id;
        $validated['user_id'] = auth()->user()->id;

        Reply::create($validated);
        return redirect()->route('game.portal.forum.discussion.index', $discussion)->with(['status' => 'created']);
    }

    /**
     * Edit method for Reply table
     */
    public function edit()
    {
        return view('Reply.index', ['reply'=> Reply::all()]);
    }

    /**
     * Delete the selected Reply.
     * 
     * @param Request
     */
    public function destroy(Request $request, Discussion $discussion){
        Reply::find($request->input('reply_id'))->delete();
        return redirect()->route('game.portal.forum.discussion.index', $discussion)->with('status', 'deleted');
    }
}
