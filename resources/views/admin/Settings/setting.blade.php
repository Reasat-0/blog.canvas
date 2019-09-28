@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">

            <h3>  Settings </h3>

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


            <form action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Site Name</label>
                    <input type="text" name="site_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Site Email</label>
                    <input type="text" name="site_email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Contact Number</label>
                    <input type="text" name="site_contact" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Site Address</label>
                    <input type="text" name="site_address" class="form-control">
                </div>



                <div class="form-group">
                    <div class="text-center">

                        <button class="btn btn-success" type="submit">Create Settings</button>
                    </div>
                </div>

            </form>







        </div>

    </div>



@stop