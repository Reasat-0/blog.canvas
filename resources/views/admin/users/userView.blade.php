@extends('layouts.app')



@section('content')

    <div class="panel panel-default">

        <div class="panel-body">

            <table class="table">
                <thead class="thead-dark">
                <th>
                    Image
                </th>

                <th>
                    User
                </th>

                <th>
                    Type
                </th>

                <th>
                    Delete
                </th>
                </thead>
                <tbody style="background-color: #F3F3F3">

                @if($users->count() > 0)

                    @foreach($users as $user)
                        <tr>

                            <td><img src="{{ asset(@$user->profile->avatar) }}"  height="50px" width="50px" style="border-radius: 50%" alt=""></td>
                            <td>{{ $user->name }}</td>

                            <td>

                                @if($user->admin == 1)

                                    <a href="{{ route('cancel.admin',['id'=> $user->id]) }}" class="btn btn-danger"> Make User </a>


                                    @else

                                    <a href="{{ route('make.admin',['id'=>$user->id]) }}" class="btn btn-success"> Make Admin</a>


                                @endif




                            </td>

                            <td>

                                @if(Auth::id() !== $user->id)
                                <a href="{{ route('delete.profile',['id'=>$user->id]) }}" class="btn btn-danger">Trash</a>
                                @endif

                            </td>


                        </tr>

                    @endforeach


                @else

                    ta
                    <tr>
                        <td colspan="5" class="text-center" > No users found </td>
                    </tr>

                @endif

                </tbody>


            </table>


        </div>

    </div>




@stop
