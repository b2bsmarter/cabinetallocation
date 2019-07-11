@extends('layouts/default')

{{-- Page title --}}
@section('title')
Cabinet Allocation
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap4.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Cabinet Allocation</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="active">Cabinet Allocation - Firewalls</li>
                </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-12">
        <div class="card panel-primary ">
            <div class="card-heading cardBackground">
                <h4 class="card-title float-left"> <i class="livicon" data-name="file-import" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Firewalls
                </h4>
                <div class="float-right">
                    <a href="{{ route('firewall.create') }}"class="btn btn-sm btn-default"><span class='fa fa-plus'></span> New Firewall</a>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <table class="table  width100" id="firewalls">
                        <thead>
                            <tr class="filters">
                                <th>Source Interface</th>
                                <th>Source IP</th>
                                <th>Source Name</th>
                                <th>Destination Interface</th>
                                <th>Destination Address</th>
                                <th>Service Port</th>
                                <th>Service Name</th>
                                <th>Source NAT Type</th>
                                <th>Translated Source Address</th>
                                <th>Translated Destination Address</th>
                                <th>Translated Service Port</th>
                                <th>Translated Service Name</th>
                                <th>Descrption</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div><!-- row-->
</section>


@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>
<script>

    var table = $('#firewalls').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: '{!! route('firewall.data') !!}',
        autoWidth: true,
        columns: [
            {data: 'source_interface',               name: 'source_interface'},
            {data: 'source_ip',                      name: 'source_ip'},
            {data: 'source_name',                    name: 'source_name'},
            {data: 'destination_interface',          name: 'destination_interface'},
            {data: 'destination_address',            name: 'destination_address'},
            {data: 'service_port',                   name: 'service_port'},
            {data: 'service_name',                   name: 'service_name'},
            {data: 'source_nat_type',                name: 'source_nat_type'},
            {data: 'translated_source_address',      name: 'translated_source_address'},
            {data: 'translated_destination_address', name: 'translated_destination_address'},
            {data: 'translated_service_port',        name: 'translated_service_port'},
            {data: 'translated_service_name',        name: 'translated_service_name'},
            {data: 'description',                    name: 'description'},
            {data: 'actions',                        name: 'actions'},

        ],
        "language": {
                "lengthMenu": '_MENU_ ',
                "search": '',
                "searchPlaceholder": "{{ __('form.search') }}"
                // "paginate": {
                //     "previous": '<i class="fa fa-angle-left"></i>',
                //     "next": '<i class="fa fa-angle-right"></i>'
                // }
        }
    });
    table.on( 'draw', function () {
                    $('.livicon').each(function(){
                        $(this).updateLivicon();
                    });
                });


</script>
@stop
