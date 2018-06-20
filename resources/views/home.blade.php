@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/lib/sweetalert/sweetalert.css">
@endsection

@section('content')
<div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <?php $customers = App\customer::where('user_id',Auth::user()->id)->get();
                            $loan_released = 0;
                            $today = 0;
                            $month = 0;
                            $week = 0;
                            $total_payments = 0;
                            $due_payment = 0;
                            foreach($customers as $customer){
                                $loan =  App\loan::where('customer_id',$customer->id)->get();
                                foreach ($loan as $loans) {
                                   
                                    $loan_released = $loan_released + $loans->principal;
                                     $payment = App\payment::where('loan_id',$loans->id)->get();
                                    foreach($payment as $payments){
                                       
                                        
                                        $due_date = $payments->due_date;
                                        $date = Carbon::parse($due_date);
                                        $now = Carbon::now();
                                        $diff = $date->diffInDays($now);;
                                        if( $date >= $now->subDays(7) && $date< $now){
                                            $week = $week + $payments->emi;
                                        }
                                        if($diff < 8){
                                            $due_payment = $due_payment + $payments->emi ;
                                        }
                                        $total_payments = $total_payments + $payments->emi; 
                                        if($payments->created_at->isToday()){
                                            $today = $today + $payments->emi ;
                                          
                                        }
                                        if($payments->created_at->format('m') == Carbon::today()->month){
                                            $month = $month + $payments->emi;
                                        }
                                    }
                                  
                                }
                               
                            }
                            ?>
                            <h2>GH&#8373;{{$loan_released}}</h2>
                                    <p class="m-b-0">Loans Released </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-credit-card f-s-40 color-success"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2>GH&#8373;{{$total_payments}}</h2>
                            <p class="m-b-0">Payments</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2>{{$due_payment}}</h2>
                            <p class="m-b-0">Due Amount</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2>{{count(App\customer::where('user_id',Auth::user()->id)->get())}}</h2>
                            <p class="m-b-0">Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row bg-white m-l-0 m-r-0 box-shadow ">            
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Pie Chart</h4>
                            </div>
                            <div class="flot-container">
                                <div id="flot-pie" class="flot-pie-container"></div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->


            <!-- column -->
            <div class="col-lg-4">
                <div class="card">
                    <h2>Collection Statistics</h2>
                    <div class="card-body browser">
                        <p class="f-w-600">Today<span class="pull-right">GH<span>&#8373;</span>{{$today}}</span></p>
                       <br>

                        <p class="m-t-30 f-w-600">Last Week<span class="pull-right">GH<span>&#8373;</span>{{$week}}</span></p>
                        
                        <br>
                        <p class="m-t-30 f-w-600">This Month<span class="pull-right">GH<span>&#8373;</span>{{$month}}</span></p>
                        <br>
                        <p class="m-t-30 f-w-600">Monthy Target<span class="pull-right">GH<span>&#8373;</span>0</span></p>
                        <div class="progress">
                            <div role="progressbar" style="width: 65%; height:8px;" class="progress-bar bg-success wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                        </div>

                       
                    </div>
                </div>
            </div>
            <!-- column -->
        </div>
        <div class="row">
              
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Due Customers </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Due Date</th>
                                        <th>Days to Payment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      
                                        @foreach($customers as $customer)
                                       <?php $loan =  App\loan::where('customer_id',$customer->id)->get();?>
                                        @foreach ($loan as $loans )

                                        @if($loans->status && !$loans->cleared)
                                        <?php $payment = App\payment::where('loan_id',$loans->id)->orderBy('id','desc')->first();
                                        $due_date = $payment['due_date'];
                                        $date = Carbon::parse($due_date);
                                        $now = Carbon::now();
                                        $diff = $date->diffInDays($now);;
                                        ?>
                                        @if($diff < 8)
                                        <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="/img/passport/{{$customer->customer_image_file['id_card']}}" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>{{$customer->surname}} {{$customer->otherName}}</td>
                                                <td><span>{{Carbon::parse($payment['due_date'])->format('l jS \of F Y') }}</span></td>
                                                <td><span>{{$diff}}</span></td>
                                                <td><a href="/customer/{{$customer->id}}"><button class="btn btn-success btn-rounded "><i class="fa fa-eye"></i></button></a>
                                                    <button id="message" customer="{{$customer->id}}" class="btn btn-dark btn-rounded "><i class="fa fa-envelope"></i></button>
                                                    <button id="phone" customer="{{$customer->id}}" class="btn btn-danger btn-rounded "><i class="fa fa-phone"></i></button>
                                                </td>
                                            </tr>
                                            @endif
                                            @endif
                                        @endforeach
                                   
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>


       


        <!-- End PAge Content -->
    </div>
  
@endsection
@section('js')
<script src="/js/lib/flot-chart/excanvas.min.js"></script>
    <script src="/js/lib/flot-chart/jquery.flot.js"></script>
    <script src="/js/lib/flot-chart/jquery.flot.pie.js"></script>
   
    <script src="/js/lib/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="js/lib/datatables/datatables-init.js"></script>
  <script>
  
$( function () {

var data = [
    {
        label: "Pending",
        data: 1,
        color: "#8fc9fb"
    },
    {
        label: "Approved",
        data: 3,
        color: "#007BFF"
    },
    {
        label: "Danger",
        data: "<?php echo 25;?>",
        color: "#19A9D5"
    },
    {
        label: "Warning",
        data: 8,
        color: "#DC3545"
    }
];

var plotObj = $.plot( $( "#flot-pie" ), data, {
    series: {
        pie: {
            show: true,
            radius: 1,
            label: {
                show: false,

            }
        }
    },
    grid: {
        hoverable: true
    },
    tooltip: {
        show: true,
        content: "%p.0%, %s, n=%n", // show percentages, rounding to 2 decimal places
        shifts: {
            x: 20,
            y: 0
        },
        defaultTheme: false
    }
} );

} );


  </script>
    <!--Custom JavaScript -->
    
   
   
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="/js/home.js"></script>
   <script src="/js/ajax.js"></script>


@endsection
