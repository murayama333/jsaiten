@extends('layout')

@section('content')
<div class="container main">

  <div class="row">
    <div class="col-md-12 col-xs-12">
        <h2><a href="/home">{{$presen->fest->title}}</a></h2>
        <h3>{{$presen->title}}</h3>
        <h4>{{$presen->user->name}}</h4>
    </div>
  </div>
  <div class="row">
      <div class="col-md-4 col-xs-12">
          <div>
              <img width="80%" src="https://dl.dropboxusercontent.com/u/141509/{{$presen->user->name}}.png">
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12 col-xs-12">
        <div>
            <div style="margin-top:10px; margin-bottom:10px" id="likeCount">{{$presen->myLikeCount(Auth::user()->id)}}</div>
            <form>
                <a href="/feedback/{{$presen->id}}" class="btn btn-lg btn-success">フィードバック</a>

                <input id="like" type="button" name="name" value="いいね！"
                class="btn btn-lg btn-info"
                >
            </form>
        </div>
    </div>
  </div>
</div>
<script>
(function(){
    $("#like").click(function(){
        $.get("/like/{{$presen->id}}",
            function(res){
                $("#likeCount").text(res.likeCount);
            }
        );
        $("#likeCount").text("（´-`）.｡oO（通信中・・・）");
    });
})();
</script>
@endsection
