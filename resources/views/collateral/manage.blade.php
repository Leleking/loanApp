@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/iziModal.min.css"> 
<link rel="stylesheet" href="/css/lib/sweetalert/sweetalert.css">
@endsection
@section('content')
<div class="container-fluid" >
        <!-- Start Page Content -->
        <div>
                @if($errors)
                   @include('layouts.partials.error')
                
                @endif
                @include('layouts.partials.success')
            </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                        <tr>
                                                <th>Customer's ID</th>
                                                <th>Name</th>
                                                <th>Collateral Name</th>
                                                <th>Collateral Detail</th>
                                                <th>Collateral docs</th>
                                                <th>Collateral Scanned</th>
                                                <th>Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                    @foreach($customer as $customers)
                                    @foreach ($customers->collateral as $collateral )
                                   
                                    <tr>
                                            <td>{{$customers->id}}</td>
                                            <td>{{$customers->surname}} {{$customers->otherName}}</td>
                                          <td>{{$collateral->name}}</td>
                                          <td>{{$collateral->about}}</td>
                                          <td><a href="/img/collateral/{{$collateral->docs}}" target="_blank">{{$collateral->docs}}</a></td>
                                          <td><a href="/img/collateral/{{$collateral->scan}}" target="_blank">{{$collateral->scan}}</a></td>
                                           
                                           
                                            <td><a class="trigger" collateral="{{$collateral->id}}"><button class="btn btn-dark btn-rounded "><i class="fa fa-edit"></i></button></a>
                                               <a @if(!auth()->user()->isAdmin) disabled @endif href="/collateral/{{$collateral->id}}"><button class="btn btn-danger btn-rounded "><i class="fa fa-trash"></i></button></a> </td>
                                        </tr> 
                                        @endforeach
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
<div id="modal"data-iziModal-fullscreen="true" hidden data-iziModal-title="Collateral Information" class="test" data-iziModal-subtitle="Please be sure to get all the data right. To delete this collateral you will need an admin or super admin"  data-iziModal-icon="icon-credit-card" >
    <div class="">
            <div class="card-body">
                <form action="/updateCollateral" name="loandata" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-body">
                            <h3 class="card-title m-t-15">Collateral Information - Edit <img id="loader" src="/img/loader.gif" alt=""></h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Collateral's Id</label>
                                        <input type="text" readonly  name="id"   class="form-control"  >
                                       
                                       </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Collateral's Name</label>
                                        <input name="collateralName" type="text"  id="name" class="form-control form-control-danger" >
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
                                   
                                    <!--/span-->
                                   
                                </div>
                               
                                   
                            <!--/row-->
                            <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Collateral Detail</label>
                                            <textarea  required name="about"  class="form-control"  ></textarea>
                                            </div>
                                    </div>
                                    <!--/span-->
                                    
                                    <!--/span-->
                            </div>
                            <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Collateral Document </label>
                                            <input @if(!auth()->user()->isAdmin) readonly @endif  name="docs" type="file" class="form-control"  >
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Collateral Scanned</label>
                                                <input @if(!auth()->user()->isAdmin) readonly @endif  name="scan" type="file" class="form-control"  >
                                                </div>
                                        </div>
                                    <!--/span-->
                                    
                                    <!--/span-->
                            </div>
                           
                            <div class="row p-t-20">
                                   
                                    <!--/span-->
                                  
                                    <input type="text" hidden name="collateral_id">
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
 
<!-- Trigger to open Modal -->

    
    
      
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
    var id = $(this).attr('collateral');
    $.ajax({
type: "POST",
url: '/collateralEdit',
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
  document.loandata.collateralName.value = data.name;
  document.loandata.about.value = data.about;
  document.loandata.created.value = data.created_at;
  document.loandata.docs.value = data.docs;
  document.loandata.scan.value = data.scan;
 document.loandata.collateral_id.value= data.id;
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