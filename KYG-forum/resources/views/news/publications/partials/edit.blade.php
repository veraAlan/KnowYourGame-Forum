@foreach ($publications as $publication)
    <form method="POST" action="{{ route('news.publications.update', ['news' => $news, 'publication' => $publication]) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <h2 class="font-semibold text-x1 text-gray-800 dark:text-gray-200 leading-tight"></h2>
        <input type="number" value="{{ $news->news_id }}" name="news_id" hidden>
        <input type="number" value="{{ $news->portal_id }}" name="game_id" hidden>
        <input type="text" value="{{ old('title', $publication->title) }}" name="title">
        <input type="textarea" value="{{ old('content', $publication->content) }}" name="content">
        <img src="{{asset($publication->img)}}" alt="">
        <input type="file" name="img" class="text-black">
        <div class="flex-items-center gap-4">
            <x-primary-button> {{ __('Update this publication')}}</x-primary-button>
        @if(session('idupdated') == $publication->publication_id)
            <p
                id="show-update"
                x-data="{ show: true}"
                x-show="show"
                x-transition
                x-init="setTimeout() => show = false, 2000"
                class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('Update this Publication') }}</p>
        @endif
        </div>
    </form>
    <form method="POST" action=" {{ route('news.publication.destroy', ['news' => $news, 'publication' => $publication]) }}">
        @csrf
        @method('delete')
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Delete this Publication') }}</x-primary-button>
        </div>
    </form>
@endforeach