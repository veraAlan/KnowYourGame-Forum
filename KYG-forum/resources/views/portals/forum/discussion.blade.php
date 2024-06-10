<x-app-layout>
    <x-slot name="header">
      <a href="{{route('forum', $forum)}}" class="rounded-full text-white bg-slate-800 border" style="width: inherit;width: max-content; padding: 5px 30px; margin: 10px 0;">
         Go back to {{$forum->title}}
      </a>
      @if(isset($error))
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $error }}
      </h2>
      @endif
   </x-slot>

   <x-slot name="slot">
      <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-2 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
               <div class="flex flex-col sm:rounded-lg p-4">
                  <span class="font-semibold text-gray-800 dark:text-gray-200 leading-tight" style="width: inherit;width: max-content; font-size:xx-large; color: rgb(165 180 252);">
                     {{$discussion->title}}
                  </span>
                  @foreach($discussion->replies as $reply)
                     <div class="px-4 py-2 border border-2 rounded-md shadow-xl" style="border-color: rgb(165 180 252);">
                        <label class="font-semibold text-xl dark:text-gray-200 leading-tight py-2" style="color: rgb(165 180 252);">
                           {{ $reply->user->name }}:
                        </label>
                        <div class="flex justify-between px-2">
                           <span class="font-semibold text-gray-800 dark:text-gray-200 leading-tight py-2">
                              {{ $reply->content }}
                           </span>
                           @if(auth()->check())
                           <!-- Check admin status in another file, not here. -->
                              @if(auth()->user()->role->role_id == 1)
                                 <form method="POST" action="{{ route('game.portal.forum.discussion.reply.destroy', $discussion) }}">
                                    @csrf
                                    @method('delete')
                                    <input type="number" value="{{ $reply->reply_id }}" name="reply_id" hidden>
                                    <div class="flex items-center gap-4">
                                    <button type="submit" class="rounded-full text-white bg-slate-800 border p-2">{{ __('Delete this reply') }}</button>
                                    </div>
                                 </form>
                              @elseif($reply->user->id == auth()->user->id)
                                 <form method="POST" action="{{ route('game.portal.forum.discussion.reply.destroy', $discussion) }}">
                                    @csrf
                                    @method('delete')
                                    <input type="number" value="{{ $reply->reply_id }}" name="reply_id" hidden>
                                    <div class="flex items-center gap-4">
                                    <button type="submit" class="rounded-full text-white bg-slate-800 border p-2">{{ __('Delete this reply') }}</button>
                                    </div>
                                 </form>
                              @endif
                           @endif
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </x-slot>
</x-app-layout>