@extends('layouts.app') 
@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-sm-1">
            <div class="panel panel-default">
                <div class="panel-body">
                {{ Form::open(array('route' => array('posts'))) }}    

                    <div class="form-group">
                        {{ Form::label('name', 'Name',array('class' => 'col-md-4 control-label')) }}
                        <div class="col-md-12 offset-xs-1">
                            {{ Form::text('name',$profile->name,array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('surname', 'Surname',array('class' => 'col-md-4 control-label'))}}
                        <div class="col-md-12 offset-xs-1">
                            {{ Form::text('surname',$profile->surname,array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', 'Description',array('class' => 'col-md-4 control-label')) }}
                        <div class="col-md-12 offset-xs-1">
                            {{ Form::textarea('description',$profile->description,array('class' => 'form-control')) }}
                        </div>
                    </div> 

                    <div class="form-group">
                        {{ Form::label('date_of_birth', 'Date of birth',array('class' => 'col-md-4 control-label')) }}
                        <div class="col-md-12 offset-xs-1">
                            {{ Form::date('date_of_birth',$profile->date_of_birth,array('class' => 'form-control')) }}
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="col-md-6 offset-lg-5">
                            {{ Form::submit('Update',array('class' => 'btn btn-lg btn-warning')) }}
                        </div>
                    </div>

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection