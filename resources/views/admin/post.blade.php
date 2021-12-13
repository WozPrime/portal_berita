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
                    <h1>Text Editors</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Text Editors</li>
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
                        <h3 class="card-title">
                            Summernote
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ asset('/admin/post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <textarea id="summernote" name="post">

                  </textarea>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more
                        examples and information about the plugin.
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
