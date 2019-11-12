@extends('layouts.admin_template')

@section('content')
<h3>
@yield('page_header', 'Sales') &nbsp;

</h3>

<div class="box">
        <div class="box-body">
            <table id="sales" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Beginning Balance</th>
                    <th>Sales</th>
                    <th>Order</th>
                    <th>Ending Balance</th>
                    <th>Expiry Date</th>
                    <th>Signatory</th>
                    <th>Outlet</th>
                    <th>Date</th>
                    
                </tr>
                </thead>
                <tbody>
                   @foreach ($sales as $item)
                   <tr>
                        <td>{{ $item->beginning_balance }}</td>
                        <td>{{ $item->sales }}</td>
                        <td>{{ $item->order }}</td>
                        <td>{{ $item->ending_balance }}</td>
                        <td>{{ $item->expiry_date }}</td>
                        <td>{{ $item->signatory }}</td>
                        <td>{{ $item->outlet }}</td>
                        <td>{{ $item->created_at }}</td>
                   </tr>
                       
                   @endforeach
                </tbody>
                
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection