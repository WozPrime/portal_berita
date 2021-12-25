<article class="brick entry format-standard animate-this">
    <div class="entry-thumb">
        <a href="/news/{{$post->id}}" class="thumb-link">
            <img src="{{ url('thumbnail/' . $post->thumbnail) }}" alt="building">
        </a>
    </div>

    <div class="entry-text">
        <div class="entry-header">

            <div class="entry-meta">
                <span class="cat-links">
                    @foreach ($tags as $tag)
                        @foreach ($post->tags()->get() as $haveTags)
                            @if ($haveTags->id == $tag->id)
                                <a href="">{{ $tag->tema }}</a>
                            @endif
                        @endforeach
                    @endforeach
                </span>
            </div>

            <h1 class="entry-title"><a href="/news/{{$post->id}}">{{ $post->judul }}</a>
            </h1>


        </div>
        
    </div>

</article> <!-- end article -->
