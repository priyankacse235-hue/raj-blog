<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

{{-- <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script> --}}

{{-- <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script> --}}

{{-- <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script> --}}

{{-- <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}

{{-- <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script> --}}

<script src="{{asset('plugins/moment/moment.min.js')}}"></script>

{{-- <script src="{{asset('asset(plugins/daterangepicker/daterangepicker.js')}}"></script> --}}

{{-- <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script> --}}

{{-- <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script> --}}

{{-- <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script> --}}

<script src="{{asset('dist/js/adminlte2167.js?v=3.2.0')}}"></script>

{{-- <script src="{{ asset('ckeditor4/ckeditor.js') }}"></script> --}}
{{-- <script src="{{asset('dist/js/ckeditor.js')}}"></script> --}}
<script type="text/javascript" src="https://lsolegal.com/admin/ckeditor/ckeditor.js"></script>

<script src="{{asset('client/js/select2.min.js')}}"></script>

<!-- data table -->
{{-- <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script> --}}
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> -->

{{-- <script src="{{asset('dist/js/demo.js')}}"></script> --}}

<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>


<script>
    $(document).ready(function(){
        setTimeout(() => {
            $('.alert').each(function() {
                // Check the auto-hide attribute
                if ($(this).attr('auto-hide') !== 'false') {
                    $(this).addClass('d-none');
                }
            });
        }, 5000); 
    })

    function change_status(params) {
        $.ajax({
            url : '{{ url("/admin/change-status") }}',
            type : 'post',
            dara : {
                module : 'category',
                _token : '{{ csrf_token() }}',
            },
            success : function (data){
                console.log(data);
            }
        })
    }
</script>
       


