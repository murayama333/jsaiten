@extends('layout')

@section('content')
<div class="container main">
  <div class="row">
    <div class="col-md-12">
        <h2>{{$fest->title}}</h2>
        <ul>
        @foreach ($fest->presens as $presen)
            <li><a href="/presens/{{$presen->id}}">{{$presen->title}} / {{$presen->user->name}}</a></li>
        @endforeach
        </ul>
    </div>
  </div>
</div>
@endsection
