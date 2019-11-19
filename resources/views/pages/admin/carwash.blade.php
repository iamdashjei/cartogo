@extends('layouts.admin_template')

@section('content')
<h3>
@yield('page_header', 'Carwash') &nbsp;
<button type="button" class="btn bg-primary" data-toggle="modal" data-target="#add-carwash"><i class="fa fa-plus"></i> Add Carwash</button>
</h3>

<div class="box">
        <div class="box-body">
            <table id="carwash" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Customer</th>
                    <th>Address</th>
                    <th>Service</th>
                    {{-- <th>Vehicle</th> --}}
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Notes</th>
                    <th>Contact No</th>
                    <th>Date</th>
                    <th>Action</th>
                    
                </tr>
                </thead>
                <tbody>
                   @foreach ($carwash as $item)
                   <tr>
                        <td>{{ $item->customer }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->service }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->payment_method }}</td>
                        <td>{{ $item->notes }}</td>
                        <td>{{ $item->mobile_no }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-primary edit-carwash" title="Edit" data-toggle="modal" data-target="#edit_carwash" value="{{$item->id}}"><i class="fa fa-edit"></i></button>
                        </td>
                   </tr>
                       
                   @endforeach
                </tbody>
                
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

{{-- Add Carwash --}}
<div class="modal fade" id="add-carwash">
    <div class="modal-dialog modal-lg">
        <form method="post" id="add-formcarwash">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Carwash</h4>
                </div>

                <div class="modal-body">
                    @csrf

                    <div class="form-group">

                        <div class="row">
                            <span class="col-lg-4">
                                <label for="customer">Customer</label>
                                <input type="text" name="customer" id="customer" class="form-control"/>
                            </span>    

                            <span class="col-lg-4">
                                <div class="form-group">
                                    <div class="latitude">
                                        <label for="latitude">Latitude</label>
                                        <input type="text" name="latitude" id="latitude" class="form-control"/>
                                    </div>
                                </div>
                            </span>
                            <span class="col-lg-4">
                                <div class="form-group">
                                    <div class="longitude">
                                        <label for="longitude">Longitude</label><span class="required">*</span>
                                        <input type="text" name="longitude" id="longitude" class="form-control"/>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="row">
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
                                    <div class="service">
                                        <label for="service">Service</label> <span class="required">*</span>
                                        <input type="text" name="service" id="service" class="form-control"/>
                                    </div>
                                </div>
                            </span>

                            <span class="col-lg-4">
                                <div class="form-group">
                                    <div class="notes">
                                        <label for="notes">Notes</label> <span class="required">*</span>
                                        <input type="text" name="notes" id="notes" class="form-control"/>
                                    </div>
                                </div>
                            </span>

                            <span class="col-lg-4">
                                <div class="form-group">
                                    <div class="mobile_no">
                                        <label for="mobile_no">Contact No</label> <span class="required">*</span>
                                        <input type="text" name="mobile_no" id="mobile_no" class="form-control"/>
                                    </div>
                                </div>
                            </span>
                            {{-- <span class="col-lg-6">
                                <div class="form-group">
                                    <div class="vehicle">
                                        <label for="vehicle">Vehicle</label><span class="required">*</span>
                                        <input type="text" name="vehicle" id="vehicle" class="form-control"/>
                                    </div>
                                </div>
                            </span> --}}
                            <span class="col-lg-4">
                                    <div class="form-group">
                                            <div class="amount">
                                                <label for="amount">Amount</label>
                                                <input type="number" step="0.01" name="amount" id="amount" class="form-control"/>
                                            </div>
                                        </div>
                            </span>

                            <span class="col-lg-4">
                                    <div class="form-group">
                                            <div class="payment_method">
                                                <label for="payment_method">Select Payment Method</label>
                                                <select name="payment_method" class="form-control payment_method" id="payment_method">
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

{{--Edit Carwash--}}
<div class="modal fade" id="edit_carwash">
        <div class="modal-dialog modal-lg">
            <form method="post" id="update-carwash">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Carwash Detail</h4>
                    </div>

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="carwash_value" id="carwash_value"/>
                        <span id="change_status"></span>
                        <div class="form-group">

                            <div class="row">
                                <span class="col-lg-4">
                                    <label for="edit_customer">Customer</label>
                                    <select name="edit_customer" class="form-control edit_customer" id="edit_customer">
                                        <option></option>
                                        @foreach ($carwash as $item)
                                        <option value="{{$item->customer}}">{{ucfirst($item->customer)}}</option>
                                        @endforeach
                                        
                                    </select>
                                </span>    
    
                                <span class="col-lg-4">
                                    <div class="form-group">
                                        <div class="edit_latitude">
                                            <label for="edit_latitude">Latitude</label>
                                            <input type="text" name="edit_latitude" id="edit_latitude" class="form-control"/>
                                        </div>
                                    </div>
                                </span>
                                <span class="col-lg-4">
                                    <div class="form-group">
                                        <div class="edit_longitude">
                                            <label for="edit_longitude">Longitude</label><span class="required">*</span>
                                            <input type="text" name="edit_longitude" id="edit_longitude" class="form-control"/>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <div class="row">
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
                                        <div class="edit_service">
                                            <label for="edit_service">Service</label> <span class="required">*</span>
                                            <input type="text" name="edit_service" id="edit_service" class="form-control"/>
                                        </div>
                                    </div>
                                </span>

                                <span class="col-lg-4">
                                    <div class="form-group">
                                        <div class="edit_service">
                                            <label for="edit_service">Notes</label> <span class="required">*</span>
                                            <input type="text" name="edit_service" id="edit_service" class="form-control"/>
                                        </div>
                                    </div>
                                </span>

                                <span class="col-lg-4">
                                    <div class="form-group">
                                        <div class="edit_mobile_no">
                                            <label for="edit_mobile_no">Contact No</label> <span class="required">*</span>
                                            <input type="text" name="edit_mobile_no" id="edit_mobile_no" class="form-control"/>
                                        </div>
                                    </div>
                                </span>
                                {{-- <span class="col-lg-6">
                                    <div class="form-group">
                                        <div class="vehicle">
                                            <label for="vehicle">Vehicle</label><span class="required">*</span>
                                            <input type="text" name="vehicle" id="vehicle" class="form-control"/>
                                        </div>
                                    </div>
                                </span> --}}
                                <span class="col-lg-4">
                                        <div class="form-group">
                                                <div class="edit_amount">
                                                    <label for="edit_amount">Amount</label>
                                                    <input type="number" step="0.01" name="edit_amount" id="edit_amount" class="form-control"/>
                                                </div>
                                            </div>
                                </span>
    
                                <span class="col-lg-4">
                                        <div class="form-group">
                                                <div class="edit_payment_method">
                                                    <label for="edit_payment_method">Select Payment Method</label>
                                                    <select name="edit_payment_method" class="form-control edit_payment_method" id="edit_payment_method">
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