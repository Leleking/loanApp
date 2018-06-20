@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/lib/sweetalert/sweetalert.css">
@endsection
@section('content')
@include('layouts.partials.error')
@include('layouts.partials.success')
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-outline-primary">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit Customer<small> {{$customer->otherName}} {{$customer->surname}}</small></h4>
                </div>
                <div class="card-body">
                      {!!  Form::open(['action' => ['customerController@update', $customer->id]])!!}
                      <input type="hidden" name="_method" value="PUT">
                        <div class="form-body">
                            <h3 class="card-title m-t-15">Customer Detail</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Surname</label>
                                        <input type="text" id="name" class="form-control" placeholder="" value="{{$customer->surname}}" name="surname">
                                        <small class="form-control-feedback"> This is inline help </small> </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Other Names</label>
                                        <input name="otherName" type="text" id="lastName" class="form-control form-control-danger" placeholder="" value="{{$customer->otherName}}">
                                     </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label">Gender</label>
                                        <select name="gender" class="form-control custom-select">
                                            @if($customer->gender)
                                            <option value="0">Male</option>
                                            <option value="1" checked>Female</option>
                                            @else
                                            <option value="0" checked>Male</option>
                                            <option value="1" >Female</option>
                                            @endif
                                        </select>
                                        <small class="form-control-feedback"> Select your gender </small> </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Date of Birth</label>
                                        <input type="date" name="birth" id="birth" class="form-control" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                               
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phone Number</label>
                                        <div class="form-group">
                                                <input type="text" name="phone" class="form-control" placeholder="" value="{{$customer->phone}}">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <h3 class="box-title m-t-40">Address</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>Street</label>
                                        <input type="text" name="street" class="form-control" value="{{$customer->street}}">
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="{{$customer->email}}">
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" value="{{$customer->city}}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control" value="{{$customer->state}}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Post Code</label>
                                        <input type="number" name="postcode" class="form-control" value="{{$customer->postcode}}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Postal Address</label>
                                        <textarea name="address" id="address"  class="form-control">{{$customer->address}}</textarea>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
        <div class="col-lg-4">
                <div class="card">
                    <div class="card-body browser">
                        <p class="f-w-600">Customer Status <span id="status" class="pull-right">0%</span></p>
                        <div class="progress ">
                            <div role="progressbar" style="width: 0%; height:8px;" id="progressbar" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                        </div>
                        <br>
                        <p class="f-w-600">Account No. <span class="pull-right"><input name="acct_no" type="text" class="form-control" value="{{$customer->acct_no}};"></span></p>
                        <br>
                        <div class="form-actions">
                                <button type="submit" id="submit"  class="btn btn-success btn-rounded"> <i class="fa fa-check"></i> Save</button>
                                <button type="reset" id="reset"  class="btn btn-inverse btn-rounded">Cancel</button>
                            </div>
                      
                    </div>
                </div>
            </div>
        </form>

    </div>
    
</div>

@endsection
@section('js') 
<script>
    
    document.getElementById("birth").defaultValue = "<?php echo $birth?>";
</script>
<script scr="/js/main.js"></script>   
<script src="/js/lib/sweetalert/sweetalert.min.js"></script>
<script src="/js/ajax.js"></script>

@endsection