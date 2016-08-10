@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome Admin</div>

                    <div class="panel-body">
                        Authors Information
                        <li><a href="{{ url('/author/create') }}">Create Authors</a></li>
                        <li><a href="{{ url('/author/list') }}">Select Authors</a></li>
                    </div>
                    <div class="panel-body">
                        Articles Information
                        <li><a href="{{ url('/article/create') }}">Create Articles</a></li>
                        <li><a href="{{ url('/article/list') }}">Select Articles</a></li>
                        <li><a href="{{ url('/author/articles')}}">Load All Articles</a></li>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
