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
<!-- Select2 -->
    <link href="{{asset('assets/admin/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
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
            <h2>manufacturer <small> Import/Export</small></h2>
            <div class="pull-right">
                <a href="{{route('admin.manufacturer.index')}}" class="btn btn-info btn-md">
                     Back
                </a>
                <a href="{{route('admin.manufacturer.import','xls')}}"><button class="btn btn-success">Download Excel xls</button></a>
                            <a href="{{route('admin.manufacturer.import','xlsx')}}"><button class="btn btn-success">Download Excel xlsx</button></a>
                            <a href="{{route('admin.manufacturer.import','csv')}}"><button class="btn btn-success">Download CSV</button></a>
            </div>
            <div class="clearfix"></div>
            </div>
          <div class="x_content">
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>OOPS! You might have missed to fill some required fields. Please check the errors.  <strong>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                </div>
            @endif
            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                    {{ Session::get('success') }}
                </p>
            @endif 
            <h3>Import File Form:</h3>
            <form  action="{{route('admin.manufacturer.export')}}" class="form-horizontal" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">Store Name<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="select2_multiple form-control" multiple="multiple" name="store[]">
                                    <option>Choose Stores</option>
                                    @foreach($stores as $s)
                                        <option value="{{$s->store_id}}">{{$s->store_name}}</option>
                                    @endforeach
                                </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount">Import File<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="import_file" />
                    </div>
                </div>

                <hr/>
                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="coupon-discount"><span class="required"></span>
                            </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                          <button class="btn btn-primary">Import CSV or Excel File</button>
                    </div>
                </div>
               
                

                



            </form>

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
    <script type="text/javascript"
                    src="{{asset('assets/admin/vendors/select2/dist/js/select2.full.min.js')}}"></script>

    <script type="text/javascript">
         $(".select2_multiple").select2({
                        maximumSelectionLength: 10,
                        allowClear: true
                    });
    </script>
@endsection('pageScript')