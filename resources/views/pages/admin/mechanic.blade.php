@extends('layouts.admin_template')

@section('content')
<h3>
@yield('page_header', 'Mechanic') &nbsp;
<button type="button" class="btn bg-primary" data-toggle="modal" data-target="#add-mechanic"><i class="fa fa-plus"></i> Add Mechanic</button>

</h3>

<div class="box">
        <div class="box-body">
            <table id="mechanic" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Service</th>
                    <th>Specialty</th>
                    <th>Notes</th>
                    <th>Date</th>
                    <th>Action</th>
                    
                </tr>
                </thead>
                <tbody>
                   @foreach ($mechanic as $item)
                   <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->service }}</td>
                        <td>{{ $item->specialty }}</td>
                        <td>{{ $item->notes }}</td>
                        
                        <td>{{ $item->created_at }}</td>
                        
                        <td>
                            <button type="button" class="btn btn-primary edit-mechanic" title="Edit" data-toggle="modal" data-target="#edit_mechanic" value="{{$item->id}}"><i class="fa fa-edit"></i></button>
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
<div class="modal fade" id="add-mechanic">
    <div class="modal-dialog modal-lg">
        <form method="post" id="add-formmechanic">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Mechanic</h4>
                </div>

                <div class="modal-body">
                    @csrf

                    <div class="form-group">

                        <div class="row">
                            <span class="col-lg-4">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control"/>
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
                                    <div class="specialty">
                                        <label for="specialty">Specialty</label> <span class="required">*</span>
                                        <input type="text" name="specialty" id="specialty" class="form-control"/>
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
                                            <div class="notes">
                                                <label for="notes">Notes</label>
                                                <input type="text" name="notes" id="notes" class="form-control"/>
                                            </div>
                                        </div>
                            </span>

                            <span class="col-lg-4">
                                <div class="form-group">
                                        <div class="service">
                                            <label for="service">Service</label>
                                            <input type="text" name="service" id="service" class="form-control"/>
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
<div class="modal fade" id="edit_mechanic">
        <div class="modal-dialog modal-lg">
            <form method="post" id="update-mechanic">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Mechanic Detail</h4>
                    </div>

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="mechanic_value" id="mechanic_value"/>
                        <span id="change_status"></span>
                        <div class="form-group">

                            <div class="row">
                                <span class="col-lg-4">
                                    <label for="edit_name">Name</label>
                                    <input type="text" name="edit_name" id="edit_name" class="form-control"/>

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
                                                <div class="edit_notes">
                                                    <label for="edit_notes">Notes</label>
                                                    <input type="text" name="edit_notes" id="edit_notes" class="form-control"/>
                                                </div>
                                            </div>
                                </span>

                                <span class="col-lg-4">
                                    <div class="form-group">
                                            <div class="edit_service">
                                                <label for="edit_service">Service</label>
                                                <input type="text" name="edit_service" id="edit_service" class="form-control"/>
                                            </div>
                                        </div>
                                </span>
    
                                <span class="col-lg-4">
                                    <div class="form-group">
                                            <div class="edit_specialty">
                                                <label for="edit_specialty">Specialty</label>
                                                <input type="text" name="edit_specialty" id="edit_specialty" class="form-control"/>
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