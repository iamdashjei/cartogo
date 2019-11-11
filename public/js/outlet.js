function check_value()
{
    let i;
    for (i = 0; i < arguments.length; i++) {

        if($('#'+arguments[i]).val().length > 0){
            $('.'+arguments[i]).closest('div.'+arguments[i]).removeClass('has-error').find('.text-danger').remove();
        }
    }
}

$(document).on('submit','#add-formoutlet',function (form) {
    form.preventDefault();

    let data = $('#add-formoutlet').serialize();

    //console.log(JSON.stringify(data));
    $.ajax({
        'url'   : '/add-outlet',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type'  : 'POST',
        'data'  : data,
        'cache' : false,
        success: function(result){

            console.log(result);
            if(result.success == true)
            {
                setTimeout(function(){
                    $('#add-formoutlet').trigger('reset');
                    $('#add-outlet').modal('toggle');
                    $.notify({
                            message: '1 Outlet Successfully Added!'
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

$(document).on('click','.edit-outlet',function(){
    let value = this.value;

    $.ajax({
        'url'   : '/get-outlet-details',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type'  : 'GET',
        'data'  : {'id':value},
        'cache' : false,
        success:function(result){
            $('#outlet_value').val(result[0].id);
            $('#edit_store_name').val(result[0].store_name);
            $('#edit_address').val(result[0].address);
            $('#edit_showcase').val(result[0].showcase_no);
            $('#edit_size').val(result[0].size);
            $('#edit_cperson').val(result[0].contact_person);
            $('#edit_cnumber').val(result[0].contact_no);
            $('#edit_type').val(result[0].type).change();
            $('#edit_account').val(result[0].account).change();
           

        },error:function(error){
            console.log(error.status);
        }
    });
});

$(document).on('submit','#update-outlet',function (form) {
    form.preventDefault();

    let data = $('#update-outlet').serialize();

    //console.log(data);
    $.ajax({
        'url'   : '/update-outlet-details',
        'type'  : 'POST',
        'data'  : data,
        'cache' : false,
        success:function(result){
            console.log(result);
            if(result.success == true)
            {
                setTimeout(function(){
                    $('#edit_outlet').modal('toggle');
                    $.notify({
                            message: '1 Outlet Successfully Updated!'
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