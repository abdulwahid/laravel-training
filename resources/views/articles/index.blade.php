@extends('layouts.default')

@section('content')

    <h1>Articles</h1>
    @foreach($articles as $article)
        <article>
            <h2><a href="{{ action('ArticleController@show',[$article->id]) }}">{{ $article->title }}</a></h2>
            <div>{{ $article->body }}</div>
        </article>
    @endforeach
@stop