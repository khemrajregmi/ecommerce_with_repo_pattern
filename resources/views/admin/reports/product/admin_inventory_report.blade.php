@extends('admin.layouts.master')
@section('pageCss')
<!-- Datatables -->
<link href="{{asset('assets/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet')}}">
<link href="{{asset('assets/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
<!-- PNotify -->
<link href="{{asset('assets/admin/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin//vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
<!-- Datatables -->
@endsection
@section('content') 
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
       @if (Session::has('notifier.notice'))
       <script>
        new PNotify({!! Session::get('notifier.notice') !!});
    </script>
    @endif
    @if(Session::has('message'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }} fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <p>{{ Session::get('message') }}</p>
        @endif
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Product Inventory Report <small> List</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart"></i> Product Inventory List</h3>
                </div>
                <div class="panel-body">
                    <div class="well">
                        <div class="row">
                            <form id="myForm" class="form-horizontal form-label-left" method="post" action="{{route('admin.salesreport.inventory-filter')}}">
                                {{csrf_field()}}
                                 <div class="col-md-6 col-md-offset-3">
                                   <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sku">Stock Status
                                    </label>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                       <select class="form-control" name="stock_status_id">    <option value="0">All Status</option>
                                            @foreach($stockstatus as $ss)
                                                <option value="{{$ss->stock_status_id}}">{{$ss->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                </div>

                              <button type="submit" id="button-filter" class="btn btn-primary pull-right"><i class="fa fa-filter"></i> Filter</button>
                            </form>
                  </div>
                </div>
                  <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Model</th>
                            <th>Stock Qty.</th>
                            <th>Status Status</th>
                        </tr>
                    </thead>


                    <tbody>
                        @if(!$result->isEmpty())
                        @foreach($result as $res)
                        <tr> 
                            <td>{{$res->name}}</td>
                            <td>{{$res->model}}</td>
                            <td>{{$res->quantity}}</td>
                            <td>{{$res->stockStatus->name}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>
</div>
@endsection('content')
@section('pageScript')

<!-- Datatables -->
<script src="{{asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('assets/admin/vendors/datatables.net-scroller/js/datatables.scroller.min.js')}}"></script>
<!-- Datatables -->
<!-- iCheck -->
<script src="{{asset('assets/admin/vendors/iCheck/icheck.min.js')}}"></script>
<!-- PNotify -->
<script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.js')}}"></script>
<script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
<script src="{{asset('assets/admin/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>
@include('laravelPnotify::notify')
<!-- Datatables -->
<script>
    $(document).ready(function() {


        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            'order': [[ 1, 'asc' ]],
            'columnDefs': [
            { orderable: false, targets: [0] }
            ]
        });
        $datatable.on('draw.dt', function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

    });
</script>
<!-- /Datatables -->

<!-- bootstrap-daterangepicker -->
<script src="{{asset('assets/admin/js/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/admin/js/datepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/admin/js/datepicker/calender.js')}}"></script>

<!-- Date picker -->


@endsection('pageScript')