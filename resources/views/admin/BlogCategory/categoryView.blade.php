@extends('layouts.app')



@section('content')

    <div class="panel panel-default">

        <div class="panel-body">

            <table class="table table-hover">

                <th>
                    Category Name
                </th>

                <th>
                    Editting
                </th>

                <th>
                    Delete
                </th>


                <tbody>

                @foreach($category as $cat)
                    <tr>



                        <td>

                            {{ $cat->name }}

                        </td>

                        <td>

                            <a class="btn btn-info" href="{{route('category.edit',['id'=> $cat->id])}}">

                                <span class="glyphicon glyphicon-pencil">Edit</span>

                            </a>

                        </td>
                        <td>


                            <a class="btn btn-danger" href="{{route('category.delete',['id'=> $cat->id])}}">

                                <span class="glyphicon glyphicon-trash">Delete</span>

                            </a>
                        </td>




                        @endforeach

                    </tr>


                </tbody>


            </table>


        </div>

    </div>




    @stop
