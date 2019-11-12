@extends('layouts.admin_template')

@section('content')
<h3>
@yield('page_header', 'Invoices') &nbsp;
</h3>

<div class="box">
        <div class="box-body">
            <table id="invoices" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Invoice No</th>
                    <th>Total Sales</th>
                    <th>Less Vat</th>
                    <th>Net Vat</th>
                    <th>Vat Sales</th>
                    <th>Vat Amount</th>
                    <th>Amount Due</th>
                    <th>Payment Method</th>
                    <th>Notes</th>
                    <th>Outlet</th>
                    <th>Date</th>
                    
                </tr>
                </thead>
                <tbody>
                   @foreach ($invoice as $item)
                   <tr>
                        <td>{{ $item->invoice_no }}</td>
                        <td>{{ $item->total_sales }}</td>
                        <td>{{ $item->less_vat }}</td>
                        <td>{{ $item->net_vat }}</td>
                        <td>{{ $item->vat_sales }}</td>
                        <td>{{ $item->vat_amount }}</td>
                        <td>{{ $item->amount_due }}</td>
                        <td>{{ $item->payment_method }}</td>
                        <td>{{ $item->notes }}</td>
                        <td>{{ $item->outlet_id }}</td>
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