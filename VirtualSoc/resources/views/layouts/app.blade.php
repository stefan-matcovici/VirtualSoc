<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VirtualSoc</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      {{ Html::linkAction('HomeController@index',Auth::user()->name.'\'s dashboard',array(),array('class' => 'navbar-brand'))}} 
        {{Form::open(['url' => 'home/search', 'method' => 'get', 'class' => 'col-md-6'])}}
        <div class="input-group">
        <input type="text" class="form-control mr-2" placeholder="Find new friends!" name="name" aria-describedby="basic-addon1">
        <button class="btn btn-primary" type="submit">Search</button>
        </div>
        {{Form::close()}}
      <div class="collapse navbar-collapse justify-content-md-end" id="navbarNav">
             <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Requests
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        {{ Html::linkRoute("requests",'Show pending requests', array(), array('class' => 'dropdown-item')) }}
                        {{ Html::linkRoute("requests.incoming",'Show sent requests', array(), array('class' => 'dropdown-item')) }}
                    </div>
                </li>
                <li class="nav-item">
                    {{ Html::linkRoute("profile",'Profile', array(), array('class' => 'nav-link')) }}
                 </li>
                 <li class="nav-item">
                    {{ Html::linkRoute("user.friends",'Friends', array(), array('class' => 'nav-link')) }}
                 </li>
                <li class="nav-item">
                    {{ Html::linkRoute("posts",'Posts', array(), array('class' => 'nav-link')) }}
                 </li>
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Messages
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        {{ Html::linkRoute("messages",'Show all threads', array(), array('class' => 'dropdown-item')) }}
                        {{ Html::linkRoute("messages.create",'Create new thread', array(), array('class' => 'dropdown-item')) }}
                    </div>
                    
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                    </a>
                 </li>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                 </form>
             </ul>
         </div>
    </nav>

    <div class="jumbotron">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>