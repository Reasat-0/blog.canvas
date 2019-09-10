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
                    Restore
                </th>
                <th>
                    Destroy
                </th>
                </thead>
                <tbody style="background-color: #F3F3F3">

                @if($trashedPost->count() > 0 )

                    @foreach($trashedPost as $post)
                        <tr>

                            <td>{{ $post->title }}</td>
                            <td><img src="{{$post->featured}}"  height="50px" width="70px" alt=""></td>

                            <td>{{ $post->category_id }}</td>

                            <td><a href="{{ route('post.restore',['id'=>$post->id ]) }}" class="btn btn-success">Restore</a></td>
                            <td><a href="{{ route('post.kill',['id' => $post->id]) }}" class="btn btn-danger">Delete</a></td>


                        </tr>

                    @endforeach

                @else

                    {{--{{ session()->flash('warning','No Trashed Post here') }}--}}
                    <tr>
                        <td colspan="5" class="text-center" > There is no Post</td>
                    </tr>

                @endif

                </tbody>


            </table>


        </div>

    </div>




@stop
