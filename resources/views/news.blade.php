@php
use Illuminate\Support\Str;
@endphp

<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <!-- Group: Berita Teratas -->
                    <div class="mb-8">
                        <h3 class="h5">{{ __('Berita Teratas') }}</h3>
                        @php
                            $topNews = App\Models\News::selectRaw('*, DENSE_RANK() OVER (ORDER BY views DESC) as `rank`')->get();

                            $topNewsChunks = $topNews->take(9)->chunk(3);

                        @endphp
                        @foreach($topNewsChunks as $chunk)
                            <div class="d-flex flex-row flex-wrap justify-content-between">
                                @foreach($chunk as $news)
                                    <a href="{{ url('news/' . $news->id . '/' . Str::slug($news->title)) }}" class="card mb-3" style="flex: 1 0 21%; margin: 5px; padding: 10px; text-decoration: none;">
                                        <div class="row g-0">
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

                    <!-- Group: Berita FnB -->
                    <div class="mb-8">
                        <h3 class="h5">{{ __('Berita Pasar') }}</h3>
                        <div class="mb-8">
                            <div class="d-flex">
                                {{-- <button class="btn btn-outline-primary text-dark rounded-start rounded-end btn-category" data-category-id="null" style="margin-right: 10px; margin-bottom: 10px; padding: 5px 10px; border-color: white;" onmouseover="this.style.backgroundColor='#f0f3fa'" onmouseout="this.style.backgroundColor=''">{{ __('Semua') }}</button> --}}
                                <x-button-card-category active="true" data-category-id="null">{{ __('Semua') }}</x-button-card-category>
                                @foreach($categories as $category)
                                    {{-- <button class="btn btn-outline-primary text-dark rounded-start rounded-end btn-category" data-category-id="{{ $category->id }}" style="margin-right: 10px; margin-bottom: 10px; padding: 5px 10px; border-color: white;" onmouseover="this.style.backgroundColor='#f0f3fa'" onmouseout="this.style.backgroundColor=''">{{ $category->name }}</button> --}}
                                    <x-button-card-category active="false" data-category-id="{{ $category->id }}">{{ $category->name }}</x-button-card-category>
                                @endforeach
                            </div>
                        </div>
                        {{-- Konten News Card Berdasarkan Kategori --}}
                            @php
                                // $categoryId =;
                                // $categoryId = isset($_POST['categoryId']) ? $_POST['categoryId'] : null;
                                // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                //     $categoryId = isset($_POST['categoryId']) ? $_POST['categoryId'] : null;
                                //     exit;
                                // }
                                // $NewsCategory = App\Models\News::where('category_id', 2)->get(); // Assuming News model is used and contains the necessary data
                                $NewsCategory = App\Models\News::where('category_id', 2)->get();
                                $NewsCategoryChunks = $NewsCategory->take(9)->chunk(3);
                            @endphp
                            @foreach($NewsCategoryChunks as $chunk)
                                <div class="d-flex flex-row flex-wrap">
                                    @foreach($chunk as $news)
                                    <a href="{{ $news->url }}" class="card mb-3" style="flex: 1 0 21%; margin: 5px; padding: 10px; text-decoration: none;">
                                        <div class="row g-0">
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

                    <!-- Group: Berita Banking -->
                    <div class="mb-8">
                        <h3 class="h5">{{ __('Berita Banking') }}</h3>
                        @php
                            $bankingNews = App\Models\News::where('category_id', 3)->get(); // Assuming Banking category has ID 3
                            $bankingNewsChunks = $bankingNews->take(9)->chunk(3);
                        @endphp
                        @foreach($bankingNewsChunks as $chunk)
                            <div class="d-flex flex-row flex-wrap">
                                @foreach($chunk as $news)
                                <a href="{{ $news->url }}" class="card mb-3" style="flex: 1 0 21%; margin: 5px; padding: 10px; text-decoration: none;">
                                    <div class="row g-0">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryButtons = document.querySelectorAll('.btn-category');

            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const categoryId = this.dataset.categoryId;
                    console.log(categoryId);

                    // const xhr = new XMLHttpRequest();
                    // xhr.open('POST', window.location.href, true); // Mengirim ke halaman yang sama
                    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    // xhr.onload = function() {
                    //     if (xhr.status >= 200 && xhr.status < 300) {
                    //         console.log(xhr.responseText); // Menampilkan respons dari PHP
                    //     } else {
                    //         console.error('Request failed with status: ' + xhr.status);
                    //     }
                    // };
                    // xhr.send('categoryId=' + categoryId);
                });
            });
        });
    </script>
</x-app-layout>