@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/iziModal.min.css"> 
<link rel="stylesheet" href="/css/lib/sweetalert/sweetalert.css">
@endsection
@section('content')
<div class="container-fluid">
        <!-- Start Page Content -->
        <div>
                @if($errors)
                   @include('layouts.partials.error')
                
                @endif
            </div>
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
                                                <th>Account No</th>
                                                <th>Name</th>
                                                <th>Mobile No.</th>
                                                <th>Loan Type</th>
                                                <th>Loan Date</th>
                                                <th>Principle</th>
                                                <th>Interest(%)</th>
                                                <th>Emi</th>
                                                <th>Remaining Emi</th>
                                                <th>Loans</th>
                                                <th>Pay</th>
                                                <th>Action</th>
        
                                            </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Account No</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Loan Type</th>
                                        <th>Loan Date</th>
                                        <th>Principle</th>
                                        <th>Interest(%)</th>
                                        <th>Emi</th>
                                        <th>Remaining Emi</th>
                                        <th>Loans</th>
                                        <th>Pay</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($customer as $customers )
                                    <?php $loan = App\loan::where('customer_id',$customers->id)->orderBy('id','desc')->first();
                                    $loan_type = App\loanType::find($loan['loanType_id']);
                                    $payment = App\payment::where('loan_id',$loan['id'])->orderBy('id','desc')->first();
                                    ?>
                                    <tr>
                                            <td>{{$customers->acct_no}}</td>
                                            <td>{{$customers->surname." ".$customers->otherName}}</td>
                                            <td>{{$customers->phone}}</td>
                                            <td>{{$loan_type['name']}}</td>
                                            <td>{{$loan['loan_date']}}</td>
                                            <td>{{$loan['principal']}}</td>
                                            <td>{{$loan['interest']}}%</td>
                                            <td>{{$loan['emi']}}</td>
                                            <td>{{$payment['remaining_emi']}}</td>
                                            @if($loan && !$loan['cleared'])
                                            <td><a href="/viewloan/{{$customers->id}}"> View Loan</a></td>
                                            @else
                                            <td><a href="/addloan/{{$customers->id}}"> Add Loan</a></td>
                                            @endif
                                            @if($loan['cleared'])
                                            <td>Closed</td>
                                           @elseif(!$loan['status'])
                                            <td></td>
                                            @elseif($loan['status'] && $payment)
                                            <td><a href="" customer="{{$customers->id}}"  class="trigger"><button class="btn btn-dark btn-rounded "><i class="fa fa-credit-card"></i></button></a></td>
                                            @else
                                            <td></td>
                                           @endif
                                            <td><a href="/customer/{{$customers->id}}/edit"><button class="btn btn-dark btn-rounded "><i class="fa fa-edit"></i></button></a>
                                               <a href="/customer/{{$customers->id}}"><button class="btn btn-success btn-rounded "><i class="fa fa-eye"></i></button></a> </td>
                                        </tr> 
                                    @endforeach
                                   
                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <!-- Button trigger modal -->
<!-- Modal structure -->
<div id="modal"data-iziModal-fullscreen="true" hidden data-iziModal-title="Pay EMI"  data-iziModal-subtitle="Please be sure to get all the right data before making a payment"  data-iziModal-icon="icon-credit-card" >
    <div class="">
            <div class="card-body">
                    {!!Form::open(['action'=>'makePaymentController@store','method'=>'POST', 'name'=>'loandata'])!!}
                        <div class="form-body">
                            <h3 class="card-title m-t-15">Customer Detail <img id="loader" src="/img/loader.gif" alt=""></h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Customer Account No</label>
                                        <input type="text" readonly  name="acct_no"   class="form-control"  name="surname">
                                       
                                       </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Customer Name</label>
                                        <input name="customer_name" type="text" readonly id="name" class="form-control form-control-danger" >
                                     </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Principal</label>
                                            <input type="text" readonly name="principal" id="name" class="form-control"  name="surname">
                                            </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Due Date</label>
                                            <input name="due_date" type="text" readonly id="name" class="form-control form-control-danger" >
                                         </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Emi To Deposite</label>
                                                <input type="text" readonly name="emi_deposite" id="name" class="form-control"  >
                                                </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Penalty Amount</label>
                                                <input name="penalty" type="text" readonly  class="form-control form-control-danger" >
                                             </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Undeposited Penalty Amount</label>
                                                    <input type="text" required  name="undeposited_penalty" id="name" class="form-control" >
                                                    </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Total Amount</label>
                                                    <input name="total" type="text" readonly id="name" class="form-control form-control-danger" >
                                                 </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                            <!--/row-->
                            <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Payment Date</label>
                                            <input type="date" required name="payment_date"  class="form-control"  >
                                            </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-3">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Remaining EMI</label>
                                                <input name="remaining" type="text"  id="name" class="form-control form-control-danger" >
                                             </div>
                                        </div>
                                    <div class="col-md-3">
                                        <div class="form-group has-danger">
                                            <label class="control-label">EMI Amount</label>
                                            <input required name="emi_amount" type="text"  id="name" class="form-control form-control-danger" >
                                         </div>
                                    </div>
                                    <!--/span-->
                            </div>
                            <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Calculated Total</label>
                                            <input type="text" readonly name="cal_total" id="name" class="form-control" >
                                             </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Calculated Total left </label>
                                            <input name="total_left" type="text" readonly id="name" class="form-control form-control-danger" >
                                         </div>
                                    </div>
                                    <!--/span-->
                            </div>
                            <div class="row p-t-20">
                                   
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Payment Mode</label>
                                            <select class="form-control" name="pay_mode" id="">
                                                <option value="0">Cheque</option>
                                                <option value="1">Bank</option>
                                            </select>
                                         </div>
                                    </div>
                                    <input type="text" hidden name="loan_id">
                                    <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                    <button type="submit" id="makePayment"   class="btn btn-success btn-rounded">Make Payment</button>
                                             </div>
                                        </div>
                                    <!--/span-->
                                </div>
                            <!--/row-->
                           
                           
                        </div>
                   {!!Form::close()!!}
            
                </div>
    </div>
</div>
 
<!-- Trigger to open Modal -->

      <!-- Modal -->
    
      
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
    $('#loader').show();
    $("#modal").removeAttr("hidden");
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
 $('#loader').hide();
 
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
<script src="js/lib/datatables/datatables.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="js/lib/datatables/datatables-init.js"></script>
<script src="/js/lib/sweetalert/sweetalert.min.js"></script>


@endsection