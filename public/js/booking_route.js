$(document).on('submit','#add-formbooking',function (form) {
    form.preventDefault();

    let data = $('#add-formbooking').serialize();

    //console.log(JSON.stringify(data));
    $.ajax({
        'url'   : '/add-booking',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type'  : 'POST',
        'data'  : data,
        'cache' : false,
        success: function(result){

            console.log(result);
            if(result.success == true)
            {
                setTimeout(function(){
                    $('#add-formbooking').trigger('reset');
                    $('#add-bookingroute').modal('toggle');
                    $.notify({
                            message: '1 Booking Route Successfully Added!'
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

$(document).on('click','.edit-booking',function(){
    let value = this.value;

    $.ajax({
        'url'   : '/get-booking-details',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type'  : 'GET',
        'data'  : {'id':value},
        'cache' : false,
        success:function(result){
            $('#booking_value').val(result[0].id);
            $('#edit_store_name').val(result[0].store_name).change();
            $('#edit_address').val(result[0].address);
            $('#edit_description').val(result[0].description);
            $('#edit_schedule').val(result[0].scheduled).change();
            $('#edit_latitude').val(result[0].lat);
            $('#edit_longitude').val(result[0].lng);
            $('#edit_route_date').val(result[0].route_date);
            $('#edit_user').val(result[0].user_id).change();
           //console.log('Result' + JSON.stringify(result));

        },error:function(error){
            console.log(error.status);
        }
    });
});

$(document).on('submit','#update-booking',function (form) {
    form.preventDefault();

    let data = $('#update-booking').serialize();

    //console.log(data);
    $.ajax({
        'url'   : '/update-booking-details',
        'type'  : 'POST',
        'data'  : data,
        'cache' : false,
        success:function(result){
            console.log(result);
            if(result.success == true)
            {
                setTimeout(function(){
                    $('#edit_bookingroute').modal('toggle');
                    $.notify({
                            message: '1 Booking Route Successfully Updated!'
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