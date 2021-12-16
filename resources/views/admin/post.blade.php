@extends('layouts.adminlteparents')
@section('title')
    Post
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>News Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">News Post</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title pt-1">Post Your News Here</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ asset('/admin/post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="Judul">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control">
                                <div class="text-danger">
                                    @error('judul')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tag Berita</label>
                                <div class="select2-primary">
                                    <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Select Tags"
                                        data-dropdown-css-class="select2-primary" style="width: 100%;">
                                        @foreach ($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->tema}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Thumbnail">Thumbnail</label>
                                <div>
                                    <div id="thumbnail" class="mb-1"></div>
                                    <input accept="image/*" type='file' name="thumbnail" id="imgInp" />
                                    <div class="text-danger">
                                        @error('thumbnail')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Preview">Preview</label>
                                <div>
                                    <img id="preview" style="max-width:1000px;
                                                                max-height:1000px;" src="#" alt="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Berita">Konten</label>
                                <textarea id="summernote" name="post"></textarea>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <br>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->

        <!-- ./row -->
    </section>
    <!-- /.content -->
    <!-- /.content -->


@endsection
