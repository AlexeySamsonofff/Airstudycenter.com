<!--<footer class="footer footer-static footer-dark navbar-border">
  <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
    <span class="float-md-left d-xs-block d-md-inline-block text-center">
      Copyright &copy; {{date('Y')}} <a href="{{url()->current()}}" class="text-bold-800 grey darken-2">PIXINVENT</a>, All rightsreserved.
    </span>
  </p>
</footer>-->
<!-- BEGIN VENDOR JS-->
<script src="{{asset('schooladmin/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<script src="{{asset('schooladmin/app-assets/vendors/js/bootstrap-multiselect.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('schooladmin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"type="text/javascript"></script>
<script src="{{asset('schooladmin/app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('schooladmin/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"type="text/javascript"></script>
<script src="{{asset('schooladmin/app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
<!-- <script src="{{asset('schooladmin/app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script> -->
<script src="{{asset('schooladmin/app-assets/vendors/js/extensions/unslider-min.js')}}" type="text/javascript"></script>
<script src="{{asset('schooladmin/app-assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
<script src="{{asset('schooladmin/app-assets/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>
<script src="{{asset('schooladmin/app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('schooladmin/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"
  type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="{{asset('schooladmin/app-assets/js/core/app-menu.min.js')}}" type="text/javascript"></script>
<script src="{{asset('schooladmin/app-assets/js/core/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('schooladmin/app-assets/js/scripts/customizer.min.js')}}" type="text/javascript"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- <script src="{{asset('schooladmin/app-assets/js/scripts/pages/dashboard-ecommerce.min.js')}}" type="text/javascript"></script> -->
<script src="{{asset('schooladmin/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"type="text/javascript"></script>

<script src="{{asset('schooladmin/app-assets/js/scripts/extensions/toastr.min.js')}}" type="text/javascript"></script>
<!-- <script src="{{asset('schooladmin/app-assets/js/scripts/forms/switch.min.js')}}" type="text/javascript"></script> -->
<script src="{{asset('schooladmin/app-assets/vendors/js/extensions/jquery.steps.min.js') }}" type="text/javascript"></script>
<script src="{{asset('schooladmin/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"
  type="text/javascript"></script>

  

<script src="{{asset('schooladmin/app-assets/js/scripts/forms/wizard-steps.min.js')}}" type="text/javascript"></script>

<!-- END PAGE LEVEL JS-->
<script src="{{ asset('vendor/ck-editor-devpel/ckeditor.js') }}"></script>
<script src="{{asset('vendor/ck-editor-devpel/adapters/jquery.js')}}"></script>
  <script src="{{asset('schooladmin/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js') }}"
  type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/js/scripts/forms/validation/form-validation.js')}}"type="text/javascript"></script>
  <script src="{{asset('schooladmin/app-assets/js/scripts/forms/select/form-select2.min.js')}}" type="text/javascript"></script>

  <!-- search in select -->
<!--   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>

<script>
$('textarea').ckeditor();	
</script>
  <script type="text/javascript">
      $(".chosen").chosen();
       $('#schoolList_data').on('change', function(e, params) {

        var schoolId = e.target.value;               
       $.ajax
        ({
            url: "{{route('getcourseschool')}}",
            type: "POST",
            data:{"_token":"{{csrf_token()}}","schoolId":schoolId,},
            success: function (response) 
            { 
             
              $('#courseList_data').html(response);
               $('#courseList_data').trigger("chosen:updated"); 
            },                                    
        });
    });
     $('[data-toggle="tooltip"]').tooltip(); 
</script>

</body>
</html>






