@extends('layouts.admin_template')

@section('content')
<h3>
@yield('page_header', 'Product') &nbsp;
<button type="button" class="btn bg-primary" data-toggle="modal" data-target="#add-product"><i class="fa fa-plus"></i> Add Product</button>
</h3>

<div class="box">
        <div class="box-body">
            <table id="product" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Stocks Available</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($product as $item)
                   <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->stocks }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-primary edit-product" title="Edit" data-toggle="modal" data-target="#edit_product" value="{{$item->id}}"><i class="fa fa-edit"></i></button>
                        </td>
                   </tr>
                       
                   @endforeach
                </tbody>
                
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

 {{-- Add Product--}}
 <div class="modal fade" id="add-product">
        <div class="modal-dialog modal-lg">
            <form method="post" id="add-formproduct">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Product</h4>
                    </div>

                    <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <span class="col-lg-4">
                                    <div class="form-group">
                                        <div class="firstname">
                                            <label for="firstname">Product Name</label> <span class="required">*</span>
                                            <input type="text" name="prodname" id="prodname" class="form-control"/>
                                        </div>
                                    </div>
                                </span>
                                <span class="col-lg-4">
                                    <div class="form-group">
                                        <div class="middlename">
                                            <label for="middlename">Description</label>
                                            <input type="text" name="proddesc" id="proddesc" class="form-control"/>
                                        </div>
                                    </div>
                                </span>
                                <span class="col-lg-4">
                                    <div class="form-group">
                                        <div class="lastname">
                                            <label for="lastname">Stocks</label><span class="required">*</span>
                                            <input type="number" name="prodstock" id="prodstock" class="form-control"/>
                                        </div>
                                    </div>
                                </span>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="category">
                                                <label for="category">Category</label>
                                                <select name="category" class="form-control role" id="role">
                                                    <option></option>
                                                    <option value="Regular Yakult">Regular Yakult</option>
                                                    <option value="Yakult Light">Yakult Light</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-purple"><i class="fa fa-check"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{--Edit Product--}}
    <div class="modal fade" id="edit_product">
            <div class="modal-dialog modal-lg">
                <form method="post" id="update-product">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Update Product</h4>
                        </div>
    
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="product_value" id="product_value"/>
                            <span id="change_status"></span>
                            <div class="form-group">
                                <div class="row">
                                    <span class="col-lg-4">
                                        <div class="form-group">
                                            <div class="edit_prodname">
                                                <label for="edit_prodname">Product Name</label> <span class="required">*</span>
                                                <input type="text" name="edit_prodname" id="edit_prodname" class="form-control"/>
                                            </div>
                                        </div>
                                    </span>
                                    <span class="col-lg-4">
                                        <div class="form-group">
                                            <div class="edit_proddesc">
                                                <label for="edit_proddesc">Description</label>
                                                <input type="text" name="edit_proddesc" id="edit_proddesc" class="form-control"/>
                                            </div>
                                        </div>
                                    </span>
                                    <span class="col-lg-4">
                                        <div class="form-group">
                                            <div class="edit_prodstock">
                                                <label for="edit_prodstock">Stocks</label><span class="required">*</span>
                                                <input type="text" name="edit_prodstock" id="edit_prodstock" class="form-control"/>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="row">
                                    
                                    <span class="col-lg-6">
                                        <div class="form-group">
                                                <div class="edit_category">
                                                    <label for="edit_category">Category</label>
                                                    <select name="edit_category" class="form-control category" id="edit_category">
                                                        <option></option>
                                                        <option value="Regular Yakult">Regular Yakult</option>
                                                        <option value="Yakult Light">Yakult Light</option>
                                                        {{-- @foreach($roles as $role)
                                                            <option value="{{$role->name}}">{{ucfirst($role->name)}}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                    </span>
                                </div>
                            </div>
    
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn bg-purple"><i class="fa fa-check"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection

