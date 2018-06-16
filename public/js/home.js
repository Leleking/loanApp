 
   
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
       $(document).delegate("#message","click",function(event){
           event.preventDefault();
           var id = $(this).attr('customer');
           swal({
            title: "Please Confirm?",
            text: "Send Reminder message to this customer",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: '/due_payment',
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
            }else{
                swal('Reminder Message Canceled');
            }
        })
       })
   })
  
     
     