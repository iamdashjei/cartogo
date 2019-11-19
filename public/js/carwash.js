$(document).on('submit','#add-formcarwash',function (form) {
    form.preventDefault();

    let data = $('#add-formcarwash').serialize();

    //console.log(JSON.stringify(data));
    $.ajax({
        'url'   : '/add-carwash',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type'  : 'POST',
        'data'  : data,
        'cache' : false,
        success: function(result){

            console.log(result);
            if(result.success == true)
            {
                setTimeout(function(){
                    $('#add-formcarwash').trigger('reset');
                    $('#add-carwash').modal('toggle');
                    $.notify({
                            message: '1 Carwash Successfully Added!'
                        } ,{
                            type: 'success'
                        }
                    );

                    setTimeout(function(){
                        location.reload();
                    },1500);
                });
            }

            $.each(result, function (key, value) {
                var element = $('#'+key);

                element.closest('div.'+key)
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger')
                    .remove();
                element.after('<p class="text-danger">'+value+'</p>');
            });
        },error: function (result) {
            console.log(result.status);
        }
    });
    // check_value('prodname','proddesc','prodstock','category');
});

$(document).on('click','.edit-carwash',function(){
    let value = this.value;

    $.ajax({
        'url'   : '/get-carwash-details',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type'  : 'GET',
        'data'  : {'id':value},
        'cache' : false,
        success:function(result){
            $('#carwash_value').val(result[0].id);
            $('#edit_customer').val(result[0].customer);
            $('#edit_address').val(result[0].address);
            $('#edit_latitude').val(result[0].lat);
            $('#edit_longitude').val(result[0].lng);
            $('#edit_amount').val(result[0].amount);
            $('#edit_mobile_no').val(result[0].mobile_no);
            
            $('#edit_payment_method').val(result[0].payment_method).change();
           //console.log('Result' + JSON.stringify(result));

        },error:function(error){
            console.log(error.status);
        }
    });
});

$(document).on('submit','#update-carwash',function (form) {
    form.preventDefault();

    let data = $('#update-carwash').serialize();

    //console.log(data);
    $.ajax({
        'url'   : '/update-carwash-details',
        'type'  : 'POST',
        'data'  : data,
        'cache' : false,
        success:function(result){
            console.log(result);
            if(result.success == true)
            {
                setTimeout(function(){
                    $('#edit_carwash').modal('toggle');
                    $.notify({
                            message: '1 Carwash Successfully Updated!'
                        } ,{
                            type: 'success'
                        }
                    );

                    setTimeout(function(){
                        location.reload();
                    },1500);
                });
            }else{
                setTimeout(function(){
                    $('#change_status').html('<div id="change_text" class="alert alert-warning">'+result.success+'</div>');

                    setTimeout(function(){
                        $('#change_text').remove();
                    },3000);
                });
            }

            $.each(result, function (key, value) {
                var element = $('#'+key);

                element.closest('div.'+key)
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger')
                    .remove();
                element.after('<p class="text-danger">'+value+'</p>');
            });
        },error:function(error){
            console.log(error.status);
        }
    });
    //check_value('edit_firstname','edit_lastname','edit_email','edit_role','edit_callcenter');
});