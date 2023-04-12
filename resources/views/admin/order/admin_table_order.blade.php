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
                    <h2>Orders <small> List</small></h2>
                    <div class="pull-right">
                    <a href="{{route('admin.order.create')}}" class="btn btn-info btn-md">
                        <span class="glyphicon glyphicon-plus"></span> Add
                    </a>
                    <a href="#" class="btn btn-danger btn-md deleteData">
                        <span class="glyphicon glyphicon-trash" ></span> Delete
                    </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">



                                    <table  class="table table-striped table-bordered bulk_action datatable">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="check-all" class="flat"></th>
                                            <th>order ID</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Date Added</th>
                                            <th>Date Modified</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td><input type="checkbox" class="flat" value="{{$order->order_id}}" name="table_records"></td>
                                            <td>{{$order->order_id}}</td>
                                            <td>{{$order->firstname}} {{$order->lastname}}</td>
                                            <td>{{$order->orderStatus->getName()}}</td>
                                            <td>{{$order->total}}</td>
                                            <td>{{$order->created_at->format('Y-m-d')}}</td>
                                            <td>{{$order->updated_at->format('Y-m-d')}}</td>
                                            <td>
                                                <a href="{{route('admin.order.show',$order->order_id)}}" data-toggle="tooltip" title="View Detail" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('admin.order.edit',$order->order_id)}}" class="btn btn-default btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                        </div>



                </div>
            </div>
        </div>


    </div>
@endsection('content')
@section('pageScript')
        <!-- iCheck -->
    <script src="{{asset('assets/admin/vendors/iCheck/icheck.min.js')}}"></script>
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

            var $datatable = $('.datatable');

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
    <script type="text/javascript">
        var deleteRow = $('.deleteData');
        var route = "order";
        var token = "{{csrf_token()}}";
        deleteTableRow(deleteRow,route,token);
    </script>
    <!-- /Datatables -->
@endsection('pageScript')

