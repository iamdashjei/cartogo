$(document).on('submit','#add-formtowing',function (form) {
    form.preventDefault();

    let data = $('#add-formtowing').serialize();

    //console.log(JSON.stringify(data));
    $.ajax({
        'url'   : '/add-towing',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type'  : 'POST',
        'data'  : data,
        'cache' : false,
        success: function(result){

            console.log(result);
            if(result.success == true)
            {
                setTimeout(function(){
                    $('#add-formtowing').trigger('reset');
                    $('#add-towing').modal('toggle');
                    $.notify({
                            message: '1 Towing Successfully Added!'
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

$(document).on('click','.edit-towing',function(){
    let value = this.value;

    $.ajax({
        'url'   : '/get-towing-details',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type'  : 'GET',
        'data'  : {'id':value},
        'cache' : false,
        success:function(result){
            $('#towing_value').val(result[0].id);
            $('#edit_company').val(result[0].company);
            $('#edit_latitude').val(result[0].lat);
            $('#edit_longitude').val(result[0].lng);
            $('#edit_address').val(result[0].address);
            $('#edit_amount').val(result[0].amount);
            $('#edit_notes').val(result[0].notes);
            $('#edit_branch').val(result[0].branch);
           //console.log('Result' + JSON.stringify(result));

        },error:function(error){
            console.log(error.status);
        }
    });
});

$(document).on('submit','#update-towing',function (form) {
    form.preventDefault();

    let data = $('#update-towing').serialize();

    //console.log(data);
    $.ajax({
        'url'   : '/update-towing-details',
        'type'  : 'POST',
        'data'  : data,
        'cache' : false,
        success:function(result){
            console.log(result);
            if(result.success == true)
            {
                setTimeout(function(){
                    $('#edit_towing').modal('toggle');
                    $.notify({
                            message: '1 Towing Successfully Updated!'
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