@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">

            <h3> Update Category : {{$id->name}}</h3>

        </div>

        <div class="panel-body">



            <form action="{{route('category.update',['id'=>$id->id] )}}" method="post">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control" value="{{$id->name}}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>

            </form>



            @include('admin.includes.errors')


        </div>

    </div>



@stop