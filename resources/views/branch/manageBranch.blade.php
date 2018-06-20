
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/iziModal.min.css"> 
<link rel="stylesheet" href="/css/lib/sweetalert/sweetalert.css">
@endsection
@section('content')
@include('layouts.partials.error')
@include('layouts.partials.success')
<div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                        <tr>
                                                <th>Branch Id</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>About</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Branch Id</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>About</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                            
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($branch as $branches )
                                   
                                    <tr>
                                            <td>{{$branches->id}}</td>
                                            <td>{{$branches->name}}</td>
                                            <td>{{$branches->address}}</td>
                                            <td>{{$branches->About}}</td>
                                            <td>{{$branches->status}}</td>
                                            
                                            <td><a class="trigger" branch="{{$branches->id}}"><button class="btn btn-dark btn-rounded "><i class="fa fa-edit"></i></button></a>
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
       <div id="modal"data-iziModal-fullscreen="true" hidden data-iziModal-title="Edit Branch" class="test" data-iziModal-subtitle="Please note that branches can't be deleted and can only be edited"  data-iziModal-icon="icon-credit-card" >
        <div class="">
                <div class="card-body">
                    <form action="/updateBranch" name="loandata" method="post">
                        {{csrf_field()}}
                            <div class="form-body">
                                <h3 class="card-title m-t-15">Branch Detail - Edit <img id="loader" src="/img/loader.gif" alt=""></h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Branch Id</label>
                                            <input type="text" readonly  name="id"   class="form-control"  name="surname">
                                           
                                           </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Branch Name</label>
                                            <input name="branchName" type="text"  id="name" class="form-control form-control-danger" >
                                         </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Created Date</label>
                                                <input type="text" readonly name="created" id="name" class="form-control"  name="surname">
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label"></label>
                                                <input type="text" readonly name="about" id="name" class="form-control"  name="surname">
                                                </div>
                                        </div>
                                        
                                       
                                    </div>
                                   
                                       
                                <!--/row-->
                                <div class="row p-t-20">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Address</label>
                                                <textarea  required name="address"  class="form-control"  ></textarea>
                                                </div>
                                        </div>
                                        <!--/span-->
                                        
                                        <!--/span-->
                                </div>
                               
                                <div class="row p-t-20">
                                       
                                        <!--/span-->
                                      
                                        <input type="text" hidden name="guarantor_id">
                                        <div class="col-md-12" >
                                                <div class="form-group has-danger">
                                                        <button type="submit" id="makePayment"   class="btn btn-success btn-rounded">Update</button>
                                                 </div>
                                            </div>
                                        <!--/span-->
                                    </div>
                                <!--/row-->
                               
                               
                            </div>
                    </form>
                
                    </div>
        </div>
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
    var id = $(this).attr('branch');
    $.ajax({
type: "POST",
url: '/branchEdit',
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
  
  
  document.loandata.id.value = data.id;
  document.loandata.branchName.value = data.name;
  document.loandata.address.value = data.address;
  document.loandata.about.value = data.about;
  document.loandata.created.value = data.created_at;
 
 document.loandata.branch_id.value= data.id;
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
<script src="/js/jquery.print.min.js"></script>



@endsection