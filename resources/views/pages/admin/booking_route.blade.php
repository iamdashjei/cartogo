@extends('layouts.admin_template')

@section('content')
<h3>
@yield('page_header', 'Booking Route') &nbsp;
<button type="button" class="btn bg-primary" data-toggle="modal" data-target="#add-bookingroute"><i class="fa fa-plus"></i> Add Booking Route</button>
</h3>

<div class="box">
        <div class="box-body">
            <table id="booking" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Store Name</th>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Scheduled As</th>
                    <th>Route Date</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $item)
                    <tr>
                        <td>{{ $item->store_name }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->scheduled }}</td>
                        <td>{{ $item->route_date }}</td>
                        <td>{{ $item->user_id }}</td>
                        <td>
                            <button type="button" class="btn btn-primary edit-booking" title="Edit" data-toggle="modal" data-target="#edit_bookingroute" value="{{$item->id}}"><i class="fa fa-edit"></i></button>
                        </td>
                    </tr>
                            
                    @endforeach
                </tbody>
                
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

{{-- Add Booking Route --}}
<div class="modal fade" id="add-bookingroute">
    <div class="modal-dialog modal-lg">
        <form method="post" id="add-formbooking">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Booking Route</h4>
                </div>

                <div class="modal-body">
                    @csrf

                    <div class="form-group">

                        <div class="row">
                            <span class="col-lg-4">
                                <label for="store_name">Store Name</label>
                                <select name="store_name" class="form-control store_name" id="store_name">
                                    <option></option>
                                    @foreach ($outlets as $item)
                                    <option value="{{$item->store_name}}">{{ucfirst($item->store_name)}}</option>
                                    @endforeach
                                    
                                </select>
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
                            <span class="col-lg-6">
                                <div class="form-group">
                                    <div class="description">
                                        <label for="description">Description</label><span class="required">*</span>
                                        <input type="text" name="description" id="description" class="form-control"/>
                                    </div>
                                </div>
                            </span>
                            <span class="col-lg-4">
                                    <div class="form-group">
                                            <div class="schedule">
                                                <label for="schedule">Schedule</label>
                                                <select name="schedule" class="form-control schedule" id="schedule">
                                                    <option></option>
                                                    <option>Monday</option>
                                                    <option>Tuesday</option>
                                                    <option>Wednesday</option>
                                                    <option>Thursday</option>
                                                    <option>Friday</option>
                                                    <option>Saturday</option>
                                                   
                                                    
                                                </select>
                                            </div>
                                        </div>
                            </span>

                            <span class="col-lg-4">
                                    <div class="form-group">
                                            <div class="user">
                                                <label for="user">Select User</label>
                                                <select name="user" class="form-control user" id="user">
                                                    <option></option>
                                                    @foreach ($users as $user)
                                                    <option value="{{$user->id}}">{{ucfirst($user->name)}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                            </span>

                            <span class="col-lg-4">
                                    <div class="form-group">
                                            <div class="route_date">
                                                <label for="route_date">Route Date</label><span class="required">*</span>
                                                <input type="date" name="route_date" id="route_date" class="form-control"/>
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

{{--Edit Product--}}
<div class="modal fade" id="edit_bookingroute">
        <div class="modal-dialog modal-lg">
            <form method="post" id="update-booking">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Booking Route</h4>
                    </div>

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="booking_value" id="booking_value"/>
                        <span id="change_status"></span>
                        <div class="form-group">

                                <div class="row">
                                    <span class="col-lg-4">
                                        <label for="edit_store_name">Store Name</label>
                                        <select name="edit_store_name" class="form-control edit_store_name" id="edit_store_name">
                                            <option></option>
                                            @foreach ($outlets as $item)
                                            <option value="{{$item->store_name}}">{{ucfirst($item->store_name)}}</option>
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
                                    <span class="col-lg-6">
                                        <div class="form-group">
                                            <div class="edit_description">
                                                <label for="edit_description">Description</label><span class="required">*</span>
                                                <input type="text" name="edit_description" id="edit_description" class="form-control"/>
                                            </div>
                                        </div>
                                    </span>
                                    <span class="col-lg-4">
                                            <div class="form-group">
                                                    <div class="edit_schedule">
                                                        <label for="edit_schedule">Schedule</label>
                                                        <select name="edit_schedule" class="form-control edit_schedule" id="edit_schedule">
                                                            <option></option>
                                                            <option>Monday</option>
                                                            <option>Tuesday</option>
                                                            <option>Wednesday</option>
                                                            <option>Thursday</option>
                                                            <option>Friday</option>
                                                            <option>Saturday</option>
                                                           
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                    </span>
        
                                    <span class="col-lg-4">
                                            <div class="form-group">
                                                    <div class="edit_user">
                                                        <label for="edit_user">Select User</label>
                                                        <select name="edit_user" class="form-control edit_user" id="edit_user">
                                                            <option></option>
                                                            @foreach ($users as $user)
                                                            <option value="{{$user->id}}">{{ucfirst($user->name)}}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                    </span>
        
                                    <span class="col-lg-4">
                                            <div class="form-group">
                                                    <div class="edit_route_date">
                                                        <label for="edit_route_date">Route Date</label><span class="required">*</span>
                                                        <input type="date" name="edit_route_date" id="edit_route_date" class="form-control"/>
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