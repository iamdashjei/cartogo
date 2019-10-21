@extends('layouts.admin_template')

@section('content')
<h3>
@yield('page_header', 'Booking Route') &nbsp;
<button type="button" class="btn bg-primary" data-toggle="modal" data-target="#add-bookingroute"><i class="fa fa-plus"></i> Add Booking Route</button>
</h3>

<div class="box">
        <div class="box-body">
            <table id="activities" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Store Name</th>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   
                </tbody>
                
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection