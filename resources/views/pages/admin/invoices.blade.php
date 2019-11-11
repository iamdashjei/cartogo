@extends('layouts.admin_template')

@section('content')
<h3>
@yield('page_header', 'Invoices') &nbsp;
<button type="button" class="btn bg-primary" data-toggle="modal" data-target="#add-invoices"><i class="fa fa-plus"></i> Add Invoice</button>
</h3>

<div class="box">
        <div class="box-body">
            <table id="invoices" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Store Name</th>
                    <th>Store Type</th>
                    <th>Account</th>
                    <th>Address</th>
                    <th>Showcase No</th>
                    <th>Size</th>
                    <th>Contact Person</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   {{-- @foreach ($product as $item)
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
                       
                   @endforeach --}}
                </tbody>
                
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection