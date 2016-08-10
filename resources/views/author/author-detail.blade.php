
@extends('layouts.app')

@section('title')

    AllAuthors

@stop

@section('content')
    <table>
        <thead>
        <tr>
            <th></th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Articles</th>
        </tr>
        </thead>
        <tbody>

        @foreach($allArticles as $article)
            <tr>
                <td></td>
                <td>{{ $article->username }}</td>
                <td>{{ $article->first_name }}</td>
                <td>{{ $article->last_name }}</td>
                <td>{{ $article->email }}</td>
                <td>@foreach($article->articles As $article)
                       {{ $article->title }} ,

                    @endforeach
                </td>



            </tr>

        @endforeach

        </tbody>
    </table>
@stop



 
