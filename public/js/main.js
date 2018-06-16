$(document).ready(function() {
    $.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
 
  $(document).delegate('#activate','click', function(e) {
    e.preventDefault(); 
    $(this).removeClass('btn btn-primary').addClass('btn btn-warning');
    var id = $(this).attr('status');
if(id == 1){
    swal({
        title: "Are you sure?",
        text: "Once you deactivate the loan, all records of the loan payments shall be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: '/changeStatus',
                data: {id:id},
                beforeSend: function(){
                    swal('Loading...');
                },
                success: function(data) {
                    //swal("Good job!", data.response, "success");
                    //$(this).html('Unused');
                   // $('.tdl-holder').load('/threadTypeReview' + '.tdl-content')
                  swal('Great',data.response,'success');
                 //console.log(data);
                },
                error: function(errors,status,xhr){
                    var err = errors.responseJSON.errors;
                   $.each(err,function(key,value){
                    sweetAlert("Oops...", value+"!!", "error");
                   }) ;
                  
                }
            });
        } else {
          swal("Loan deactivation cancaled!");
        }
      });
}else{
    swal({
        title: "Are you sure?",
        text: "Once activated, a loan payment record shall be created for this customer",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: '/changeStatus',
                data: {id:id},
                beforeSend: function(){
                    swal('Loading...');
                },
                success: function(data) {
                    //swal("Good job!", data.response, "success");
                    //$(this).html('Unused');
                   // $('.tdl-holder').load('/threadTypeReview' + '.tdl-content')
                  swal('Great',data.response,'success');
                 //console.log(data);
                },
                error: function(errors,status,xhr){
                    var err = errors.responseJSON.errors;
                   $.each(err,function(key,value){
                    sweetAlert("Oops...", value+"!!", "error");
                   }) ;
                  
                }
            });
        } else {
          swal("Loan activation cancaled!");
        }
      });
}


});

} );