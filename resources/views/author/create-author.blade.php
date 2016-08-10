@extends('layouts.app')

@section('title')
    CreateAuthor


@stop

@section('content')


    <h1>Create a New Author</h1>
    <form id="create_author" action="{{ url('/author/post-create') }}" method="post" >

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <fieldset>

            <?php// echo $validator;?>
            <p>
                <label for="username">Username*</label>
                <input name="username" id="username" type="text"/>
                @foreach ($errors->get('username') as $error)
                {{ $error }}
                @endforeach

            </p>

            <p>
                <label for="firstname">First Name*</label>
                <input name="firstName" id="firstName" type="text"/>
                <div class="error">{{ $errors->first('firstName') }}</div>
            </p>

            <p>
                <label for="lastname">Last Name*</label>
                <input name="lastName" id="lastName" type="text"/>
                <div class="error">{{ $errors->first('lastName') }}</div>
            </p>

            <p>
                <label for="email">Email*</label>
                <input name="email" id="email" type="email"/>
                <div class="error">{{ $errors->first('email') }}</div>

            </p>

            <input type="submit" value="Submit"/>

        </fieldset>

    </form>

    @stop




