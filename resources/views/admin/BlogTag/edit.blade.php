@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">

            <h3> Edit Tag : {{$tags->tag}}</h3>

        </div>

        <div class="panel-body">



            <form action="{{route('tag.update',['id'=>$tags->id] )}}" method="post">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name"> Tag </label>
                    <input type="text" name="tag" class="form-control" value="{{$tags->tag}}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Tag</button>
                    </div>
                </div>

            </form>



            @include('admin.includes.errors')


        </div>

    </div>



@stop