@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">

            <h3>  Edit Your Profile </h3>

        </div>

        <div class="panel-body">



            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" name="password" value="" >
                </div>

                <div class="form-group">
                    <label for="file">Upload New Avatar</label>
                    <input type="file" class="form-control" name="avatar">
                </div>

                <div class="form-group">
                    <label for="email">About You</label>
                    <textarea name="about" id="" class="form-control" cols="6" rows="6"></textarea>
                </div>

                <div class="form-group">
                    <label for="facebook">facebook</label>
                    <input type="text" class="form-control" name="facebook" value="">
                </div>


                <div class="form-group">
                    <button class="btn btn-success">Save Profile</button>
                </div>

            </form>



            {{--            @if(count($errors) > 0)

                            <ul class="list-group">

                                @foreach($errors->all() as $error)

                                    <li class="list-group-item-danger">

                                        {{ $error }}

                                    </li>




                                @endforeach


                            </ul>

                        @endif--}}



        </div>

    </div>



@stop