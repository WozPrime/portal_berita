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
                    <h1>Post Tables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Post Tables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title pt-1">List Post</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    {{-- card-body --}}
                    <div class="card-body bg-light">
                        <table class="table table-responsive-sm table-bordered bg-light" id="myTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th class="col-2">Judul</th>
                                    <th class="col-2">Thumbnail</th>
                                    <th class="col-2">Status</th>
                                    <th class="col-3">Uploader</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_post as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->judul }}</td>
                                        <td style="text-align: center"><img src="{{ url('thumbnail/' . $post->thumbnail) }}" width="70"></td>
                                        <td style="text-align: center"><input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success"></td>
                                        <td>{{ $post->uploader }}</td>
                                        <td style="text-align: center">
                                            <a class="btn btn-primary"
                                                href="/view/{{ $post->id }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete{{ $post->id }}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    
                                    <div class="modal fade" id="delete{{ $post->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-danger">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin Menghapus data dari {{ $post->judul }} ini?
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-light"
                                                        data-dismiss="modal">Close</button>
                                                    <a href="/post/tables/delete/{{ $post->id }}" type="button"
                                                        class="btn btn-outline-light">Hapus Data</a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
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
