@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">

            <h3>  Create New Post </h3>

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


            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
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
                    <label for="tags">Post Tags</label>

                        @foreach($tags as $tag)
                        <div class="checkbox">

                            <label><input type="checkbox"  name="tags[]" value="{{ $tag->id }}">{{ $tag->tag }}</label>

                        </div>
                        @endforeach


                </div>



                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="blog_content" id="content" cols="5" rows="10" class="form-control z-depth-1"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">

                        <button class="btn btn-success" type="submit">Create Post</button>
                    </div>
                </div>

            </form>







        </div>

    </div>



    @stop