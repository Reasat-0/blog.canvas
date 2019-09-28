@extends('layouts.app')

<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>




@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">

            <h3>  Sign Up here </h3>

        </div>

        <div class="panel-body">



            {{--            Error Message showing part                  --}}


            @if(count($errors) > 0)

                <ul class="list-group">

                    @foreach($errors->all() as $error)

                        <li class="list-group-item-danger">

                            {{ $error }}

                        </li>




                    @endforeach


                </ul>

            @endif



            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">


                {{ csrf_field() }}
                <fieldset>
                    <div id="legend">
                        <legend class="">Register</legend>
                    </div>
                    <div class="control-group">
                        <!-- Username -->
                        <label class="control-label"  for="username">Username</label>
                        <div class="controls">
                            <input type="text" id="username" name="name" placeholder="" class="input-xlarge">
                            <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- Username -->
                        <label class="control-label"  for="username">Password</label>
                        <div class="controls">
                            <input type="password" id="username" name="password" placeholder="" class="input-xlarge">
                            <p class="help-block">Password should be more than 6 characters</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">Image</label>
                        <div class="controls">
                            <input type="file" id="email" name="avatar" placeholder="" class="input-xlarge"> <br>
{{--                            <p class="help-block">Please choose your image</p>--}}
                        </div>
                    </div>



                    <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">E-mail</label>
                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                            <p class="help-block">Please provide your E-mail</p>
                        </div>
                    </div>


                    <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-success">Register</button>
                        </div>
                    </div>
                </fieldset>
            </form>










            {{--<form  method="post" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>


                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>






                <div class="form-group">
                    <div class="text-center">

                        <button class="btn btn-success" type="submit">Sign Up</button>
                    </div>
                </div>

            </form>
--}}






        </div>

    </div>



@stop