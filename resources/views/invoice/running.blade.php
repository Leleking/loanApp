@extends('layouts.app')
@section('css')
<style>
    .first-box{padding:10px;background:#9C0;}
.second-box{padding:10px; background:#39F;}
.third-box{padding:10px;background:#F66;}
.fourth-box{padding:10px;background:#6CC;}
</style>
@endsection
@section('content')
<div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-12">
                <div id="invoice" class="effect2">
                    <div id="invoice-top">
                        <div class="invoice-logo"></div>
                        <div class="invoice-info">
                            <h2>Staff - {{$customer->user->name}}</h2>
                            <p> {{$customer->user->email}}<br> +8801629599859
                            </p>
                        </div>
                        <!--End Info-->
                        <div class="title">
                            <h4>Invoice #1069</h4>
                            <p>Issued:{{Carbon::parse(Carbon::now())->format('l jS \of F Y h:i A')}}<br> Payment Due:{{Carbon::parse($payment->first()->due_date)->format('l jS \of F Y ')}}
                            </p>
                        </div>
                        <!--End Title-->
                    </div>
                    <!--End InvoiceTop-->



                    <div id="invoice-mid">

                            <div><img class="clientlogo" src="/img/passport/{{$customer->customer_image_file['passport']}}" alt=""></div>
                        <div class="invoice-info">
                            <h2>{{$customer->surname}} {{$customer->otherName}}</h2>
                            <p>{{$customer->email}}<br>{{$customer->phone}}
                                <br>
                        </div>
                        
                        <div id="project">
                            <h2>Loan - {{App\loanType::find($loan['loanType_id'])->name}}</h2>
                            <p>{{App\loanType::find($loan['loanType_id'])->name}}</p>
                        </div>

                    </div>
                    <!--End Invoice Mid-->

                    <div id="invoice-bot">

                        <div id="invoice-table">
                            <div class="table-responsive">
                                <table class="table">
                                      

                                    <tr class="tabletitle">
                                       <th>Principal</th>
                                       <th>Interest</th>
                                       <th>Total EMI</th>
                                       <th>Emi</th>
                                       <th>Emi Paid</th>
                                       <th>Deposited Emi</th>
                                       <th>Last Payment</th>
                                      
                                    </tr>

                                    <tr class="service">
                                        <td class="tableitem">
                                            <p class="itemtext">GH<span>&#8373;</span>{{$loan->principal}}</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">{{$loan->interest}}%</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">{{round($loan->total/$loan->emi)}}</p>
                                        </td>
                                        <td class="tableitem">
                                                <p class="itemtext">{{$loan->emi}}</p>
                                        </td>
                                        <?php $used = round($loan->total/$loan->emi) - $payment->first()->remaining_emi;?>
                                        <td class="tableitem">
                                                <p class="itemtext">{{round($loan->total/$loan->emi)}} - {{$used}} = {{$payment->first()->remaining_emi}}</p>
                                        </td>
                                        <td class="tableitem">
                                                <p class="itemtext">{{$payment->sum('emi')}}</p>
                                        </td>
                                        <td class="tableitem">
                                                <p class="itemtext">{{Carbon::parse($payment->first()->created_at)->format('l jS \of F Y h:i A')}}</p>
                                        </td>
                                       
                                    </tr>

                                  
                                    <tr class="tabletitle">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="Rate">
                                            <h2>Total</h2>
                                        </td>
                                        <td class="payment">
                                            <h2></h2>
                                        </td>
                                    </tr>

                                </table>
                               
                                </div>
                            </div>
                        </div>
                        <!--End Table-->
                        <div class="row">
                            <div class="col-md-6">
                                <div>Customer's Guarantor's</div>
                                <br>
                                @foreach(App\guarantor::where('customer_id',$customer->id)->get() as $guarantors)
                                  <div><img class="clientlogo" src="/img/passport/{{$guarantors->guarantor_image_file->passport}}" alt=""></div>
                                    <div class="invoice-info">
                                        <h2>{{$guarantors->name}}</h2>
                                        <p>{{$guarantors->address}}<br>{{$guarantors->phone}}<br>{{$guarantors->id}}
                                            <br>
                                    </div>
                                    @endforeach
                            </div>
                            <div class="col-md-3">
                                   
                                            <h2>Loan Detail</h2>
                                            <div class="list-group">
                                              <a href="#" class="list-group-item active"> Principal Amount (GH<span>&#8373;</span>)<span style="float:right">{{$loan->principal}}</span></a>
                                              <a href="#" class="list-group-item">File Charge ({{$loan->file}}%)	</a>
                                              <a href="#" class="list-group-item">Penalty ({{$loan->penalty}}%)	<span style="float:right">{{$payment->first()->penalty}}</span></a>
                                              <a href="#" class="list-group-item">Interest ({{$loan->interest}}%)	<span style="float:right">{{$loan->total - $loan->principal}}</span></a>
                                              <a href="#" class="list-group-item">Total Amount (GH<span>&#8373;</span>)	<span style="float:right">{{$loan->first()->total}}</span></a>
                                        
                                    </div>
                                       
                            </div>
                        </div>
                       

<div class="container">
<h1>Contact Address</h1><br>
	<div class="row text-center">
		<div class="col-sm-3 col-xs-6 first-box">
        <h1><span class="glyphicon glyphicon-earphone"></span></h1>
        <h3>Phone</h3>
        <p style="color:white">+</p><br>
    </div>
    <div class="col-sm-3 col-xs-6 second-box">
        <h1><span class="glyphicon glyphicon-home"></span></h1>
        <h3>Location</h3>
        <p style="color:white">Road</p><br>
    </div>
    <div class="col-sm-3 col-xs-6 third-box">
        <h1><span class="glyphicon glyphicon-send"></span></h1>
        <h3>E-mail</h3>
        <p style="color:white">info@KickStart.com</p><br>
    </div>
    <div class="col-sm-3 col-xs-6 fourth-box">
    	<h1><span class="glyphicon glyphicon-leaf"></span></h1>
        <h3>Web</h3>
        <p style="color:white">www.kickstart.com</p><br>
    </div>
	</div>
</div>
                       







                       


                        <div id="legalcopy">
                            <p class="legal"><strong>Thank you for your business!</strong>
                            </p>
                            <a target="_blank" href="/print/invoice/running/{{$customer->id}}"><button  style="float:right"  class="btn btn-warning btn-rounded"> <i class="fa fa-check"></i> Print</button></a>
                        </div>

                    </div>
                    <!--End InvoiceBot-->
                </div>
                <!--End Invoice-->
            </div>
        </div>
        <!-- End PAge Content -->
    </div>

@endsection
