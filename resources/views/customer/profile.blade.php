@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
            <div class="col-lg-4">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Customer - Details</h4>
                    </div>
                    <br>
                    <div class="card-body">
                        
                    <div><img class="img-fluid" src="/img/passport/{{$customer->customer_image_file['passport']}}" alt=""></div>
                    <hr>
                    <div>Created at: {{Carbon::parse($customer->created_at)->format('l jS \of F Y h:i A')}}</div>
                   
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body browser">
                                <div class="col-lg-3 col-xlg-3 m-b-30">
                                       
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-times text-danger"></i><b>Name:</b> {{$customer->surname}} {{$customer->otherName}} </a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i><b>Gender:</b> @if(!$customer->gender)Male @else Female @endif</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i><b>Account No:</b><i> {{$customer->acct_no}}</i></a></li>
                                        </ul>
                                </div>
                                <div class="col-lg-4 col-xlg-3 m-b-30">
                                      
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i><b>Date of Birth:</b> {{Carbon::parse($customer->created_at)->format(' jS \of F Y ')}} </a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i><b>Phone:</b> {{$customer->phone}}</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i><b>Email:</b> {{$customer->email}}</a></li>
                                        </ul>
                                </div>
                                <div class="col-lg-3 col-xlg-3 m-b-30">
                                       
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i><b>Street:</b> {{$customer->street}}</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i><b>City:</b> {{$customer->city}}</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i><b>State:</b> {{$customer->state}}</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i><b>Postcode:</b>+{{$customer->postcode}} </a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i><b>Address:</b> {{$customer->address}}</a></li>


                                        </ul>
                                </div>
                        </div>
                    </div>
                </div>
           
        </div>
        
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Transactions</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Loan Schedule</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Summary</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Details</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Loan Collateral</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Loan Files</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Loan Comments</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="card-body">
                                    <div class="profiletimeline">
                                       
                                     
                                        <hr>
                                       
                                      
                                    </div>
                                </div>
                            </div>
                    <!--second tab-->
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="card-body">
                           
                            <hr>
                            <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus
                                elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                                it to make a type specimen book. It has survived not only five centuries </p>
                            <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                            <h4 class="font-medium m-t-30">Skill Set</h4>
                            <hr>
                            <h5 class="m-t-30">Wordpress <span class="pull-right">80 answered</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                            <h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                            <h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                            <h5 class="m-t-30">Photoshop <span class="pull-right">70%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="settings" role="tabpanel">
                        <div class="card-body">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="John Doe" value="{{Auth::user()->name}}" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="Zebra Theme@gmail.com" class="form-control form-control-line" value="{{Auth::user()->email}}" name="example-email" id="example-email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Message</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Select Skill Set
                                    </label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line">
                                                                        <option>London</option>
                                                                        
                                                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>


@endsection