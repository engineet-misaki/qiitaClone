@extends('layouts.app')

@section('content')
<div id="app" class="container bg-light">
        <div class="col-md-10 col-md-offset-2">
            <h2 class="p-5">{{$article['title']}}</h2>
            <?php
            echo $article['rendered_body'];
            ?>
        </div>
</div>

@endsection

<style>
.fa-link {
    width: 100%;
}
</style>