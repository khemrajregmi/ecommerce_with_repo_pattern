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
                    <h2>Settings </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="check-all" class="flat"></th>
                            <th>Site Name</th>
                            <th>Action</th>

                        </tr>
                        </thead>


                        <tbody>
                        @foreach($settings as $s)
                        <tr> 
                            <td><input type="checkbox" class="flat" value="{{$s->code}}" name="table_records"></td>
                            <td>{{$s->value}}</td>
                            <td><a href="{{route('admin.setting.edit',$s->code)}}" class="btn btn-default btn-sm">

                                    <i class="fa fa-edit"></i> Edit
                                </a></td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
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

    <script type="text/javascript">
        $('.deleteData').click(function(){
            if(!$("input:checkbox").is(":checked")){
                new PNotify({
                    title: 'Warning',
                    text: 'No Data Selected. Please select data to delete.',
                    hide: false,
                    styling: 'bootstrap3'
                });
            }else{
                if(confirm("Are you sure you want to delete ??")){
                    var category_id = [];
                    $.each($("input[name='table_records']:checked"), function(){
                        category_id.push($(this).val());
                    });
                    console.log(category_id);


                    /** Delete data ***/
                    $.ajax({
                        type: "DELETE",
                        url: "category/" + category_id,
                        data:{
                            "_token":"{{csrf_token()}}"
                        },
                        success: function(msg){
                            new PNotify({
                                title: 'Success',
                                text: 'Data Deleted Successfully. Loading ....',
                                hide: false,
                                type:'success',
                                styling: 'bootstrap3'
                            });
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 2000);

                        }

                    });

                    /** Delete Data **/



                }
            }
        });
    </script>
@endsection('pageScript')