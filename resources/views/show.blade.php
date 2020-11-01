@extends('layouts.app')

@section('content')
<div id="app" class="container">
        <div class="col-md-10 col-md-offset-2">
            <h2>{{$article['title']}}</h2>
            <!-- <pre> -->
            <?php
            echo $article['rendered_body'];
            ?>
            <!-- </pre> -->
        </div>
</div>

@endsection

<style>
.fa-link {
    width: 100%;
}
</style>