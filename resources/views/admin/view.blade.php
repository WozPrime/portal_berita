@extends('layouts.adminlteparents')
@section('title')
Post
@endsection

@section('content')

<div class="content">
    <?php $no = 0; ?>
    @foreach($post as $value)
    <?php $no++; ?>
    <p>{{($no)}}</p>

    {!!$value->konten!!}
    @endforeach
</div>

@endsection