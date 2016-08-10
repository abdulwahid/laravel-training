@extends('layouts.app')

@section('title')
    CreateArticle


@stop

@section('content')


    <h1>Create a New Article</h1>
    <form id="create_author" action="{{ url('/article/post-create') }}" method="post" >

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <fieldset>

            <?php// echo $validator;?>
            <p>
                <label for="title">Title*</label>
                <input name="title" id="title" type="text"/>
                @foreach ($errors->get('title') as $error)
                {{ $error }}
                @endforeach

            </p>

            <p>
                <label for="body">Body*</label>
                <textarea rows="4" cols="50" name="body" id="body"></textarea>
                <div class="error">{{ $errors->first('body') }}</div>
            </p>

            <p>
                <label for="author">Authors</label>
                <select name="author">
                    @foreach($authors as $author )
                        <option value="{{ $author['id'] }}"> {{ $author->username }} </option>
                    @endforeach
                </select>
            </p>

            <input type="submit" value="Submit"/>

        </fieldset>

    </form>

    @stop




