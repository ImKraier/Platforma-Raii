<script src="/assets/vendors/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
@toastr_js
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
<script src="/assets/js/index.js"></script>
@toastr_render
<script>
    $(document).ready(function() {
        $('#app_dataTable').dataTable( {
            "language": {
                "url": "{{asset('assets/vendors/romanian.json')}}"
            }
        } );
    } );
</script>
