<head>
    <title>SahaminPuh | {{ $news->title }}</title>
</head>

<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $news->title }}</h3>
                            <div class="d-flex justify-content-center">
                                <img src="{{ $news->image }}" class="img-fluid rounded" style="max-width: 75%;" alt="{{ $news->title }}">
                            </div>
                            <p class="card-text mt-4">{{ $news->description }}</p>
                            <p class="card-text mt-4">
                                {{ __('Sumber Berita: ') }}
                                <a href="{{ $news->url }}" target="_blank">{{ $news->url }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="h5">{{ __('Berita Teratas') }}</h3>
                            @php
                                $topNews = App\Models\News::selectRaw('*, DENSE_RANK() OVER (ORDER BY views DESC) as `rank`')->get();
                                $topNewsChunks = $topNews->take(5)->chunk(1);
                            @endphp
                            @foreach($topNewsChunks as $chunk)
                                <div class="d-flex flex-column">
                                    @foreach($chunk as $news)
                                        <a href="{{ url('news/' . $news->id . '/' . Str::slug($news->title)) }}" class="card mb-3" style="text-decoration: none;">
                                            <div class="row g-0 px-2">
                                                <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                    <img src="{{ $news->image }}" class="img-fluid rounded-start" alt="{{ $news->title }}">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $news->title }}</h5>
                                                        <p class="card-text text-truncate">{{ $news->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
