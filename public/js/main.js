$(document).ready(function(){
    $('#submit').click(function(e){
        e.preventDefault();
        ajaxPostFunction('/addCustomer');
    
    })
    })