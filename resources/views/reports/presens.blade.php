@extends('layout')

@section('content')
<div class="container main">
  <div class="row">
    <div class="col-md-12">
        <h2>プレゼンレポート一覧</h2>
        <ul>
        @foreach ($presens as $presen)
            <li><a href="/reports/presens/{{$presen->id}}">{{$presen->title}} / {{$presen->user->name}}
                <span class="label label-primary"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> {{$presen->totalLikeCount()}}</span>
                 </a></li>
        @endforeach
        </ul>
    </div>
  </div>
</div>
@endsection
