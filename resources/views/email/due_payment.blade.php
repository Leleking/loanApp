<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>KickStart</title>
    <!-- Bootstrap Core CSS -->
   <style>
   
   </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
   <!-- Main wrapper  -->
 <div class="error-page" id="wrapper">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>Dear {{$customer->surname}} {{$customer->otherName}}</h1>
               
                <p class="text-muted m-t-30 m-b-30">You are reminded of your loan payment coming this</p>
            <footer class="footer text-center">&copy; KickStart Money Lending Services</footer>
        </div>
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
   

</body>

</html>