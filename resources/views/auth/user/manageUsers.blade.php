
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/lib/sweetalert/sweetalert.css">
@endsection
@section('content')
<div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Customer Data Export </h4>
                        <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                        <tr>
                                                <th>User Id</th>
                                                <th>Name</th>
                                                <th>email</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                                
        
                                            </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                            <th>User Id</th>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                            
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($users as $user )
                                   
                                    <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>@if($user->status) Active @else Inactive @endif</td>
                                            <td>{{$user->created_at}}</td>
                                            
                                            <td><a href="" user="{{$user->id}}"  class="trigger"><button class="btn btn-dark btn-rounded "><i class="fa fa-edit"></i></button></a>
                                               <a href=""><button class="btn btn-success btn-rounded "><i class="fa fa-eye"></i></button></a>
                                               <a href=""><button status="{{$user->id}}" class="btn btn-danger  btn-rounded" id="activate" ">@if($user->status) <i class="fa fa-remove"></i> @else <i class="fa fa-check"></i> @endif</button></a>
                                            </td>
                                        </tr> 
                                    @endforeach
                                   
                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
       <!-- Button trigger modal -->
       <!-- Modal structure -->

    
     
    <!-- Trigger to open Modal -->
    
          <!-- Modal -->
        
          
  
  
@endsection
@section('js')
<script src="/js/manageUser.js"></script>


    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/js/ajax.js"></script>



@endsection
