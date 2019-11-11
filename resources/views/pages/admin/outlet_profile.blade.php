@extends('layouts.admin_template')

@section('content')
<h3>
@yield('page_header', 'Outlets') &nbsp;
<button type="button" class="btn bg-primary" data-toggle="modal" data-target="#add-outlet"><i class="fa fa-plus"></i> Add Outlet</button>
</h3>

<div class="box">
        <div class="box-body">
            <table id="outlet" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Store Name</th>
                    <th>Store Type</th>
                    <th>Account</th>
                    <th>Address</th>
                    <th>Showcase No</th>
                    <th>Size</th>
                    <th>Contact Person</th>
                    <th>Contact No</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($outlet as $item)
                   <tr>
                        <td>{{ $item->store_name }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->account }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->showcase_no }}</td>
                        <td>{{ $item->size }}</td>
                        <td>{{ $item->contact_person }}</td>
                        <td>{{ $item->contact_no }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-primary edit-outlet" title="Edit" data-toggle="modal" data-target="#edit_outlet" value="{{$item->id}}"><i class="fa fa-edit"></i></button>
                        </td>
                   </tr>
                       
                   @endforeach
                </tbody>
                
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->


 {{-- Add Outlet --}}
<div class="modal fade" id="add-outlet">
    <div class="modal-dialog modal-lg">
        <form method="post" id="add-formoutlet">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Outlet</h4>
                </div>

                <div class="modal-body">
                    @csrf

                    <div class="form-group">

                        <div class="row">
                            <span class="col-lg-4">
                                    <div class="form-group">
                                        <div class="store_name">
                                            <label for="store_name">Store Name</label>
                                            <input type="text" name="store_name" id="store_name" class="form-control"/>
                                        </div>
                                    </div>
                            </span>    

                            <span class="col-lg-4">
                                <div class="form-group">
                                    <div class="showcase">
                                        <label for="showcase">Showcase No</label>
                                        <input type="text" name="showcase" id="showcase" class="form-control"/>
                                    </div>
                                </div>
                            </span>
                            <span class="col-lg-4">
                                <div class="form-group">
                                    <div class="cperson">
                                        <label for="cperson">Contact Person</label><span class="required">*</span>
                                        <input type="text" name="cperson" id="cperson" class="form-control"/>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="row">
                            <span class="col-lg-4">
                                        <div class="form-group">
                                            <div class="cnumber">
                                                <label for="cnumber">Contact Number</label><span class="required">*</span>
                                                <input type="text" name="cnumber" id="cnumber" class="form-control"/>
                                            </div>
                                        </div>
                            </span>
                            <span class="col-lg-4">
                                    <div class="form-group">
                                        <div class="address">
                                            <label for="address">Address</label> <span class="required">*</span>
                                            <input type="text" name="address" id="address" class="form-control"/>
                                        </div>
                                    </div>
                            </span>
                            <span class="col-lg-4">
                                <div class="form-group">
                                    <div class="size">
                                        <label for="size">Size</label><span class="required">*</span>
                                        <input type="text" name="size" id="size" class="form-control"/>
                                    </div>
                                </div>
                            </span>
                            <span class="col-lg-4">
                                    <div class="form-group">
                                            <div class="type">
                                                <label for="type">Type</label>
                                                <select name="type" class="form-control type" id="type">
                                                    <option></option>
                                                    <option>Groceries</option>
                                                    <option>Center</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                            </span>

                            <span class="col-lg-4">
                                <div class="form-group">
                                        <div class="account">
                                            <label for="account">Account</label>
                                            <select name="account" class="form-control account" id="account">
                                                <option></option>
                                                <option>Cash</option>
                                                <option>Credit</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                            </span>

                            

                            
                        </div>

                        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-primary"><i class="fa fa-check"></i> Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{--Edit Product--}}
<div class="modal fade" id="edit_outlet">
        <div class="modal-dialog modal-lg">
            <form method="post" id="update-outlet">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Outlet Profile</h4>
                    </div>

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="outlet_value" id="outlet_value"/>
                        <span id="change_status"></span>
                        <div class="form-group">

                                <div class="row">
                                        <span class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="edit_store_name">
                                                        <label for="edit_store_name">Store Name</label>
                                                        <input type="text" name="edit_store_name" id="edit_store_name" class="form-control"/>
                                                    </div>
                                                </div>
                                        </span>    
            
                                        <span class="col-lg-4">
                                            <div class="form-group">
                                                <div class="edit_showcase">
                                                    <label for="edit_showcase">Showcase No</label>
                                                    <input type="text" name="edit_showcase" id="edit_showcase" class="form-control"/>
                                                </div>
                                            </div>
                                        </span>
                                        <span class="col-lg-4">
                                            <div class="form-group">
                                                <div class="edit_cperson">
                                                    <label for="edit_cperson">Contact Person</label><span class="required">*</span>
                                                    <input type="text" name="edit_cperson" id="edit_cperson" class="form-control"/>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="row">
                                        <span class="col-lg-4">
                                                    <div class="form-group">
                                                        <div class="edit_cnumber">
                                                            <label for="edit_cnumber">Contact Number</label><span class="required">*</span>
                                                            <input type="text" name="edit_cnumber" id="edit_cnumber" class="form-control"/>
                                                        </div>
                                                    </div>
                                        </span>
                                        <span class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="edit_address">
                                                        <label for="edit_address">Address</label> <span class="required">*</span>
                                                        <input type="text" name="edit_address" id="edit_address" class="form-control"/>
                                                    </div>
                                                </div>
                                        </span>
                                        <span class="col-lg-4">
                                            <div class="form-group">
                                                <div class="edit_size">
                                                    <label for="edit_size">Size</label><span class="required">*</span>
                                                    <input type="text" name="edit_size" id="edit_size" class="form-control"/>
                                                </div>
                                            </div>
                                        </span>
                                        <span class="col-lg-4">
                                                <div class="form-group">
                                                        <div class="edit_type">
                                                            <label for="edit_type">Type</label>
                                                            <select name="edit_type" class="form-control type" id="edit_type">
                                                                <option></option>
                                                                <option>Groceries</option>
                                                                <option>Center</option>
                                                               
                                                            </select>
                                                        </div>
                                                    </div>
                                        </span>
            
                                        <span class="col-lg-4">
                                            <div class="form-group">
                                                    <div class="edit_account">
                                                        <label for="edit_account">Account</label>
                                                        <select name="edit_account" class="form-control edit_account" id="edit_account">
                                                            <option></option>
                                                            <option>Cash</option>
                                                            <option>Credit</option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                        </span>
                                </div>
        
                                
                            </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-primary"><i class="fa fa-check"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection