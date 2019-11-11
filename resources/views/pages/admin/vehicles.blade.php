@extends('layouts.admin_template')

@section('content')
<h3>
@yield('page_header', 'Vehicles') &nbsp;
<button type="button" class="btn bg-primary" data-toggle="modal" data-target="#add-vehicle"><i class="fa fa-plus"></i> Add Vehicle</button>
</h3>

<div class="box">
        <div class="box-body">
            <table id="vehicles" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Model</th>
                    <th>Brand</th>
                    <th>Plate Number</th>
                    <th>Type</th>
                    <th>Year</th>
                    <th>Last KM Reading</th>
                    <th>Last Time-out</th>
                    <th>Last Total Load</th>
                    <th>Last Passenger</th>
                    <th>Shipping Weight</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($vehicle as $item)
                   <tr>
                        <td>{{ $item->model }}</td>
                        <td>{{ $item->brand }}</td>
                        <td>{{ $item->platenumber }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->year }}</td>
                        <td>{{ $item->lastkm_reading }} KM</td>
                        <td>{{ $item->lasttime_out }}</td>
                        <td>{{ $item->lasttotal_load }}</td>
                        <td>{{ $item->lastpassenger }}</td>
                        <td>{{ $item->shipping_weight }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-primary edit-vehicle" title="Edit" data-toggle="modal" data-target="#edit_vehicle" value="{{$item->id}}"><i class="fa fa-edit"></i></button>
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
<div class="modal fade" id="add-vehicle">
        <div class="modal-dialog modal-lg">
            <form method="post" id="add-formvehicle">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Vehicle</h4>
                    </div>

                    <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <span class="col-lg-4">
                                    <div class="form-group">
                                        <div class="model">
                                            <label for="model">Model</label> <span class="required">*</span>
                                            <input type="text" name="model" id="model" class="form-control"/>
                                        </div>
                                    </div>
                                </span>
                                <span class="col-lg-4">
                                    <div class="form-group">
                                        <div class="brand">
                                            <label for="brand">Brand</label>
                                            <input type="text" name="brand" id="brand" class="form-control"/>
                                        </div>
                                    </div>
                                </span>
                                <span class="col-lg-4">
                                    <div class="form-group">
                                        <div class="platenumber">
                                            <label for="platenumber">Plate Number</label><span class="required">*</span>
                                            <input type="text" name="platenumber" id="platenumber" class="form-control"/>
                                        </div>
                                    </div>
                                </span>
                            </div>

                            <div class="form-group">
                                    <div class="row">
                                            <span class="col-lg-4">
                                                    <div class="form-group">
                                                        <div class="type">
                                                            <label for="type">Type</label><span class="required">*</span>
                                                            <input type="text" name="type" id="type" class="form-control"/>
                                                        </div>
                                                    </div>
                                            </span>

                                            <span class="col-lg-4">
                                                    <div class="form-group">
                                                        <div class="year">
                                                            <label for="year">Year</label><span class="required">*</span>
                                                            <input type="text" name="year" id="year" class="form-control"/>
                                                        </div>
                                                    </div>
                                            </span>

                                            <span class="col-lg-4">
                                                    <div class="form-group">
                                                        <div class="seat_no">
                                                            <label for="seat_no">Seat No</label><span class="required">*</span>
                                                            <input type="text" name="seat_no" id="seat_no" class="form-control"/>
                                                        </div>
                                                    </div>
                                            </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <div class="row">
                                                <span class="col-lg-4">
                                                        <div class="form-group">
                                                            <div class="body_type">
                                                                <label for="body_type">Body Type</label><span class="required">*</span>
                                                                <input type="text" name="body_type" id="body_type" class="form-control"/>
                                                            </div>
                                                        </div>
                                                </span>
    
                                                <span class="col-lg-4">
                                                        <div class="form-group">
                                                            <div class="engine">
                                                                <label for="engine">Engine</label><span class="required">*</span>
                                                                <input type="text" name="engine" id="engine" class="form-control"/>
                                                            </div>
                                                        </div>
                                                </span>
    
                                                <span class="col-lg-4">
                                                        <div class="form-group">
                                                            <div class="fuel_type">
                                                                <label for="fuel_type">Fuel Type</label><span class="required">*</span>
                                                                <input type="text" name="fuel_type" id="fuel_type" class="form-control"/>
                                                            </div>
                                                        </div>
                                                </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <div class="row">
                                                    <span class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="fuel_capacity">
                                                                    <label for="fuel_capacity">Fuel Capacity</label><span class="required">*</span>
                                                                    <input type="number" name="fuel_capacity" id="fuel_capacity" class="form-control"/>
                                                                </div>
                                                            </div>
                                                    </span>
        
                                                    <span class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="net_weight">
                                                                    <label for="net_weight">Net Weight</label><span class="required">*</span>
                                                                    <input type="number" step="0.01" name="net_weight" id="net_weight" class="form-control"/>
                                                                </div>
                                                            </div>
                                                    </span>
        
                                                    <span class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="net_capacity">
                                                                    <label for="net_capacity">Net Capacity</label><span class="required">*</span>
                                                                    <input type="number" step="0.01" name="net_capacity" id="net_capacity" class="form-control"/>
                                                                </div>
                                                            </div>
                                                    </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <div class="row">
                                                        <span class="col-lg-4">
                                                                <div class="form-group">
                                                                    <div class="shipping_weight">
                                                                        <label for="shipping_weight">Shipping Weight</label><span class="required">*</span>
                                                                        <input type="number" step="0.01" name="shipping_weight" id="shipping_weight" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                        </span>
            
                                                        <span class="col-lg-4">
                                                                <div class="form-group">
                                                                    <div class="lastkm_reading">
                                                                        <label for="lastkm_reading">Last KM Reading</label><span class="required">*</span>
                                                                        <input type="number" name="lastkm_reading" id="lastkm_reading" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                        </span>
            
                                                        <span class="col-lg-4">
                                                                <div class="form-group">
                                                                    <div class="lastpassenger">
                                                                        <label for="lastpassenger">Last Passenger</label><span class="required">*</span>
                                                                        <input type="text" name="lastpassenger" id="lastpassenger" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                        </span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <div class="row">
                                                            <span class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <div class="lasttime_out">
                                                                            <label for="lasttime_out">Last Time-out</label><span class="required">*</span>
                                                                            <input type="date" name="lasttime_out" id="lasttime_out" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                            </span>
                
                                                            <span class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <div class="lasttotal_load">
                                                                            <label for="lasttotal_load">Last Total Load</label><span class="required">*</span>
                                                                            <input type="number"  name="lasttotal_load" id="lasttotal_load" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                            </span>
                
                                                           
                                                    </div>
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
    <div class="modal fade" id="edit_vehicle">
            <div class="modal-dialog modal-lg">
                <form method="post" id="update-vehicle">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Update Vehicle</h4>
                        </div>
    
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="vehicle_value" id="vehicle_value"/>
                            <span id="change_status"></span>
                            <div class="form-group">
                                    <div class="row">
                                        <span class="col-lg-4">
                                            <div class="form-group">
                                                <div class="edit_model">
                                                    <label for="edit_model">Model</label> <span class="required">*</span>
                                                    <input type="text" name="edit_model" id="edit_model" class="form-control"/>
                                                </div>
                                            </div>
                                        </span>
                                        <span class="col-lg-4">
                                            <div class="form-group">
                                                <div class="edit_brand">
                                                    <label for="edit_brand">Brand</label>
                                                    <input type="text" name="edit_brand" id="edit_brand" class="form-control"/>
                                                </div>
                                            </div>
                                        </span>
                                        <span class="col-lg-4">
                                            <div class="form-group">
                                                <div class="edit_platenumber">
                                                    <label for="edit_platenumber">Plate Number</label><span class="required">*</span>
                                                    <input type="text" name="edit_platenumber" id="edit_platenumber" class="form-control"/>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
        
                                    <div class="form-group">
                                            <div class="row">
                                                    <span class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="edit_type">
                                                                    <label for="edit_type">Type</label><span class="required">*</span>
                                                                    <input type="text" name="edit_type" id="edit_type" class="form-control"/>
                                                                </div>
                                                            </div>
                                                    </span>
        
                                                    <span class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="edit_year">
                                                                    <label for="edit_year">Year</label><span class="required">*</span>
                                                                    <input type="text" name="edit_year" id="edit_year" class="form-control"/>
                                                                </div>
                                                            </div>
                                                    </span>
        
                                                    <span class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="edit_seat_no">
                                                                    <label for="edit_seat_no">Seat No</label><span class="required">*</span>
                                                                    <input type="text" name="edit_seat_no" id="edit_seat_no" class="form-control"/>
                                                                </div>
                                                            </div>
                                                    </span>
                                            </div>
                                        </div>
        
                                        <div class="form-group">
                                                <div class="row">
                                                        <span class="col-lg-4">
                                                                <div class="form-group">
                                                                    <div class="edit_body_type">
                                                                        <label for="edit_body_type">Body Type</label><span class="required">*</span>
                                                                        <input type="text" name="edit_body_type" id="edit_body_type" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                        </span>
            
                                                        <span class="col-lg-4">
                                                                <div class="form-group">
                                                                    <div class="edit_engine">
                                                                        <label for="edit_engine">Engine</label><span class="required">*</span>
                                                                        <input type="text" name="edit_engine" id="edit_engine" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                        </span>
            
                                                        <span class="col-lg-4">
                                                                <div class="form-group">
                                                                    <div class="edit_fuel_type">
                                                                        <label for="edit_fuel_type">Fuel Type</label><span class="required">*</span>
                                                                        <input type="text" name="edit_fuel_type" id="edit_fuel_type" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                        </span>
                                                </div>
                                            </div>
        
                                            <div class="form-group">
                                                    <div class="row">
                                                            <span class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <div class="edit_fuel_capacity">
                                                                            <label for="edit_fuel_capacity">Fuel Capacity</label><span class="required">*</span>
                                                                            <input type="number" name="edit_fuel_capacity" id="edit_fuel_capacity" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                            </span>
                
                                                            <span class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <div class="edit_net_weight">
                                                                            <label for="edit_net_weight">Net Weight</label><span class="required">*</span>
                                                                            <input type="number" step="0.01" name="edit_net_weight" id="edit_net_weight" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                            </span>
                
                                                            <span class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <div class="edit_net_capacity">
                                                                            <label for="edit_net_capacity">Net Capacity</label><span class="required">*</span>
                                                                            <input type="number" step="0.01" name="edit_net_capacity" id="edit_net_capacity" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                        <div class="row">
                                                                <span class="col-lg-4">
                                                                        <div class="form-group">
                                                                            <div class="edit_shipping_weight">
                                                                                <label for="edit_shipping_weight">Shipping Weight</label><span class="required">*</span>
                                                                                <input type="number" step="0.01" name="edit_shipping_weight" id="edit_shipping_weight" class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                </span>
                    
                                                                <span class="col-lg-4">
                                                                        <div class="form-group">
                                                                            <div class="edit_lastkm_reading">
                                                                                <label for="edit_lastkm_reading">Last KM Reading</label><span class="required">*</span>
                                                                                <input type="number" name="edit_lastkm_reading" id="edit_lastkm_reading" class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                </span>
                    
                                                                <span class="col-lg-4">
                                                                        <div class="form-group">
                                                                            <div class="edit_lastpassenger">
                                                                                <label for="edit_lastpassenger">Last Passenger</label><span class="required">*</span>
                                                                                <input type="text" name="edit_lastpassenger" id="edit_lastpassenger" class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                </span>
                                                        </div>
                                                    </div>
        
                                                    <div class="form-group">
                                                            <div class="row">
                                                                    <span class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <div class="edit_lasttime_out">
                                                                                    <label for="edit_lasttime_out">Last Time-out</label><span class="required">*</span>
                                                                                    <input type="date" name="edit_lasttime_out" id="edit_lasttime_out" class="form-control"/>
                                                                                </div>
                                                                            </div>
                                                                    </span>
                        
                                                                    <span class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <div class="edit_lasttotal_load">
                                                                                    <label for="edit_lasttotal_load">Last Total Load</label><span class="required">*</span>
                                                                                    <input type="number" name="edit_lasttotal_load" id="edit_lasttotal_load" class="form-control"/>
                                                                                </div>
                                                                            </div>
                                                                    </span>
                        
                                                                   
                                                            </div>
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