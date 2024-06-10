@php
use Illuminate\Support\Str;
@endphp

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                        Berita Teratas
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">
                        @foreach ($news as $newsItem)
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <img class="w-full" src="{{ $newsItem->image ?? $newsItem['imageUrl'] }}" alt="Gambar Berita">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">{{ $newsItem->title ?? $newsItem['title'] }}</div>
                                    <p class="text-gray-700 text-base">
                                        {{ Str::limit($newsItem->content ?? $newsItem['content'], 100) }}
                                    </p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $newsItem->date ?? $newsItem['date'] }}</span>
                                    @if(isset($newsItem->views))
                                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $newsItem->views }} tampilan</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
