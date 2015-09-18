@extends('layout')

@section('content')
<div class="container main">
  <div class="row">
    <div class="col-md-6 col-xs-12">
        <h2>{{$presen->fest->title}} プレゼンレポート</h2>
        <h3>{{$presen->title}}</h3>
        <h4>{{$presen->fest->date}} / {{$presen->user->name}}</h4>
    </div>
  </div>
  <div class="row">
      <div class="col-md-4 col-xs-12">
          <div>
              <img width="80%" src="https://dl.dropboxusercontent.com/u/141509/{{$presen->user->name}}.png">
          </div>
          <hr>
      </div>
  </div>
  <div class="row">
      <div class="col-md-4 col-xs-12">
        @foreach ($presen->feedbacks as $feedback)
            <div>
                <pre>{{$feedback->comment}}</pre>
                <div>{{$feedback->datetime}} / {{$feedback->user->name}}

                <span class="label label-primary"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> {{$presen->myLikeCount($feedback->user->id)}}</span>
                </div>
            </div>
        @endforeach
    </div>
  </div>
</div>
@endsection
