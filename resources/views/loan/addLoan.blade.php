@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/lib/sweetalert/sweetalert.css">
@endsection
@section('content')
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-outline-primary">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Add new Loan</h4>
                </div>
                <div class="card-body">
                    <form action="#" name="loandata">
                        <div class="form-body">
                            <h3 class="card-title m-t-15">Loan Detail</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Loan Date</label>
                                        <input type="date" name="loan_date" id="name" class="form-control" >
                                      </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Principal Amount</label>
                                        <input name="principal" step="any" onchange="calculate();" type="number" id="principal"  class="form-control form-control-danger" placeholder="">
                                     </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">File Charge(%)</label>
                                            <input type="number" name="file" step="any" id="file_charge" class="form-control" >
                                          </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Interest Rate(% per year)</label>
                                            <input name="interest" type="number" step="any" onchange="calculate();" id="interest" class="form-control form-control-danger" placeholder="">
                                         </div>
                                    </div>
                                    <!--/span-->
                            </div>
                            <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Time Period(ie years)</label>
                                            <input type="number" name="years" step="any" onchange="calculate();" id="years" class="form-control" >
                                          </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Penalty(%)</label>
                                            <input name="penalty" type="number" step="any" id="penalty" class="form-control form-control-danger" placeholder="">
                                         </div>
                                    </div>
                                    <!--/span-->
                            </div>
                            <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="row">
                                                <div class="col-md-4">
                                            <div class="form-group">
                                                    <label class="control-label">EMI Type</label><br>
                                                    <input type="radio" name="emi_type"  value="0" class="" >Flat EMI <br>
                                                    <input type="radio" name="emi_type"  value="1" class="" >Reducing Balance
                                                  </div>
                                                </div>
                                                <div class="col-md-5">
                                                        <label class="control-label">Choose Loan Type</label>
                                                        <select name="loanType_id" class="form-control custom-select" data-placeholder="Choose a Loan Type" tabindex="1">
                                                                @foreach($loan_type as $loan_types)
                                                                
                                                                <option value="{{$loan_types->id}}">{{$loan_types->name}}</option>
                                                                
                                                                @endforeach
                                                                
                                                            </select>    
                                                </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="ad_emi" class="control-label">Advanced EMI</label><br>
                                                        <input type="radio" name="ad_emi" id="name" value="1"ass="" >Yes <br>
                                                        <input type="radio" name="ad_emi" id="name" value="0" class="" >No
                                                      </div>
                                                </div>
                                                <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Payment Mode</label><br>
                                                            <input type="radio" name="pay_mode" value="1" id="name" class="" >Cheque <br>
                                                            <input type="radio" name="pay_mode" id="name" value="0" class="" >Bank
                                                          </div>
                                                    </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                           
                           
                            <hr>
                            <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Monthly Paymentment</label>
                                            <input type="number" step="any" readonly name="payment"  id="payment" class="form-control" >
                                           
                                          </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Interest Amount per Year</label>
                                            <input name=""  type="number" id="lastName" class="form-control form-control-danger" placeholder="">
                                         </div>
                                    </div>
                                    <!--/span-->
                            </div>
                            <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Total Interest Amount of Time Period</label>
                                            <input type="number" step="any" readonly name="totalinterest"  id="totalinterest" class="form-control" >
                                           
                                          </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Total Amount</label>
                                            <input  name="total" step="any" readonly type="number" id="lastName" class="form-control form-control-danger" placeholder="">
                                            
                                        </div>
                                    </div>
                                    <!--/span-->
                            </div>
                            <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">EMI Amount</label>
                                            <input type="number" readonly step="any" name="emi"   id="name" class="form-control" >
                                            
                                          </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Net Amount</label>
                                            <input name="phone" readonly type="number" id="lastName" class="form-control form-control-danger" placeholder="">
                                         </div>
                                    </div>
                                    <!--/span-->
                            </div>
                           
                           
                            <!--/row-->
                           
                        </div>
                   
                </div>
            </div>
        </div>
        <div class="col-lg-4">
                <div class="card">
                    <div class="card-body browser">
                        <p class="f-w-600">Customer's Status <span id="status" class="pull-right">70%</span></p>
                        <div class="progress ">
                            <div role="progressbar" style="width: 0%; height:8px;" id="progressbar" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                        </div>
                        <br>
                         
                            
                             <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label>Customer Name</label>
                                            <input type="text" disabled name="name" value="{{$customer->surname}} {{$customer->otherName}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label>Customer Account No</label>
                                                <input type="text" disabled name="acct_no" value="{{$customer->acct_no}}" class="form-control">
                                            </div>
                                    </div>
                                    <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label>Customer Phone</label>
                                                <input type="text" disabled name="phone" value="{{$customer->phone}}" class="form-control">
                                            </div>
                                    </div>
                                    <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label>Customer's Address</label>
                                                <input type="text" disabled name="address" value="{{$customer->address}}" class="form-control">
                                            </div>
                                    </div>
                                    <input type="text" hidden value="{{$customer->id}}" name="customer_id">
                                </div>
                        <br>
                        <div class="form-actions">
                               
                                <button   id="submit"  class="btn btn-success btn-rounded"> <i class="fa fa-check"></i> Save</button>
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
-->
<script language="JavaScript">
    $(document).ready(function(){
      $('#submit').click(function(e){
          e.preventDefault();
          ajaxPostFunction('/addCustomerLoan');
      })
    })
</script>
<script scr="/js/main.js"></script>   
<script src="/js/lib/sweetalert/sweetalert.min.js"></script>
<script src="/js/ajax.js"></script>

@endsection
