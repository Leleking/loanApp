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
                    <h4 class="m-b-0 text-white">Add new Loan Type</h4>
                </div>
                <div class="card-body">
                    <form action="#" name="loandata">
                        <div class="form-body">
                            <h3 class="card-title m-t-15">Loan Detail</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Name Loan</label>
                                        <input type="text" name="name" id="name" class="form-control" >
                                      </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Interest Rate</label>
                                        <input name="interest" step="any"  type="number" id="principal"  class="form-control form-control-danger" placeholder="">
                                     </div>
                                </div>
                                <!--/span-->
                            </div>
                         
                            
                            <hr>
                            <div class="row p-t-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">About Loan</label>
                                            <textarea  name="about" id="name"  class="form-control" ></textarea>
                                          </div>
                                    </div>
                                    <!--/span-->
                                   
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
          ajaxPostFunction('/ajaxAddLoanType');
      })
    })
</script>
<script scr="/js/main.js"></script>   
<script src="/js/lib/sweetalert/sweetalert.min.js"></script>
<script src="/js/ajax.js"></script>

@endsection
