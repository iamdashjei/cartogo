@extends('layouts.admin_template')

@section('content')
<h3>
@yield('page_header', 'Map Monitoring') &nbsp;

</h3>

<div class="box">
        <div class="box-body">
                <div style="width: 1500px; height: 1000px;">
                        {!! Mapper::render() !!}
                </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection