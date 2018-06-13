@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/lib/sweetalert/sweetalert.css">
@endsection
@section('content')
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-outline-primary">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Add new Guarantor</h4>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="form-body">
                            <h3 class="card-title m-t-15">Guarantor Detail</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Guarantor's Name</label>
                                        <input type="text" id="name" class="form-control" placeholder="Doe" name="name">
                                      </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-12">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Guarantor's Mobile Number</label>
                                        <input name="phone" type="text" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                     </div>
                                </div>
                                <!--/span-->
                            </div>
                           
                           
                            <h3 class="box-title m-t-40">Address</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Guarantor's Address</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div>
                            </div>
                           
                            <!--/row-->
                           
                        </div>
                   
                </div>
            </div>
        </div>
        <div class="col-lg-4">
                <div class="card">
                    <div class="card-body browser">
                        <p class="f-w-600">Guarantor's Status <span id="status" class="pull-right">0%</span></p>
                        <div class="progress ">
                            <div role="progressbar" style="width: 0%; height:8px;" id="progressbar" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                        </div>
                        <br>
                         
                             <div class="form-group">
                                <label class="control-label">Customer Name and Acct_no</label>
                                <select name="customer_id" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                        @foreach($customer as $customers)
                                        
                                        <option value="{{$customers->id}}">{{$customers->surname." ".$customers->otherName}}({{$customers->acct_no}})</option>
                                        
                                        @endforeach
                                        
                                    </select>    
                             </div>
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
    $(document).ready(function(){
    $('#submit').click(function(e){
        e.preventDefault();
       if(ajaxPostFunction('/addGuarantor')) {
        $('#progressbar').css('width','80%');
       }
        
    
    })
    })
</script>
<script scr="/js/main.js"></script>   
<script src="/js/lib/sweetalert/sweetalert.min.js"></script>
<script src="/js/ajax.js"></script>

@endsection