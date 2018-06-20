@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/iziModal.min.css"> 
<link rel="stylesheet" href="/css/lib/sweetalert/sweetalert.css">
@endsection
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
                        
                    <div><img class="img-fluid" width="250px" height="250px" src="/img/passport/{{$customer->customer_image_file['passport']}}" alt=""></div>
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
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-danger"></i><b>Name:</b> {{$customer->surname}} {{$customer->otherName}} </a></li>
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
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#transactions" role="tab">Transactions</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#summary" role="tab">Summary</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#details" role="tab">Details</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#collateral" role="tab">Loan Collateral</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#guarantors" role="tab">Loan Guarantors</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                        <div class="tab-pane active" id="transactions" role="tabpanel">
                                <div class="card-body">
                                  
                                  
                                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr> 
                                                                <th>Loan_ID</th>
                                                                <th>Loan Date</th>
                                                                <th>Due Date</th>
                                                                <th>Remaining Emi</th>
                                                                <th>Emi Paid</th>
                                                                <th>Penalty</th>
                                                                <th>Undeposited Penalty</th>
                                                                <th>Pay Mode</th>
                                                                <th>Created Date</th>
                                                                <th>Print Statement</th>

                            
                                                                </tr>
                                                    </thead>
                                                   
                                                    <tbody>
                                                            @foreach ($payment as $payments )
                                                        <tr>
                                                                <td>{{$payments->id}}</td>
                                                                <td>{{Carbon::parse($payments->loan_date)->format('l jS  F Y') }}</td>
                                                                <td>{{Carbon::parse($payments->due_date)->format('l jS  F Y') }}</td>
                                                                <td>{{$payments->remaining_emi}}</td>
                                                                <td>{{$payments->emi}}</td>
                                                                <td>{{$payments->penalty}}</td>
                                                                <td>{{$payments->undeposited_penalty}}</td>
                                                                <td>@if($payments->pay_mode) Bank @else Cheque @endif</td>
                                                                <td>{{Carbon::parse($payments->created_at)->format('l jS  F Y') }}</td>
                                                                <td><a href=""><button class="btn btn-danger btn-rounded "><i class="fa fa-print"></i></button></a></td>
                                                            </tr> 
                                                        @endforeach
                                                       
                                                   
                                                    </tbody>
                                            </table>
                                           
                                    
                                     
                                       
                                       
                                      
                                    
                                </div>
                            </div>
                    <!--second tab-->
                    <div class="tab-pane" id="details" role="tabpanel">
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
                    
                    <div class="tab-pane" id="collateral" role="tabpanel">
                            <div class="card-body">
                                   
                                    
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                    <tr>
                                                            <th>Collateral Name</th>
                                                            <th>Collateral Detail</th>
                                                            <th>Collateral docs</th>
                                                            <th>Collateral Scanned</th>
                                                        </tr>
                                            </thead>
                                            <tbody>
                                              
                                                @foreach ($customer->collateral as $collateral )
                                               
                                                <tr>
                                                      <td>{{$collateral->name}}</td>
                                                      <td>{{$collateral->about}}</td>
                                                      <td><a href="/img/collateral/{{$collateral->docs}}" target="_blank">{{$collateral->docs}}</a></td>
                                                      <td><a href="/img/collateral/{{$collateral->scan}}" target="_blank">{{$collateral->scan}}</a></td>
                                                       
                                                       
                                                       
                                                    </tr> 
                                                    @endforeach
                                              
                                               
                                           
                                            </tbody>
                                        </table>
                                   
                            </div>
                    </div>
                    <?php
                    $dt     = new Carbon($payment_last->created_at);
                   
                 // 10 days ago
                    $date_last = $dt->diffForHumans();  
                    $dt     = new Carbon($payment_last->due_date);
                    $date_due = $dt->diffForHumans();
                    
                    $loan_last = App\loan::where('id',$payment_last->loan_id)->orderBy('id','desc')->first();
                     if(Carbon::now() > $payment_last->due_date){
                     
                       $due_date = $payment_last->due_date;
                     $date = Carbon::parse($due_date);
                     $now = Carbon::now();
                     $diff_days = $date->diffInDays($now);
                     $diff_months = $date->diffInMonths($now);
                     $arrears = 0;
                    
                     for($i = 1;$i<=$diff_months;$i++){
                         $arrears = $arrears + $loan_last->emi;
                     };
                     }
                     else{
                     $arrears = 0;
                     $diff_months = 0;
                     $diff_days = 0;
                     }
                     ?>
                    <div class="tab-pane" id="summary" role="tabpanel">
                            <table class="table table-striped">
                                    <thead>
                                     
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">Timely Repayments:</th>
                                        <td>{{ round(((($loan_last->total/$loan_last->emi) -$payment_last->remaining_emi)/($loan_last->total/$loan_last->emi)) * 100)}}%</td>
                                        <td>Last Payment:</td>
                                        <td>{{$date_last}}, {{Carbon::parse($payment_last->created_at)->format('l jS  F Y') }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Amount in Arrears:</th>
                                        <td>{{$arrears}}</td>
                                        <td>Next Payment:</td>
                                        <td>@if(Carbon::now() > $payment_last->due_date) <span style="color:red"> @else <span> @endif {{$date_due}}, {{Carbon::parse($payment_last->due_date)->format('l jS  F Y') }}</span> </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Days in Arrears:</th>
                                        @if(Carbon::now() > $payment_last->due_date)
                                        <?php
                                          $due_date = $payment_last->due_date;
                                        $date = Carbon::parse($due_date);
                                        $now = Carbon::now();
                                        $diff = $date->diffInDays($now);;
                                        ?>
                                        @else
                                        <?php $diff = 0;?>
                                        @endif
                                        <td>{{$diff_days}}</td>
                                        <td>Principal</td>
                                        <td>GH<span>&#8373;</span>{{$loan_last->principal}}</td>
                                      </tr>
                                      <tr>
                                          <td>Emi</td>
                                          <td>GH<span>&#8373;</span>{{$loan_last->emi}}</td>
                                          <td>Penalty</td>
                                          <td>GH<span>&#8373;</span>{{$payment_last->undeposited_penalty}}</td>
                                      </tr>
                                      <tr>
                                          <td>Remaining Emi</td>
                                          <td>{{$payment_last->remaining_emi}}</td>
                                          <td>Total Interest</td>
                                          <td>{{$loan_last->interest}}</td>
                                      </tr>
                                      
                                    </tbody>
                            </table>
                                  <hr>
                        
                           
                        
                    </div>
                    <div class="tab-pane" id="guarantors" role="tabpanel">
                            <div class="card-body">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                    <tr>  <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                       
                    
                                                        </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                   
            
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                    @foreach ($customer->guarantor as $guarantor )
                                                <tr>
                                                        <td>{{$guarantor->name}}</td>
                                                        <td>{{$guarantor->phone}}</td>
                                                        <td>{{$guarantor->address}}</td>
                                                       
                                                @endforeach
                                               
                                           
                                            </tbody>
                                    </table>
                               
                                   
                              
                            </div>
                        </div>

                </div>
            </div>
        </div>
        <!-- Column -->
    </div>


@endsection
@section('js')
<script src="/js/iziModal.min.js" type="text/javascript"></script>
<script>
    

    
    $(document).ready(function(){

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $(document).delegate('.trigger', 'click', function (event) {
    event.preventDefault();
    var id = $(this).attr('customer');
    $.ajax({
type: "POST",
url: '/pay_emi',
data: {id:id},
beforeSend: function(){
    $("#modal").iziModal();
    $('#modal').iziModal('open');
    
},
success: function(data) {
    //swal("Good job!", data.response, "success");
  //swal('Great',data.response,'success');
  //$('#reset').click();
  
  
  document.loandata.acct_no.value = data.acct;
  document.loandata.customer_name.value = data.name;
  document.loandata.principal.value = data.principal;
  document.loandata.due_date.value = data.due_date;
 //document.loandata.emi.value = 12;
 document.loandata.emi_deposite.value = data.emi;
 document.loandata.emi_amount.value= data.emi_amount;
 document.loandata.penalty.value=data.penalty;
 document.loandata.total.value = data.total_amount;
 document.loandata.undeposited_penalty.value = data.undeposited_penalty;
 document.loandata.cal_total.value = data.cal_total;
 document.loandata.total_left.value= data.total_left;
 document.loandata.remaining.value= data.remaining;
 document.loandata.loan_id.value= data.loan_id;
 
 //document.loandata.payment_date.value=data.payment_date;
},
error: function(errors,status,xhr){
    var err = errors.responseJSON.errors;
   $.each(err,function(key,value){
    sweetAlert("Oops...", value+"!!", "error");
   }) ;

}




   
});
    
    // $('#modal').iziModal('setZindex', 99999);
    // $('#modal').iziModal('open', { zindex: 99999 });
  
});


    });
   
</script>
<script src="/js/ajax.js"></script>
<script src="/js/lib/datatables/datatables.min.js"></script>
<script src="/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="/js/lib/datatables/datatables-init.js"></script>
<script src="/js/lib/sweetalert/sweetalert.min.js"></script>
@endsection
