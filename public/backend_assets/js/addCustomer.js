
var mobile = $('#mobile').val();
$('select[name="customers"]').on('change', function(){

    var customer_id = $(this).val();
    $('#mobile').val(null);


    //Getting Customer Details From Selected Customer
    if (customer_id >0) {
        $.ajax({

            url : '/admin/getcustomerdetails/'+customer_id,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
                $('#mobile').val(data[1]);
            }

        });
    }
    else {
        $('#mobile').val(null);
    }
 });
