@extends('layouts.app') 
@section('content') 

@if ($posts->count()==0)
    <div class="alert alert-warning alert-dismissible fade show col-md-4 offset-md-4" role="alert">
        <strong>No result sir!</strong> Try again maybe?
    </div>
@endif

@foreach($posts as $post)
    <div class="col-lg-6 offset-lg-3 mb-3">
        <div class="card card-default">
            <div class="col-12">
                <div class="card-block">
                    <h3 class="card-title">{{$post->user->name}}</h3>
                    <p class="card-text">{{$post->content}}</p>
                    <a href="#" class="btn pull-left m-2"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{$post->likes->count()}} likes</a>
                    <a href="#" class="btn pull-left m-2"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> {{$post->dislikes->count()}} dislikes</a>

                    @if (!$post->likes->contains(Auth::user()))
                        {{ Html::linkRoute("posts.like",'Like', array($post->id), array('class' => 'btn btn-success pull-right m-2'))}}
                    @else
                        {{ Html::linkRoute("posts.unlike",'Liked', array($post->id), array('class' => 'btn btn-success pull-right m-2'))}}
                    @endif

                    @if (!$post->dislikes->contains(Auth::user()))
                        {{ Html::linkRoute("posts.dislike",'Dislike', array($post->id), array('class' => 'btn btn-danger pull-right m-2'))}}
                    @else
                        {{ Html::linkRoute("posts.undislike",'Disliked', array($post->id), array('class' => 'btn btn-danger pull-right m-2'))}}
                    @endif
                    {{ Html::linkRoute("share",'Share', array($post->id), array('class' => 'btn pull-right m-2'))}}
                </div>
            </div>
        </div>
    </div>
@endforeach 
@endsection