<div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
           @foreach ($sections as $section)
               <div class="py-4">
                   <form method="POST"
                       action="{{ route('wiki.article.section.update', $section) }}"
                       class="p-6" enctype="multipart/form-data">
                       @csrf
                       @method('patch')
                       <x-input-label class="py-2">
                            <x-input-label class="py-2">
                                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                    {{ __('Title of the section') }}
                                </h2>
                                <input type="text" name="title" value="{{ old('title', $section->title) }}" class="text-black border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:border-blue-500">
                            </x-input-label>
                           <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                               {{ __('Content of the section') }}
                           </h2>
                           <input type="textarea" value="{{ old('content', $section->content) }}" name="content"
                               class="text-black border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:border-blue-500">
                       </x-input-label>
                       <x-input-label class="py-2">
                        <img class="py-2 object-cover w-full" src="{{asset($section->img)}}" alt="{{'Thumbnail image of: ' . $section->title}}">
                           <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                               {{ __('Image of the section') }}
                           </h2>
                           <input type="file" name="img" class="text-black border border-gray-300 rounded-md p-1 mb-1 text-sm">
                       </x-input-label>
                       <div class="flex items-center gap-4">
                           <x-primary-button>{{ __('Update this Section') }}</x-primary-button>
                           @if (session('idupdated') == $section->section_id)
                               <p id="show-update" x-data="{ show: true }" x-show="show" x-transition
                                   x-init="setTimeout(() => show = false, 2000)"
                                   class="text-sm text-gray-600 dark:text-gray-400">
                                   {{ __('Updated this Section.') }}</p>
                           @endif
                       </div>
                   </form>
                   <form method="POST"
                       action="{{ route('wiki.article.section.destroy', $section) }}"
                       class="p-6">
                       @csrf
                       @method('delete')
                       <div class="flex items-center gap-4">
                           <x-danger-button>{{ __('Delete this Section') }}</x-danger-button>
                       </div>
                   </form>
               </div>
           @endforeach
       </div>
   </div>
</div>
