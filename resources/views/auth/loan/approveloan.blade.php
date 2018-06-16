@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/lib/sweetalert/sweetalert.css">
@endsection
@section('content')
<div class="container-fluid">
        <!-- Start Page Content -->
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
                                                <th>Acct. No</th>
                                            <th> Customer Name</th>
                                            <th>Loan Type</th>
                                            <th>Loan Date</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Principal</th>
                                            <th>File Charge</th>
                                            <th>interest</th>
                                            <th>Time Period</th>
                                            <th>Penalty</th>
                                            <th>Emi</th>
                                        <th>Action</th>

        
                                            </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                            <th>Acct. No</th>
                                            <th> Customer Name</th>
                                            <th>Loan Type</th>
                                            <th>Loan Date</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Principal</th>
                                            <th>File Charge</th>
                                            <th>interest</th>
                                            <th>Time Period</th>
                                            <th>Penalty</th>
                                            <th>Emi</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($loan as $loans )
                                    <tr>
                                           <td>{{$loans->customer['acct_no']}}</td>
                                            <td>{{$loans->customer['surname']}} {{$loans->customer['otherName']}}</td>
                                            <?php $loanType = App\loanType::find($loans->loanType_id);?>
                                            <td>{{$loanType['name']}}</td>
                                            <td>{{$loans->loan_date}}</td>
                                            <td>{{$loans->loan_date}}</td>
                                            <td>{{$loans->loan_date}}</td>
                                            <td>{{$loans->principal}}</td>
                                            <td>{{$loans->file}}</td>
                                            <td>{{$loans->interest}}</td>
                                            <td>{{$loans->years}}</td>
                                            <td>{{$loans->penalty}}</td>
                                            <td>{{$loans->emi}}</td>
                                            <td><a href=""><button class="btn btn-dark btn-rounded "><i class="fa fa-edit"></i></button></a>
                                               
                                                        <a href=""><button status="{{$loans->customer['id']}}" class="btn btn-danger  btn-rounded" id="activate" status=""><i class="fa fa-check"></i></button></a>
                                             
                                                
                                               <a href="/customer/{{$loans->customer['id']}}"><button class="btn btn-success btn-rounded "><i class="fa fa-eye"></i></button></a> </td>
                                        </tr> 
                                    @endforeach
                                   
                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js')
<script src="/js/main.js"></script>

<script>
/*
   
        $(document).ready(function(){
        $('#activate').click(function(e){
            e.preventDefault();
            swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});
            
        
        })
        })
        */
    </script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/js/ajax.js"></script>

@endsection
