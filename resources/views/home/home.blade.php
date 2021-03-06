@extends('home.layouts.app')
@section('title')
    Portal Berita
@endsection

@section('content')
    <section id="bricks">

        <div class="row masonry">

            <!-- brick-wrapper -->
            <div class="bricks-wrapper">

                <div class="grid-sizer"></div>

                <div class="brick entry featured-grid animate-this">
                    <div class="entry-content">
                        <div id="featured-post-slider" class="flexslider">
                            <ul class="slides">
                                @foreach ($newPost as $new)
                                    @if ($new->status)
                                        <li>
                                            <div class="featured-post-slide">

                                                <div class="post-background"
                                                    style="background-image:url({{ url('thumbnail/' . $new->thumbnail) }});">
                                                </div>

                                                <div class="overlay"></div>

                                                <div class="post-content">
                                                    <ul class="entry-meta">
                                                        <li>{{ $new->updated_at->format('M d, Y') }}</li>
                                                        <li><a>{{ $new->uploader }}</a></li>
                                                    </ul>

                                                    <h1 class="slide-title"><a href="/news/{{ $new->id }}"
                                                            title="">{{ $new->judul }}</a></h1>
                                                </div>

                                            </div>
                                        </li> <!-- /slide -->
                                    @endif
                                @endforeach

                            </ul> <!-- end slides -->
                        </div> <!-- end featured-post-slider -->
                    </div> <!-- end entry content -->
                </div>
                @foreach ($posts as $post)
                    @if ($post->status)
                        @if ($loop->index > 2)
                            @include('home.layouts.article',['post'=>$post],['tags' => $tags,])
                        @endif
                    @endif
                @endforeach



                {{-- <!-- format audio here -->
            <article class="brick entry format-audio animate-this">

                <div class="entry-thumb">
                    <a href="single-audio.html" class="thumb-link">
                        <img src="images/thumbs/concert.jpg" alt="concert">
                    </a>

                    <div class="audio-wrap">
                        <audio id="player" src="media/AirReview-Landmarks-02-ChasingCorporate.mp3" width="100%"
                            height="42" controls="controls"></audio>
                    </div>
                </div>

                <div class="entry-text">
                    <div class="entry-header">

                        <div class="entry-meta">
                            <span class="cat-links">
                                <a href="#">Design</a>
                                <a href="#">Music</a>
                            </span>
                        </div>

                        <h1 class="entry-title"><a href="single-audio.html">This Is a Audio Format Post.</a></h1>

                    </div>
                    <div class="entry-excerpt">
                        Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit
                        proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute
                        incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                    </div>
                </div>

            </article> <!-- /article -->

            <article class="brick entry format-quote animate-this">

                <div class="entry-thumb">
                    <blockquote>
                        <p>Good design is making something intelligible and memorable. Great design is making
                            something memorable and meaningful.</p>

                        <cite>Dieter Rams</cite>
                    </blockquote>
                </div>

            </article> <!-- end article -->

            <article class="brick entry animate-this">

                <div class="entry-thumb">
                    <a href="single-standard.html" class="thumb-link">
                        <img src="images/thumbs/shutterbug.jpg" alt="Shutterbug">
                    </a>
                </div>

                <div class="entry-text">
                    <div class="entry-header">

                        <div class="entry-meta">
                            <span class="cat-links">
                                <a href="#">Photography</a>
                                <a href="#">html</a>
                            </span>
                        </div>

                        <h1 class="entry-title"><a href="single-standard.html">Photography Skills Can Improve
                                Your Graphic Design.</a></h1>

                    </div>
                    <div class="entry-excerpt">
                        Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit
                        proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute
                        incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                    </div>
                </div>

            </article> <!-- end article -->

            <article class="brick entry animate-this">

                <div class="entry-thumb">
                    <a href="single-standard.html" class="thumb-link">
                        <img src="images/thumbs/usaf-rocket.jpg" alt="USAF rocket">
                    </a>
                </div>

                <div class="entry-text">
                    <div class="entry-header">

                        <div class="entry-meta">
                            <span class="cat-links">
                                <a href="#">Branding</a>
                                <a href="#">Mockup</a>
                            </span>
                        </div>

                        <h1 class="entry-title"><a href="single-standard.html">The 10 Golden Rules of Clean
                                Simple Design.</a></h1>

                    </div>
                    <div class="entry-excerpt">
                        Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit
                        proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute
                        incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                    </div>
                </div>

            </article> <!-- end article -->

            <article class="brick entry format-gallery group animate-this">

                <div class="entry-thumb">

                    <div class="post-slider flexslider">
                        <ul class="slides">
                            <li>
                                <img src="images/thumbs/gallery/work1.jpg">
                            </li>
                            <li>
                                <img src="images/thumbs/gallery/work2.jpg">
                            </li>
                            <li>
                                <img src="images/thumbs/gallery/work3.jpg">
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="entry-text">
                    <div class="entry-header">

                        <div class="entry-meta">
                            <span class="cat-links">
                                <a href="#">Branding</a>
                                <a href="#">Wordpress</a>
                            </span>
                        </div>

                        <h1 class="entry-title"><a href="single-gallery.html">Workspace Design Trends and
                                Ideas.</a></h1>

                    </div>
                    <div class="entry-excerpt">
                        Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit
                        proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute
                        incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                    </div>
                </div>

            </article> <!-- end article -->

            <article class="brick entry format-link animate-this">

                <div class="entry-thumb">
                    <div class="link-wrap">
                        <p>Looking for affordable &amp; reliable web hosting? We recommend Dreamhost.</p>
                        <cite>
                            <a target="_blank"
                                href="http://www.dreamhost.com/r.cgi?287326">http://www.dreamhost.com</a>
                        </cite>
                    </div>
                </div>

            </article> <!-- end article -->


            <article class="brick entry animate-this">

                <div class="entry-thumb">
                    <a href="single-standard.html" class="thumb-link">
                        <img src="images/thumbs/diagonal-pattern.jpg" alt="Pattern">
                    </a>
                </div>

                <div class="entry-text">
                    <div class="entry-header">

                        <div class="entry-meta">
                            <span class="cat-links">
                                <a href="#">Design</a>
                                <a href="#">UI</a>
                            </span>
                        </div>

                        <h1 class="entry-title"><a href="single-standard.html">You Can See Patterns
                                Everywhere.</a></h1>

                    </div>
                    <div class="entry-excerpt">
                        Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit
                        proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute
                        incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                    </div>
                </div>

            </article> <!-- end article -->

            <article class="brick entry format-video animate-this">

                <div class="entry-thumb video-image">
                    <a href="http://player.vimeo.com/video/14592941?title=0&amp;byline=0&amp;portrait=0&amp;color=F64B39"
                        data-lity>
                        <img src="images/thumbs/ottawa-bokeh.jpg" alt="bokeh">
                    </a>
                </div>

                <div class="entry-text">
                    <div class="entry-header">

                        <div class="entry-meta">
                            <span class="cat-links">
                                <a href="#">Design</a>
                                <a href="#">Branding</a>
                            </span>
                        </div>

                        <h1 class="entry-title"><a href="single-video.html">This Is a Video Post Format.</a>
                        </h1>

                    </div>
                    <div class="entry-excerpt">
                        Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit
                        proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute
                        incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                    </div>
                </div>

            </article> <!-- end article -->

            <article class="brick entry animate-this">

                <div class="entry-thumb">
                    <a href="single-standard.html" class="thumb-link">
                        <img src="images/thumbs/lighthouse.jpg" alt="Lighthouse">
                    </a>
                </div>

                <div class="entry-text">
                    <div class="entry-header">

                        <div class="entry-meta">
                            <span class="cat-links">
                                <a href="#">Photography</a>
                                <a href="#">Design</a>
                            </span>
                        </div>

                        <h1 class="entry-title"><a href="single-standard.html">Breathtaking Photos of
                                Lighthouses.</a></h1>

                    </div>
                    <div class="entry-excerpt">
                        Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit
                        proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute
                        incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                    </div>
                </div>

            </article> <!-- end article -->

            <article class="brick entry animate-this">

                <div class="entry-thumb">
                    <a href="single-standard.html" class="thumb-link">
                        <img src="images/thumbs/liberty.jpg" alt="Liberty">
                    </a>
                </div>

                <div class="entry-text">
                    <div class="entry-header">

                        <div class="entry-meta">
                            <span class="cat-links">
                                <a href="#">Branding</a>
                                <a href="#">html</a>
                            </span>
                        </div>

                        <h1 class="entry-title"><a href="single-standard.html">Designing With Black and
                                White.</a></h1>

                    </div>
                    <div class="entry-excerpt">
                        Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit
                        proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute
                        incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                    </div>
                </div>

            </article> <!-- end article --> --}}

            </div> <!-- end brick-wrapper -->

        </div> <!-- end row -->

        <div class="row">
            {{-- Illuminate\Pagination\LengthAwarePaginator {#1270 ???
                #total: 16
                #lastPage: 2
                #items: Illuminate\Database\Eloquent\Collection {#1292 ???}
                #perPage: 10
                #currentPage: 1
                #path: "http://127.0.0.1:8000"
                #query: []
                #fragment: null
                #pageName: "page"
                +onEachSide: 3
                #options: array:2 [???]
              } --}}
            {{-- {{dd($posts)}} --}}
            <nav class="pagination">
                @if ($posts->currentPage() == 1)
                    <span class="page-numbers prev inactive">Prev</span>
                @else
                    <a href="{{ $posts->previousPageUrl() }}" class="page-numbers next ">Prev</a>
                @endif

                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                    <a href="{{ $posts->url($i) }}"
                        class="page-numbers @if ($i == $posts->currentPage())
                    current
                @endif">{{ $i }}</a>

                @endfor


                @if ($posts->currentPage() == $posts->lastPage())
                    <span href="{{ $posts->nextPageUrl() }}" class="page-numbers next inactive">Next</span>
                @else
                    <a href="{{ $posts->nextPageUrl() }}" class="page-numbers next ">Next</a>
                @endif
            </nav>

        </div>

    </section> <!-- end bricks -->

@endsection
