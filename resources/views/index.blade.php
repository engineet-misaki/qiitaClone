@extends('layouts.app')

@section('content')
<div id="app" class="container">
    <div class="title"><h1>Qiita</h1></div>
    @foreach($articleArray as $index=> $articles)
    @foreach($articles as $article)
    @if($article['likes_count'] < 500)
        @continue
    @endif
    <div class="content">
        <h2><a href="{{ url('articles', [$index]) }}" target="">{{$article['title']}}</a></h2>
        <div class="outline">
            <p>
                <img class="imgQiita" src="{{$article['user']['profile_image_url']}}" alt="">
            </p>
            <p class="count">
                LikeCount : {{ $article['likes_count'] }}
                <br>
                ReactionCount : {{ $article['reactions_count'] }}
            </p>
        </div>
        <h6>{{substr($article['updated_at'], 0, 10)}}</h6>
    </div>
    @endforeach
    @endforeach
</div>
@endsection


<style>
.container{
    margin: 40px 20%;
}

.outline p{
    display: table-cell;
    vertical-align: middle;
    padding: 10px;
}
.count{
    margin-left: 20px;
}
.imgQiita{
    display: inline-block;
    height: 80px;
}
a{
    margin-left: 20px;
}
h2{
    border-bottom: solid gainsboro;
}
.content{
    border: solid 0.2px;
    margin: 10px;
}
h6{
    text-align: right;
    margin: 0 10px;
}
</style>