
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

        <td></td>
        <td>{{ $authors->username }}</td>
        <td>{{ $authors->first_name }}</td>
        <td>{{ $authors->last_name }}</td>
        <td>{{ $authors->email }}</td>
        <td>@foreach($authors->articles As $article)
                {{ $article->title }} ,

            @endforeach
        </td>

        </tbody>
    </table>
@stop




