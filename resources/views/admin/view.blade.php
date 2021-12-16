@extends('layouts.adminlteparents')
@section('title')
    Post
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-lime">
                        <div class="card-body">
                            <h1 style="text-align: center">{{ $data_post->judul }}</h1>
                            <div class="mt-5 mb-5" style="text-align: center">
                                <img id="preview" style="max-width:700px;
                                max-height:700px;" src="{{ url('thumbnail/' . $data_post->thumbnail) }}" alt="" />
                            </div>
                            <div class="mt-5 mb-2">
                                {!! $data_post->konten !!}
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
