@extends('layouts.app') 
@section('content')

@if ($friends->count()==0)
    <div class="alert alert-warning alert-dismissible fade show col-md-4 offset-md-4" role="alert">
        <strong>No result sir!</strong> Try again maybe?
    </div>
@endif

@foreach($friends as $user)
<div class="col-md-8 offset-md-2 mb-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$user->name}}</h3>
        </div>
        <div class="card-block">
            <p class="card-text"><i class="fa fa-lightbulb-o fa-5x" aria-hidden="true"></i> {{$user->profile->description}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="fa fa-newspaper-o mx-2" aria-hidden="true"></i>{{$user->profile->surname}} {{$user->profile->name}}</li>
            <li class="list-group-item"><i class="fa fa-envelope-o mx-2 "></i>{{$user->email}}</li>
            <li class="list-group-item"><i class="fa fa-birthday-cake mx-2" aria-hidden="true"></i>{{$user->profile->date_of_birth}}</li>
        </ul>
        <div class="card-block">
            {{ Html::linkRoute("user.posts",$user->posts->count().' posts', array($user->id), array('class' => 'card-link')) }}
            <a data-toggle="collapse" href="#collapse{{$user->id}}" aria-expanded="false" aria-controls="collapse{{$user->id}}">
                {{$user->friends->count()}} friends
            </a>
            <div class="collapse" id="collapse{{$user->id}}">
                <div class="card card-block mb-2">
                    <ul class="list-group list-group-flush">
                        @foreach ($user->friends as $friend)
                            <li class="list-group-item">
                                {{ Html::linkRoute("user.profile",$friend->name, array($friend->id), array()) }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{ Html::linkRoute("user.friends.delete",'Remove from friends', array($user->id), array('class' => 'btn btn-danger pull-right m-2'))}}
        </div>
    </div>
</div>

@endforeach 
@endsection