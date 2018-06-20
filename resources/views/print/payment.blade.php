<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="/js/lib/jquery/jquery.min.js"></script>
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
        <title>KickStart | {{Route::currentRouteName()}}</title>
        <!-- Bootstrap Core CSS -->
        <link href="/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="/css/helper.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <style>
                .first-box{padding:10px;background:#9C0;}
            .second-box{padding:10px; background:#39F;}
            .third-box{padding:10px;background:#F66;}
            .fourth-box{padding:10px;background:#6CC;}
            .div1 {
    width: 300px;
    height: 100px;
    border: 1px solid black; 
}
            </style>
    <title>Document</title>
</head>
<body onload="print()" >
        <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="invoice" class="effect2">
                            <div id="invoice-top">
                                <div class="invoice-logo"><img src="/img/users/{{Auth()->user()->image}}" alt=""></div>
                                <div class="invoice-info">
                                    <h2>Staff - {{Auth()->user()->name}}</h2>
                                    <p> {{Auth()->user()->email}}<br> +8801629599859
                                    </p>
                                </div>
                                <!--End Info-->
                                <div class="title">
                                    <h4>Cash Receipt</h4>
                                    <p>Issued:{{Carbon::parse(Carbon::now())->format('l jS \of F Y h:i A')}}<br>
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
                            <div class="row">
                                <div class="col-md-3">Received with thanks from {{$customer->surname}} {{$customer->otherName}}

                                        a sum </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="container">
                            <div id="invoice-bot">
        
                                <div id="invoice-table">
                                    <div class="table-responsive">
                                        <table class="table">
                                              
        
                                            <tr class="tabletitle">
                                               <th>S.No</th>
                                               <th>Loan.No</th>
                                               <th>Description</th>
                                               <th>Total</th>
                                              
                                              
                                            </tr>
        
                                            <tr class="service">
                                                <td class="tableitem">
                                                    <p class="itemtext">{{$payment->first()->id}}</p>
                                                </td>
                                                <td class="tableitem">
                                                    <p class="itemtext">{{$loan->id}}</p>
                                                </td>
                                                <td class="tableitem">
                                                    <p class="itemtext">UNDEPOSITE PENALTY RECEIVED <br> Emi Paid</p>
                                                </td>
                                                <td class="tableitem">
                                                        <p class="itemtext">{{$undeposite}} <br> {{$payment->first()->emi - $undeposite}}</p>
                                                </td>
                                               
                                                
                                            </tr>
        
                                          
                                            <tr class="tabletitle">
                                                <td></td>
                                                <td></td>
                                                <td class="Rate">
                                                    <h2>Total</h2>
                                                </td>
                                                <td class="payment">
                                                    <h2>{{$payment->first()->emi}}</h2>
                                                </td>
                                            </tr>
        
                                        </table>
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6 " style="float:right"><div class="div1"></div><br>Authorised Signatory</div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>
        <hr style="border: 1px dashed black;" />
        <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="invoice" class="effect2">
                            <div id="invoice-top">
                                <div class="invoice-logo"><img src="/img/users/{{Auth()->user()->image}}" alt=""></div>
                                <div class="invoice-info">
                                    <h2>Staff - {{Auth()->user()->name}}</h2>
                                    <p> {{Auth()->user()->email}}<br> +8801629599859
                                    </p>
                                </div>
                                <!--End Info-->
                                <div class="title">
                                    <h4>Cash Receipt</h4>
                                    <p>Issued:{{Carbon::parse(Carbon::now())->format('l jS \of F Y h:i A')}}<br>
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
                            <div class="row">
                                <div class="col-md-3">Received with thanks from {{$customer->surname}} {{$customer->otherName}}

                                        a sum </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="container">
                            <div id="invoice-bot">
        
                                <div id="invoice-table">
                                    <div class="table-responsive">
                                        <table class="table">
                                              
        
                                            <tr class="tabletitle">
                                               <th>S.No</th>
                                               <th>Loan.No</th>
                                               <th>Description</th>
                                               <th>Total</th>
                                              
                                              
                                            </tr>
        
                                            <tr class="service">
                                                <td class="tableitem">
                                                    <p class="itemtext">{{$payment->first()->id}} {{$payment->first()->emi}}</p>
                                                </td>
                                                <td class="tableitem">
                                                    <p class="itemtext">{{$loan->id}}</p>
                                                </td>
                                                <td class="tableitem">
                                                    <p class="itemtext">UNDEPOSITE PENALTY RECEIVED <br> Emi Paid</p>
                                                </td>
                                                <td class="tableitem">
                                                        <p class="itemtext">{{$undeposite}} <br> {{$payment->first()->emi - $undeposite}}</p>
                                                </td>
                                               
                                                
                                            </tr>
        
                                          
                                            <tr class="tabletitle">
                                                <td></td>
                                                <td></td>
                                                <td class="Rate">
                                                    <h2>Total</h2>
                                                </td>
                                                <td class="payment">
                                                    <h2>{{$payment->first()->emi}}</h2>
                                                </td>
                                            </tr>
        
                                        </table>
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6 " style="float:right"><div class="div1"></div><br>Authorised Signatory</div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>
                                <!--End Table-->
                               
        
       
        
        
        
        
        
        
                               
        
        
        
</body>
</html>