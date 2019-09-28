@extends('layouts.app')



@section('content')

    <div class="panel panel-default">

        <div class="panel-body">

            <table class="table">
            <thead class="thead-dark">
                <th>
                    Title
                </th>

                <th>
                    Image
                </th>

                <th>
                    Category
                </th>

                <th>
                    Update
                </th>

                <th>
                    Delete
                </th>
            </thead>
                <tbody style="background-color: #F3F3F3">

                @if($posts->count() > 0)

                    @foreach($posts as $post)
                        <tr>

                            <td>{{ $post->title }}</td>
                            <td><img src="{{$post->featured}}"  height="50px" width="70px" alt=""></td>

                            <td>{{ $post->category_id }}</td>
                            <td><a href="{{ route('post.edit',['id' => $post->id]) }}" class="btn btn-info ">Edit</a></td>
                            <td><a href="{{route('post.trash',['id'=>$post->id])}}" class="btn btn-danger">Trash</a></td>


                        </tr>

                    @endforeach


                @else

                    <tr>
                        <td colspan="5" class="text-center" > There is no Post</td>
                    </tr>

                @endif

                </tbody>


            </table>


        </div>

    </div>




@stop
