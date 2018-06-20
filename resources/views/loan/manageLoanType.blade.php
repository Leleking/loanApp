
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/iziModal.min.css"> 
<link rel="stylesheet" href="/css/lib/sweetalert/sweetalert.css">
@endsection
@section('content')
<div class="container-fluid">

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
                                                <th>Loan Id</th>
                                                <th>Name</th>
                                                <th>Interest Rate</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                                
        
                                            </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                            <th>Loan Id</th>
                                            <th>Name</th>
                                            <th>Interest Rate</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                            
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($loanType as $loanTypes )
                                   
                                    <tr>
                                            <td>{{$loanTypes->id}}</td>
                                            <td>{{$loanTypes->name}}</td>
                                            <td>{{$loanTypes->interest}}</td>
                                            <td>{{$loanTypes->status}}</td>
                                            <td>{{$loanTypes->created_at}}</td>
                                            
                                            <td><a href=""><button class="btn btn-dark btn-rounded "><i class="fa fa-edit"></i></button></a>
                                                <a href=""><button class="btn btn-danger btn-rounded "><i class="fa fa-print"></i></button></a>
                                               <a href=""><button class="btn btn-success btn-rounded "><i class="fa fa-eye"></i></button></a> </td>
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
@endsection
@section('js')

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
