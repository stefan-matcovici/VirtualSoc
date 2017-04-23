@extends('layouts.before')

@section('title','VirtualSoc')

@section('content')
<div class="inner cover">
    <h1 class="cover-heading">VirtualSoc</h1>
    <p class="lead">Best social network out here. Try it for free and you will never regret it!</p>
    <p class="lead">
        {{ Html::link('/register','Let\'s go', array('class' => 'btn btn-lg btn-secondary')) }}
    </p>
</div>
 @stop