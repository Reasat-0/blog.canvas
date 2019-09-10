@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">

            <h3>  Edit The Post </h3>

        </div>

        <div class="panel-body">



            <form action="{{route('post.update',['id' =>$post->id ])}}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value = "{{$post->title}}">
                </div>

                <div class="form-group">
                    <label for="featured_image">Image</label>
                    <input type="file" name="featured_image" class="form-control-file" >
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category_id" id="cat">

                        @foreach ($category as $cat)

                            <option value="{{$cat->id}}">{{$cat->name}}</option>

                        @endforeach


                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="blog_content" id="content" cols="5" rows="10" class="form-control z-depth-1" >{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">

                        <button class="btn btn-success" type="submit">Update Post</button>
                    </div>
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