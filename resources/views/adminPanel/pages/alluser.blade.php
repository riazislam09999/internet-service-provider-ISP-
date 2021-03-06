@extends('layouts.admin_master')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Manage User</strong>
                    </div>
                    @if(session('message'))
                    <h4 style="color:red;" class="text-center">
                        {{session('message')}}
                    </h4>
                    @endif
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sri.No</th>
                                    <th>Id</th>
                                    <th>Customer Name</th>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>Pakage</th>
                                    <th>price</th>
                                  
                                    <th>connection</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($alluser as $view_user)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$view_user->id}}</td>
                                    <td> <a href="{{url('userprofile')}}/{{$view_user->id}}" style="color:blue"> {{$view_user->customer_name}}</a> </td>
                                    <td> <a href="" style="color:#82b965">{{$view_user->user_name}} </a></td>
                                    <td>{{$view_user->customer_phone}}</td>
                                    <td>{{$view_user->pakages->pakage_type}}</td>
                                    <td>{{$view_user->pakages->pakage_price}}</td>
                                   


                                    <td>
                                        @if($view_user->status==1)
                                        <button style="color:white ;background-color:green "><a style="color:white"
                                                href="{{url('userPublish')}}/{{$view_user->id}}">ON</a></button>
                                        @else
                                        <button style=" color:white ;background-color:red"><a style="color:white"
                                                href="{{url('userUnpublish')}}/{{$view_user->id}}">OFF</a></button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" style="color:white  ;background-color:red"
                                                class="btn "><a style="color:white"
                                                    href="{{url('userDelete')}}/{{$view_user->id}}"> Delete</a></button>

                                            <button type="button" style=" color:white ;background-color:aqua"
                                                class="btn "><a style="color:white"
                                                    href="{{url('userEdit')}}/{{$view_user->id}}">Updated/Edit</a></button>

                                        </div>
                                    </td>
                                </tr>
                                @empty


                                <tr class='text-center' style="color:red">
                                    <td colspan="12">No available data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->



@endsection