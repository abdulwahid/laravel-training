@extends('layouts.app')

@section('title')
    EditArticle


@stop

@section('content')


    <h1>Edit Article</h1>
    <form id="edit_author" action="{{ action('ArticleController@saveEditArticle', ['id' =>  $article->id]) }}" method="post" >

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="articleID" value="{{ $article->id }}">

        <fieldset>

            <p>
                <label for="title">Title*</label>
                <input name="title" id="title" type="text" value="{{ $article->title }}"/>
                @foreach ($errors->get('title') as $error)
                             {{ $error }}
                @endforeach

            </p>

            <p>
                <label for="body">Body*</label>
                <textarea rows="4" cols="50" name="body" id="body">{{ $article->body }}</textarea>
                <div class="error">{{ $errors->first('body') }}</div>
            </p>

            <input type="submit" value="Submit"/>

        </fieldset>

    </form>

    @stop




