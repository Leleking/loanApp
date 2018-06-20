@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-primary">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Change Password</h4>
                </div>
                @if($errors->any())
                @foreach($errors->all() as $error)
                    <p style='padding:15px;' class='bg-danger'>{{ $error }}</p>
                @endforeach
            @endif
            @if(Request::get('errorMessage') !== null)
                <p style='padding:15px;' class='bg-danger'>{{ Request::get('errorMessage') }}</p>
            @endif
                <div class="card-body">
                    <form method="post" action="/auth/password/changePassword">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="card-title m-t-15">Customer Detail</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Current Password</label>
                                        <input type="password" id="name" class="form-control" placeholder="Current Password" name="oldpass">
                                        <small class="form-control-feedback"> This is inline help </small> </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group has-danger">
                                        <label class="control-label">New Password</label>
                                        <input name="password" type="password" id="password" class="form-control form-control-danger" placeholder="New password">
                                     </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Confirm Password</label>
                                        <input name="password_confirmation" type="password" id="password_confirmation" class="form-control form-control-danger" placeholder="Confirm Password">
                                     </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
                            </div>
                           
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
  
  
@endsection
@section('js')


@endsection
