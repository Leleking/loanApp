@extends('layouts.app')
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
                                                <th>Account No</th>
                                                <th>Name</th>
                                                <th>Mobile No.</th>
                                                <th>Branch</th>
                                                <th>Loan Type</th>
                                                <th>Loan Date</th>
                                                <th>Principle</th>
                                                <th>Interest(%)</th>
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
                                        <th>Branch</th>
                                        <th>Loan Type</th>
                                        <th>Loan Date</th>
                                        <th>Principle</th>
                                        <th>Interest(%)</th>
                                        <th>Loans</th>
                                        <th>Pay</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($customer as $customers )
                                    <tr>
                                            <td>{{$customers->acct_no}}</td>
                                            <td>{{$customers->surname." ".$customers->otherName}}</td>
                                            <td>{{$customers->phone}}</td>
                                            <td>null</td>
                                            <td>null</td>
                                            <td>null</td>
                                            <td>null</td>
                                            <td>$183,000</td>
                                            <td><a href=""> Add Loan</a></td>
                                            <td>null</td>
                                            <td><a href="/customer/{{$customers->id}}/edit"><button class="btn btn-dark btn-rounded "><i class="fa fa-edit"></i></button></a>
                                                <a href=""><button class="btn btn-danger btn-rounded "><i class="fa fa-print"></i></button></a>
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


@endsection
@section('js')
<script src="js/lib/datatables/datatables.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="js/lib/datatables/datatables-init.js"></script>

@endsection