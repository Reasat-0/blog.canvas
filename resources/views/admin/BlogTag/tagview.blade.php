@extends('layouts.app')



@section('content')

    <div class="panel panel-default">

        <div class="panel-body">

            <table class="table">
                <thead class="thead-dark">
                <th>
                    Tag
                </th>

                <th>
                    Post
                </th>

                <th>
                    Update
                </th>

                <th>
                    Delete
                </th>
                </thead>
                <tbody style="background-color: #F3F3F3">

                @if($tags->count() > 0)

                    @foreach($tags as $tag)
                        <tr>

                            <td>{{ $tag->tag }}</td>
                            {{--<td><img src="{{$post->featured}}"  height="50px" width="70px" alt=""></td>--}}

                            <td>post_id</td>
                            <td><a href="{{ route('tag.edit',['id' => $post->id]) }}" class="btn btn-info ">Edit</a></td>
                            <td><a href="{{route('tag.delete',['id'=>$post->id])}}" class="btn btn-danger">Delete</a></td>


                        </tr>

                    @endforeach


                @else

                    ta
                    <tr>
                        <td colspan="5" class="text-center" > There is no Tag</td>
                    </tr>

                @endif

                </tbody>


            </table>


        </div>

    </div>




@stop
