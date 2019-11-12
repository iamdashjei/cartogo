function check_value()
{
    let i;
    for (i = 0; i < arguments.length; i++) {

        if($('#'+arguments[i]).val().length > 0){
            $('.'+arguments[i]).closest('div.'+arguments[i]).removeClass('has-error').find('.text-danger').remove();
        }
    }
}

$(document).on('submit','#add-formvehicle',function (form) {
    form.preventDefault();

    let data = $('#add-formvehicle').serialize();

    //console.log(JSON.stringify(data));
    $.ajax({
        'url'   : '/add-vehicles',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type'  : 'POST',
        'data'  : data,
        'cache' : false,
        success: function(result){

            console.log(result);
            if(result.success == true)
            {
                setTimeout(function(){
                    $('#add-formvehicle').trigger('reset');
                    $('#add-vehicle').modal('toggle');
                    $.notify({
                            message: '1 Vehicle Successfully Added!'
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

$(document).on('click','.edit-vehicle',function(){
    let value = this.value;

    $.ajax({
        'url'   : '/get-vehicle-details',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type'  : 'GET',
        'data'  : {'id':value},
        'cache' : false,
        success:function(result){
            $('#vehicle_value').val(result[0].id);
            $('#edit_platenumber').val(result[0].platenumber);
            $('#edit_lastkm_reading').val(result[0].lastkm_reading);
            $('#edit_lastpassenger').val(result[0].lastpassenger);
            $('#edit_lasttime_out').val(result[0].lasttime_out);
            $('#edit_lasttotal_load').val(result[0].lasttotal_load);
            $('#edit_brand').val(result[0].brand);
            $('#edit_model').val(result[0].model);
            $('#edit_type').val(result[0].type);
            $('#edit_year').val(result[0].year);
            $('#edit_seat_no').val(result[0].seat_no);
            $('#edit_body_type').val(result[0].body_type);
            $('#edit_engine').val(result[0].engine);
            $('#edit_fuel_type').val(result[0].fuel_type);
            $('#edit_fuel_capacity').val(result[0].fuel_capacity);
            $('#edit_net_weight').val(result[0].net_weight);
            $('#edit_net_capacity').val(result[0].net_capacity);
            $('#edit_shipping_weight').val(result[0].shipping_weight);
            
           
           

        },error:function(error){
            console.log(error.status);
        }
    });
});

$(document).on('submit','#update-vehicle',function (form) {
    form.preventDefault();

    let data = $('#update-vehicle').serialize();

    //console.log(data);
    $.ajax({
        'url'   : '/update-vehicle-details',
        'type'  : 'POST',
        'data'  : data,
        'cache' : false,
        success:function(result){
            console.log(result);
            if(result.success == true)
            {
                setTimeout(function(){
                    $('#edit_vehicle').modal('toggle');
                    $.notify({
                            message: '1 Vehicle Successfully Updated!'
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