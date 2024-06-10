@php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
@endphp
<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <!-- Group: Berita Teratas -->
                    <div class="mb-8" style="padding-top: 20px;">
                        <h3 class="h5" style="padding-bottom: 10px;">{{ __('Berita Teratas') }}</h3>
                        @php
                            $topNews = DB::select('SELECT *, DENSE_RANK() OVER (ORDER BY views DESC) as `rank` FROM news');
                            $topNewsChunks = collect($topNews)->take(6)->chunk(3);
                        @endphp
                        @foreach($topNewsChunks as $chunk)
                            <div class="d-flex flex-row flex-wrap justify-content-between">
                                @foreach($chunk as $news)
                                <a href="{{ url('news/' . $news->id . '/' . Str::slug($news->title)) }}" class="card mb-3" style="flex: 1 0 21%; margin: 5px; padding: 10px; text-decoration: none;">
                                    <div class="row g-0">
                                        <div class="card-body" style="font-size: 14px; padding-top: 0; padding-bottom: 0; padding-left: 21px; font-weight: 400; color: #808080;">
                                            <p class="card-text">{{ \Carbon\Carbon::parse($news->date)->locale('id')->diffForHumans() }}</p> <!-- Tanggal berita dipindahkan di atas sebagai judul hanya menunjukkan jarak terbit dari hari ini -->
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-md-4" d-flex justify-content-center align-items-center style="height: 80px; padding-left: 24px; padding-top: 15px;">
                                            <img src="{{ $news->image }}" class="img-fluid rounded" alt="{{ $news->title }}" style="width: 72px; height: 72px;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title" style="font-size: 1.05rem;">{{ $news->title }}</h5>
                                                <p class="card-text text-truncate" style="font-size: 12px;">
                                                    {{ trim(str_replace(['Bisnis.com, JAKARTA -- ','Bisnis.com, JAKARTA - ', 'Bisnis.com, JAKARTA -&nbsp;', 'Bisnis.com,&nbsp;JAKARTA - ;', 'Bisnis.com, JAKARTA&nbsp;- ;','Bisnis.com,&nbsp;JAKARTA -&nbsp;'], [''], $news->content)) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <!-- Group: Berita Terbaru -->
                    <div class="mb-8" style="padding-top: 20px;">
                        <h3 class="h5" style="padding-bottom: 10px;">{{ __('Berita Terbaru') }}</h3>
                        {{-- Konten News Card --}}
                        @php
                            $NewsCategory = DB::select('SELECT * FROM news ORDER BY date DESC');
                            $NewsCategoryChunks = collect($NewsCategory)->take(12)->chunk(3);
                        @endphp
                        @foreach($NewsCategoryChunks as $chunk)
                            <div class="d-flex flex-row flex-wrap">
                                @foreach($chunk as $news)
                                <a href="{{ url('news/' . $news->id . '/' . Str::slug($news->title)) }}" class="card mb-3" style="flex: 1 0 21%; margin: 5px; padding: 10px; text-decoration: none;">
                                    <div class="row g-0">
                                        <div class="card-body" style="font-size: 14px; padding-top: 0; padding-bottom: 0; padding-left: 21px; font-weight: 400; color: #808080;">
                                            <p class="card-text">{{ \Carbon\Carbon::parse($news->date)->locale('id')->diffForHumans() }}</p> <!-- Tanggal berita dipindahkan di atas sebagai judul hanya menunjukkan jarak terbit dari hari ini -->
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-md-4" style="height: 80px; padding-left: 24px; padding-top: 15px;">
                                            <img src="{{ $news->image }}" class="img-fluid rounded" alt="{{ $news->title }}" style="width: 72px; height: 72px;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title" d-flex justify-content-center align-items-center style="font-size: 1.05rem;">{{ $news->title }}</h5>
                                                <p class="card-text text-truncate" style="font-size: 12px;">
                                                    {{ trim(str_replace(['Bisnis.com, JAKARTA - ', 'Bisnis.com, JAKARTA -&nbsp;', 'Bisnis.com,&nbsp;JAKARTA - ;', 'Bisnis.com, JAKARTA&nbsp;- ;','Bisnis.com,&nbsp;JAKARTA -&nbsp;'], '', $news->content)) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <!-- Group: Berita Lainnya -->
                    <div class="mb-8" style="padding-top: 20px;">
                        <h3 class="h5" style="padding-bottom: 10px;">{{ __('Berita Lainnya') }}</h3>
                        {{-- Konten News Card --}}
                        @php
                            $NewsCategory = DB::select('SELECT * FROM news ORDER BY RAND()');
                            $NewsCategoryChunks = collect($NewsCategory)->take(18)->chunk(3);
                        @endphp
                        @foreach($NewsCategoryChunks as $chunk)
                            <div class="d-flex flex-row flex-wrap">
                                @foreach($chunk as $news)
                                <a href="{{ url('news/' . $news->id . '/' . Str::slug($news->title)) }}" class="card mb-3" style="flex: 1 0 21%; margin: 5px; padding: 10px; text-decoration: none;">
                                    <div class="row g-0">
                                        <div class="card-body" style="font-size: 14px; padding-top: 0; padding-bottom: 0; padding-left: 21px; font-weight: 400; color: #808080;">
                                            <p class="card-text">{{ \Carbon\Carbon::parse($news->date)->locale('id')->diffForHumans() }}</p> <!-- Tanggal berita dipindahkan di atas sebagai judul hanya menunjukkan jarak terbit dari hari ini -->
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-md-4" style="height: 80px; padding-left: 24px; padding-top: 15px;">
                                            <img src="{{ $news->image }}" class="img-fluid rounded" alt="{{ $news->title }}" style="width: 72px; height: 72px;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title" d-flex justify-content-center align-items-center style="font-size: 1.05rem;">{{ $news->title }}</h5>
                                                <p class="card-text text-truncate" style="font-size: 12px;">
                                                    {{ trim(str_replace(['Bisnis.com, JAKARTA - ', 'Bisnis.com, JAKARTA -&nbsp;', 'Bisnis.com,&nbsp;JAKARTA - ;', 'Bisnis.com, JAKARTA&nbsp;- ;','Bisnis.com,&nbsp;JAKARTA -&nbsp;'], '', $news->content)) }}
                                                </p>
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
</x-app-layout>
