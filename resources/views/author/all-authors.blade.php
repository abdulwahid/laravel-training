
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
            <th>Edit Action</th>
            <th>Delete Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($authors as $user)
           <tr>
                <td></td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
               <td><a href="{{ url('/author/edit',$user->id)}}">Edit Author</a></td>
               <td><a href="{{ url('/author/delete',$user->id)}}">Delete Author</a></td>
               <td><a href="{{ url('/author/auth-article',$user->id)}}">Author Detail Page</a></td>

           </tr>

            @endforeach

        </tbody>
    </table>
    @stop



 
