<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="{{ asset('admin/js/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins.js') }}"></script>
<script src="{{ asset('admin/js/app.js') }}"></script>

<!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
<!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key="></script> -->
<script src="{{ asset('admin/js/helpers/gmaps.min.js') }}"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="{{ asset('admin/js/pages/index.js') }}"></script>
<script src="{{ asset('admin/js/helpers/ckeditor/ckeditor.js') }}"></script>

<!-- iCheck -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });


        $('.app_logout').on('click', function(e) {
            $.ajax({
                type: "POST",
                url: 'http://localhost:8090/logout',
                data: $(this).serialize(),

                success: function( response ) {
                    window.location.href = 'http://localhost:8090';
                },
                error: function( jqXHR, textStatus, errorThrown ) {
                    console.log( jqXHR );
                    console.log( textStatus );
                    console.log( errorThrown );
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    });
</script>

<!-- Load and execute javascript code used only in this page -->
<script src="{{ asset('admin/js/pages/tablesDatatables.js') }}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>

@stack('scripts')

<!-- para los alerts -->
<script type="text/javascript">
	function alerts(growlType, message){
		console.info(growlType+' '+message);
		if(growlType != null){
		    $.bootstrapGrowl(message, {
		        type: growlType,
		        delay: 2500,
		        allow_dismiss: true
		    });
		}
	};
</script>



@push('scripts')
    <script type="text/javascript">
        
    </script>
@endpush