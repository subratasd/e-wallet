@extends('layouts.admin.master')

@section('title', 'All Users')

@push('css')

    <!-- JQuery DataTable Css -->
    <link href="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

@endpush


@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2>


            </h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Users
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Balance</th>
                                    <th>Email Verify</th>
                                    <th>Mobile Verify</th>
                                    <th>Doc Verify</th>
                                    <th>Block</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Block</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($user as $users)
                                <tr>
                                    <th>{{$users->id}}</th>
                                    <td>{{$users->name}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>${{round($users->money,2)}}</td>
                                    <td>@if($users->emailV == 0)
                                        {{'Not Verify'}}
                                        @else {{'Verify'}} @endif</td>
                                    <td>@if($users->mobileV == 0)
                                            {{'Not Verify'}}
                                        @else {{'Verify'}} @endif</td>
                                    <td>@if($users->docV == 0)
                                            {{'Not Verify'}}
                                        @else {{'Verify'}} @endif</td>
                                    <td>@if($users->docV == 0)
                                            {{'block'}}
                                        @else {{'active'}} @endif</td>
                                    <td><a href=""><button class="btn btn-success waves-brown">View</button></a> </td>
                                    <td><a href=""><button class="btn btn-info waves-brown">Edit</button></a> </td>
                                    <td><a href=""><button class="btn btn-danger waves-brown">Block</button></a> </td>

                                </tr>

                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>


@endsection


@push('js')

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <script src="{{asset('backend/js/pages/tables/jquery-datatable.js')}}"></script>


@endpush