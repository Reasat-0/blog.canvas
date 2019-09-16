@extends('layouts.app')



@section('content')

    <div class="panel panel-default">

        <div class="panel-body">

            <table class="table">
                <thead class="thead-dark">
                <th>
                    image
                </th>

                <th>
                    User
                </th>

                <th>
                    Type
                </th>

                <th>
                    Update
                </th>

                <th>
                    Delete
                </th>
                </thead>
                <tbody style="background-color: #F3F3F3">

                @if($users->count() > 0)

                    @foreach($users as $user)
                        <tr>

                            <td><img src="{{ asset($user->profile->avatar) }}"  height="50px" width="50px" style="border-radius: 50%" alt=""></td>
                            <td>{{ $user->name }}</td>



                            <td>Permissions</td>
                            <td><a href="" class="btn btn-info ">Edit</a></td>
                            <td><a href="" class="btn btn-danger">Trash</a></td>


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
