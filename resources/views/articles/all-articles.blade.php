
@extends('layouts.app')

@section('title')

    AllArticles

@stop

@section('content')
    <table>
        <thead>
        <tr>
            <th></th>
            <th>Title</th>
            <th>Content</th>
            <th>Edit</th>
            <th>Delete</th>


        </tr>
        </thead>
        <tbody>

        @foreach($articles as $article)
            <tr>
                <td></td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->body }}</td>
                <td><a href="{{ url('/article/edit',$article->id)}}">Edit Article</a></td>
                <td><a href="{{ url('/article/delete',$article->id)}}">Delete Article</a></td>

            </tr>

        @endforeach

        </tbody>
    </table>
@stop



 
