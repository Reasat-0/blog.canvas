@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">

            <h3>  Create New Post </h3>

        </div>

        <div class="panel-body">



            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create New Category</button>
                    </div>
                </div>

            </form>



            @if(count($errors) > 0)

                <ul class="list-group">

                    @foreach($errors->all() as $error)

                        <li class="list-group-item-danger">

                            {{ $error }}

                        </li>




                    @endforeach


                </ul>

            @endif



        </div>

    </div>



@stop