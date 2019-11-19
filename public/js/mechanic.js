$(document).on('submit','#add-formmechanic',function (form) {
    form.preventDefault();

    let data = $('#add-formmechanic').serialize();

    //console.log(JSON.stringify(data));
    $.ajax({
        'url'   : '/add-mechanic',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type'  : 'POST',
        'data'  : data,
        'cache' : false,
        success: function(result){

            console.log(result);
            if(result.success == true)
            {
                setTimeout(function(){
                    $('#add-formmechanic').trigger('reset');
                    $('#add-mechanic').modal('toggle');
                    $.notify({
                            message: '1 Mechanic Successfully Added!'
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

$(document).on('click','.edit-mechanic',function(){
    let value = this.value;

    $.ajax({
        'url'   : '/get-mechanic-details',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type'  : 'GET',
        'data'  : {'id':value},
        'cache' : false,
        success:function(result){
            $('#mechanic_value').val(result[0].id);
            $('#edit_name').val(result[0].name);
            $('#edit_address').val(result[0].address);
            $('#edit_service').val(result[0].service);
            $('#edit_specialty').val(result[0].specialty);
            $('#edit_latitude').val(result[0].lat);
            $('#edit_longitude').val(result[0].lng);
            $('#edit_notes').val(result[0].notes);
            $('#edit_mobile_no').val(result[0].mobile_no);
           
           
           //console.log('Result' + JSON.stringify(result));

        },error:function(error){
            console.log(error.status);
        }
    });
});

$(document).on('submit','#update-mechanic',function (form) {
    form.preventDefault();

    let data = $('#update-mechanic').serialize();

    //console.log(data);
    $.ajax({
        'url'   : '/update-mechanic-details',
        'type'  : 'POST',
        'data'  : data,
        'cache' : false,
        success:function(result){
            console.log(result);
            if(result.success == true)
            {
                setTimeout(function(){
                    $('#edit_mechanic').modal('toggle');
                    $.notify({
                            message: '1 Mechanic Successfully Updated!'
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