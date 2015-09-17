@extends('layout')

@section('content')
<div class="container main">
  <div class="row">
    <div class="col-md-12">
        <h2>ユーザレポート一覧</h2>
        <ul>
        @foreach ($users as $user)
            <li><a href="/reports/users/{{$user->id}}">{{$user->name}}</a>
            <span class="label label-primary"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> {{$user->totalLikeCount()}}</span>

            </li>
        @endforeach
        </ul>
    </div>
  </div>
</div>
@endsection
