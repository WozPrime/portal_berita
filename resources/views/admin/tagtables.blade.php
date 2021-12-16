@extends('layouts.adminlteparents')
@section('title')
    Tags
@endsection
<style>
    .floating-btn {
        width: 50px;
        height: 50px;
        background: var(--gray-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        border-radius: 50%;
        color: var(--white);
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.25);
        position: fixed;
        right: 20px;
        bottom: 75px;
        transition: background 0.25s;

        /* button */
        outline: gray;
        border: none;
        cursor: pointer;
    }

    .floating-btn:hover {
        color: lawngreen;
    }

    .floating-btn:active {
        background: var(--gray);
    }

</style>
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tags Tables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Tags Tables</li>
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
                        <h3 class="card-title pt-1">List Tags</h3>
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
                                    <th>Tema</th>
                                    <th colspan="2" style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$tag->tema}}</td>
                                        <td style="text-align: center">
                                            <a class="btn btn-primary"
                                                href="/view/{{ $tag->id }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete{{ $tag->id }}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- @foreach ($data_post as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->judul }}</td>
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
                                @endforeach --}}
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
    <button class="material-icons floating-btn" data-toggle="modal" data-target="#insert">add</button>
    <div class="modal fade" id="insert">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input New Tag</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/tags" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Tag_name">Tag Name</label>
                            <input type="text" class="form-control" id="tema" name="tema">
                            <div class="text-danger">
                                @error('tema')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->

    </div>
@endsection
