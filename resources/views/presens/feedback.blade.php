@extends('layout')

@section('content')
<div class="container main">
<div class="row">
    <div class="col-md-12">
    @if (Session::has('flash_message'))
        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
    @endif
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12">
        <h2><a href="/home">{{$feedback->presen->fest->title}}</a></h2>
        <h3><a href="/presens/{{$feedback->presen->id}}">{{$feedback->presen->title}}</a></h3>
        <h4>{{$feedback->presen->user->name}}</h4>
    </div>
  </div>
  <div class="row">
      <div class="col-md-5 col-xs-12">
        <div>
            <form action="/feedback/{{$feedback->presen_id}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="date">フィードバック
                    </label>
                    <textarea rows="5" class="form-control" id="comment" name="comment" placeholder="140文字程度">{{old('comment') != null ? old('comment') : $feedback->comment}}</textarea>
                </div>
                <input type="submit" value="フィードバック"
                class="btn btn-lg btn-success"
                >
                <div>
                @if ($feedback->updated_at != null)
                    （LastUpdate:{{$feedback->updated_at}}）
                @endif
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
