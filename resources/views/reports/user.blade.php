@extends('layout')

@section('content')
<div class="container main">
  <div class="row">
    <div class="col-md-6 col-xs-12">
        <h2>ユーザレポート</h2>
        <h3>{{$user->name}}</h3>
    </div>
  </div>

  <div class="row">
      <div class="col-md-4 col-xs-12">
        @foreach ($user->feedbacks as $feedback)
            <div>
                <h4>{{$feedback->presen->title}} / {{$feedback->presen->user->name}}

                    <span class="label label-primary"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> {{$feedback->presen->myLikeCount($feedback->user->id)}}</span>
                    </h4>
                <pre>{{$feedback->comment}}</pre>
                <hr>

            </div>

        @endforeach
    </div>
  </div>
</div>
@endsection
