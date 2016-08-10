@extends('layouts.app')

@section('title')
    CreateAuthor


@stop

@section('content')


    <h1>Edit Author</h1>
    <form id="edit_author" action="{{ action('AuthorController@saveEditAuthor', ['id' =>  $author->id]) }}" method="post" >

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="authorID" value="{{ $author->id }}">

        <fieldset>

            <?php// echo $validator;?>
            <p>
                <label for="username">Username*</label>
                <input name="username" id="username" type="text" value="{{ $author->username }}"/>
                @foreach ($errors->get('username') as $error)
                {{ $error }}
                @endforeach

            </p>

            <p>
                <label for="firstname">First Name*</label>
                <input name="firstName" id="firstName" type="text" value="{{ $author->first_name }}"/>
            <div class="error">{{ $errors->first('firstName') }}</div>
            </p>

            <p>
                <label for="lastname">Last Name*</label>
                <input name="lastName" id="lastName" type="text" value="{{ $author->last_name }}"/>
            <div class="error">{{ $errors->first('lastName') }}</div>
            </p>

            <p>
                <label for="email">Email*</label>
                <input name="email" id="email" type="email" value="{{ $author->email }}"/>
            <div class="error">{{ $errors->first('email') }}</div>

            </p>

            <input type="submit" value="Submit"/>

        </fieldset>

    </form>

    @stop




