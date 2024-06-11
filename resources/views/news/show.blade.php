<head>
    <title>SahaminPuh | {{ $news->title }}</title>
</head>
@php
    $news->increment('views');
@endphp

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
                            <div class="text-center mt-2">
                                <small>Sumber gambar: <a href="{{ $news->image }}" target="_blank">{{ $news->image }}</a></small>
                            </div>
                            <p class="card-text mt-4">{{ $news->content }}</p>
                        </div>
                    </div>
                    {{-- Comment --}}
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Comments</h5>
                            @auth
                                <form action="{{ url('news/' . $news->id . '/comments') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <textarea name="content" class="form-control" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Comment</button>
                                </form>
                            @else
                                <p>Please <a href="{{ route('login') }}">login</a> to comment.</p>
                            @endauth
                            <hr>
                            @php
                                $comments = $news->comments()->whereNull('comment_id')->with('replies')->paginate(10);
                            @endphp
                            @foreach($comments as $comment)
                                <div style="margin-left: {{ $comment->is_reply ? '20px' : '0' }};">
                                    <div class="d-flex flex-start">
                                        <div class="flex-grow-1 flex-shrink-1">
                                            <div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <strong class="mb-1">{{ $comment->user->name }}</strong>
                                                    @if ($comment->is_reply)
                                                        <small>reply to {{ $comment->comment_id->user->name }}</small>
                                                    @endif
                                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                                    @if(auth()->check() && (auth()->user()->can('update', $comment) || auth()->user()->can('delete', $comment)))
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                                ...
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                @can('update', $comment)
                                                                    <li>
                                                                        <form action="{{ url('comments/' . $comment->id) }}" method="POST" class="px-3 py-1">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <textarea name="content" class="form-control mb-2" rows="1" required>{{ $comment->content }}</textarea>
                                                                            <button type="submit" class="btn btn-sm btn-secondary">Update</button>
                                                                        </form>
                                                                    </li>
                                                                @endcan
                                                                @can('delete', $comment)
                                                                    <li>
                                                                        <form action="{{ url('comments/' . $comment->id) }}" method="POST" class="px-3 py-1">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                                        </form>
                                                                    </li>
                                                                @endcan
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                                <p class="small mb-0">{{ $comment->content }}</p>
                                                <div class="col-span-2 flex justify-end items-center">
                                                    <button id="replyButton{{ $comment->id }}" class="btn btn-sm btn-primary" onclick="toggleReplyForm({{ $comment->id }})">Reply</button>
                                                </div>
                                                @auth
                                                    <form id="replyForm{{ $comment->id }}" action="{{ url('news/' . $news->id . '/comments') }}" method="POST" style="display: none;">
                                                        @csrf
                                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                        <div class="mb-3">
                                                            <textarea name="content" class="form-control" rows="3" required></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Add Reply</button>
                                                    </form>
                                                @else
                                                    <p>Please <a href="{{ route('login') }}">login</a> to comment.</p>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        @if($comment->replies)
                                        @foreach($comment->replies as $reply)
                                            <div style="margin-left: 20px;">
                                                <div class="d-flex flex-start">
                                                    <div class="flex-grow-1 flex-shrink-1">
                                                        <div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <strong class="mb-1">{{ $reply->user->name }}</strong>
                                                                <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                                                                @if(auth()->check() && (auth()->user()->can('update', $reply) || auth()->user()->can('delete', $reply)))
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            ...
                                                                        </button>
                                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                            @can('update', $reply)
                                                                                <li>
                                                                                    <form action="{{ url('comments/' . $reply->id) }}" method="POST" class="px-3 py-1">
                                                                                        @csrf
                                                                                        @method('PATCH')
                                                                                        <textarea name="content" class="form-control mb-2" rows="1" required>{{ $reply->content }}</textarea>
                                                                                        <button type="submit" class="btn btn-sm btn-secondary">Update</button>
                                                                                    </form>
                                                                                </li>
                                                                            @endcan
                                                                            @can('delete', $reply)
                                                                                <li>
                                                                                    <form action="{{ url('comments/' . $reply->id) }}" method="POST" class="px-3 py-1">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                                                    </form>
                                                                                </li>
                                                                            @endcan
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <p class="small mb-0">{{ $reply->content }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        <div class="d-flex justify-content-center">
                            {{ $comments->links('pagination::bootstrap-4') }}
                        </div>
                            <div class="d-flex justify-content-center">
                                {{ $comments->links('pagination::bootstrap-4') }}
                            </div>
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
                                                        <p class="card-text text-truncate">{{ $news->content }}</p>
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

<script>
    function toggleReplyForm(commentId) {
        var form = document.getElementById('replyForm' + commentId);
        var button = document.getElementById('replyButton' + commentId);
        if (form.style.display === 'none') {
            form.style.display = 'block';
            button.style.display = 'none'; // Hide the reply button
        } else {
            form.style.display = 'none';
            button.style.display = 'block'; // Show the reply button
        }
    }
</script>
