@extends('layouts.default')

@section('content')

    <h1>Articles</h1>


            <h2>{{ $articles->title }}</h2>
            <div>{{ $articles->body }}</div>

@stop