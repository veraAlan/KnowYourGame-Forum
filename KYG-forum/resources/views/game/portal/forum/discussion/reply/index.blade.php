<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
         This are the replies for {{ $discussion->title }}.
      </h2>
   </x-slot>

   <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight p-6 border-2 border-amber-800">
            {{ $discussion->content }}
            </h2>
            <br>
            @foreach($replies as $reply)
            <div class="px-4 py-2">
               <label class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                  User: {{ $reply->user->name }}
               </label>
               <div class="flex justify-between px-2">
                  <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                     {{ $reply->content }}
                  </h2>
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

   
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               {{ __('Contribute to this discussion!') }}
         </h2>
         <form method="POST" action="{{ route('game.portal.forum.discussion.reply.create', $discussion) }}">
         @csrf
         @method('get')
         <x-input-label class="py-2">
            <input type="text" name="content" class="text-black">
         </x-input-label>
         <button type="submit" class="rounded-full text-white bg-slate-800 border-2 border p-2">Reply to discussion</button>
         @if(session('status') == 'created')
            <p
               x-data="{ show: true }"
               x-show="show"
               x-transition
               x-init="setTimeout(() => show = false, 2000)"
               class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('The wiki was created.') }}</p>
         @endif
         </form>
      </div>
   </div>
</x-app-layout>