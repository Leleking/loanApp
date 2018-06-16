
 

function ajaxPostFunction(to){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
var data = $('form').serialize();
$.ajax({
type: "POST",
url: to,
data: data,
beforeSend: function(){
    swal('Loading...');
},
success: function(data) {
    //swal("Good job!", data.response, "success");
  swal('Great',data.response,'success');
  //$('#reset').click();
},
error: function(errors,status,xhr){
    var err = errors.responseJSON.errors;
   $.each(err,function(key,value){
    sweetAlert("Oops...", value+"!!", "error");
   }) ;

}




   
});
};
function calculate() {
    // Get the user's input from the form. Assume it is all valid.
    // Convert interest from a percentage to a decimal, and convert from
    // an annual rate to a monthly rate. Convert payment period in years
    // to the number of monthly payments.
    var principal = document.loandata.principal.value;
    var interest = document.loandata.interest.value / 100 / 12;
    var payments = document.loandata.years.value * 12;

    // Now compute the monthly payment figure, using esoteric math.
    var x = Math.pow(1 + interest, payments);
    var monthly = (principal*x*interest)/(x-1);

    // Check that the result is a finite number. If so, display the results.
    if (!isNaN(monthly) && 
        (monthly != Number.POSITIVE_INFINITY) &&
        (monthly != Number.NEGATIVE_INFINITY)) {

        document.loandata.payment.value = round(monthly);
        document.loandata.total.value = round(monthly * payments);
        document.loandata.totalinterest.value = 
            round((monthly * payments) - principal);
            document.loandata.emi.value= round(monthly);

    }
    // Otherwise, the user's input was probably invalid, so don't
    // display anything.
    else {
        document.loandata.payment.value = "";
        document.loandata.total.value = "";
        document.loandata.totalinterest.value = "";
    }
}

// This simple method rounds a number to two decimal places.
function round(x) {
  return Math.round(x*100)/100;
}

/*

*/
function ajaxPostPayEmiFunction(to){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
var data = $('form').serialize();
$.ajax({
type: "POST",
url: to,
data: data,
beforeSend: function(){
    swal('Loading...');
},
success: function(data) {
    //swal("Good job!", data.response, "success");
  swal('Great',data.response,'success');
  //$('#reset').click();
},
error: function(errors,status,xhr){
    var err = errors.responseJSON.errors;
   $.each(err,function(key,value){
    sweetAlert("Oops...", value+"!!", "error");
   }) ;

}




   
});
};
