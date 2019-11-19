@extends('layouts.admin_template')

@section('content')
<h3>
@yield('page_header', 'Towing') &nbsp;
<button type="button" class="btn bg-primary" data-toggle="modal" data-target="#add-towing"><i class="fa fa-plus"></i> Add Towing</button>
</h3>

<div class="box">
        <div class="box-body">
            <table id="towing" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Company</th>
                    <th>Address</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Service Amount</th>
                    <th>Branch</th>
                    <th>Notes</th>
                    <th>Contact No</th>
                    <th>Date</th>
                    <th>Action</th>
                    
                </tr>
                </thead>
                <tbody>
                   @foreach ($towing as $item)
                   <tr>
                        <td>{{ $item->company }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->lat }}</td>
                        <td>{{ $item->lng }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->branch }}</td>
                        <td>{{ $item->notes }}</td>
                        <td>{{ $item->mobile_no }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-primary edit-towing" title="Edit" data-toggle="modal" data-target="#edit_towing" value="{{$item->id}}"><i class="fa fa-edit"></i></button>
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
<div class="modal fade" id="add-towing">
    <div class="modal-dialog modal-lg">
        <form method="post" id="add-formtowing">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Towing</h4>
                </div>

                <div class="modal-body">
                    @csrf

                    <div class="form-group">

                        <div class="row">
                            <span class="col-lg-4">
                                <label for="company">Company</label>
                                <input type="text" name="company" id="company" class="form-control"/>
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
                                        <div class="notes">
                                            <label for="notes">Notes</label>
                                            <input type="text" name="notes" id="notes" class="form-control"/>
                                        </div>
                                    </div>
                            </span>

                            <span class="col-lg-4">
                                    <div class="form-group">
                                            <div class="mobile_no">
                                                <label for="mobile_no">Contact No</label>
                                                <input type="text" name="mobile_no" id="mobile_no" class="form-control"/>
                                            </div>
                                        </div>
                            </span>

                            <span class="col-lg-4">
                                <div class="form-group">
                                    <div class="branch">
                                        <label for="branch">Branch</label> <span class="required">*</span>
                                        <input type="text" name="branch" id="branch" class="form-control"/>
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
<div class="modal fade" id="edit_towing">
        <div class="modal-dialog modal-lg">
            <form method="post" id="update-towing">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Towing Detail</h4>
                    </div>

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="towing_value" id="towing_value"/>
                        <span id="change_status"></span>
                        <div class="form-group">

                            <div class="row">
                                <span class="col-lg-4">
                                    <label for="edit_company">Company</label>
                                    <input type="text" name="edit_company" id="edit_company" class="form-control"/>
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
                                                <div class="edit_amount">
                                                    <label for="edit_amount">Amount</label>
                                                    <input type="number" step="0.01" name="edit_amount" id="edit_amount" class="form-control"/>
                                                </div>
                                            </div>
                                </span>

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
                                            <div class="edit_mobile_no">
                                                <label for="edit_mobile_no">Contact No</label>
                                                <input type="text" name="edit_mobile_no" id="edit_mobile_no" class="form-control"/>

                                            </div>
                                        </div>
                                </span>
    
                                <span class="col-lg-4">
                                        <div class="form-group">
                                                <div class="edit_branch">
                                                    <label for="edit_branch">Branch</label>
                                                    <input type="text" name="edit_branch" id="edit_branch" class="form-control"/>

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