
<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/vendors.min.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/ui/prism.min.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/dashboard/resources')}}/app-assets/js/core/app-menu.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/js/core/app.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/js/scripts/components.js"></script>

<script src="{{asset('assets/dashboard/resources')}}/app-assets/js/scripts/forms/select/form-select2.js"></script>

<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/dashboard/resources')}}/app-assets/js/scripts/datatables/datatable.js"></script>
<script src="{{asset('assets/dashboard/resources')}}/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>

{{--<script src="{{asset('assets/dashboard/resources')}}/app-assets/js/scripts/pages/invoice.js"></script>--}}
<!-- END: Page JS-->

@if(\Illuminate\Support\Facades\App::isLocale('ar'))

<script src="//cdn.datatables.net/plug-ins/1.10.21/i18n/Arabic.json"></script>
@endif
<!-- CK Editor -->


<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script src="{{asset('backend-scripts/ajax.js')}}"></script>
<script src="{{asset('backend-scripts/scripts.js')}}"></script>

<script type="text/javascript">
      
$(document).ready(function (e) {
 

   $("#inputGroupFile01").change(function(event) {  
  RecurFadeIn();
  readURL(this);    
});
$("#inputGroupFile01").on('click',function(event){
  RecurFadeIn();
});
function readURL(input) {    
  if (input.files && input.files[0]) {   
    var reader = new FileReader();
    var filename = $("#inputGroupFile01").val();
    filename = filename.substring(filename.lastIndexOf('\\')+1);
    reader.onload = function(e) {
      debugger;      
      $('#blah').attr('src', e.target.result);
      $('#blah').hide();
      $('#blah').fadeIn(500);      
      $('.custom-file-label').text(filename);             
    }
    reader.readAsDataURL(input.files[0]);    
  } 
  $(".alert").removeClass("loading").hide();
}
function RecurFadeIn(){ 
  console.log('ran');
  FadeInAlert("Wait for it...");  
}
function FadeInAlert(text){
  $(".alert").show();
  $(".alert").text(text).addClass("loading");  
}
   
});
 
</script>

<script type="text/javascript">

	$('document').ready(function(){
        if($('#productSellFlag:checkbox:checked').length > 0) {
            $('#productIncome').css('display','block');
        }
        else{
            $('#productIncome').css('display','none');
        }

        $('#productSellFlag').change(function() {
            if(this.checked) {
                $('#productIncome').css('display','block');
            }
            else{
                $('#productIncome').css('display','none');
            }
        });

        if($('#productBuyFlag:checkbox:checked').length > 0) {
            $('#productOutcome').css('display','block');
        }
        else{
            $('#productOutcome').css('display','none');
        }
        $('#productBuyFlag').change(function() {
            if(this.checked) {
                $('#productOutcome').css('display','block');
            }
            else{
                $('#productOutcome').css('display','none');
            }
        });
	});

    $(".select2").select2({
        // the following code is used to disable x-scrollbar when click in select input and
        // take 100% width in responsive also
        dropdownAutoWidth: true,
        width: '100%'
    });

    // Basic Select2 select
    $(".select2-customer").select2({
        // the following code is used to disable x-scrollbar when click in select input and
        // take 100% width in responsive also
        dropdownAutoWidth: true,
        width: '100%',
        escapeMarkup: function (markup) { return markup; },
        language: {
            noResults: function () {
                return "<a data-toggle='modal' data-target='#addNewCustomer'><i class='fa fa-plus-circle'></i>{{__('Add new Customer')}}</a>";
            }
        }
    });
    // Basic Select2 select
    $(".select2-vendor").select2({
        // the following code is used to disable x-scrollbar when click in select input and
        // take 100% width in responsive also
        dropdownAutoWidth: true,
        width: '100%',
        escapeMarkup: function (markup) { return markup; },
        language: {
            noResults: function () {
                return "<a data-toggle='modal' data-target='#addNewVendor'><i class='fa fa-plus-circle'></i>{{__('Add new Vendor')}}</a>";
            }
        }
    });

    $('#submit-customer').click(function() {
        console.log('submitted');
        $.ajax({ // create an AJAX call...
            data: $('.customer-form').serialize(), // get the form data
            type: $('.customer-form').attr('method'), // GET or POST
            url: $('.customer-form').attr('action'), // the file to call

            success: function(data) { // on success..
                $('#addNewCustomer').modal('toggle');
                var newOption = new Option(data.name, data.id, false, false);
                $('.select2-customer').append(newOption).trigger('change');
            }
        });
        return false; // cancel original event to prevent form submitting
    });

    $('#submit-vendor').click(function() {
        console.log('submitted');
        $.ajax({ // create an AJAX call...
            data: $('.vendor-form').serialize(), // get the form data
            type: $('.vendor-form').attr('method'), // GET or POST
            url: $('.vendor-form').attr('action'), // the file to call

            success: function(data) { // on success..
                $('#addNewVendor').modal('toggle');
                var newOption = new Option(data.name, data.id, false, false);
                $('.select2-vendor').append(newOption).trigger('change');
            }
        });
        return false; // cancel original event to prevent form submitting
    });

    $('#submit-item').click(function() {
        console.log('submitted');
        $.ajax({ // create an AJAX call...
            data: $('.item-form').serialize(), // get the form data
            type: $('.item-form').attr('method'), // GET or POST
            url: $('.item-form').attr('action'), // the file to call

            success: function(data) { // on success..
                $('#addNewItem').modal('toggle');
                $('.item-list').append(new Option(data.name, data.id, false, true));
            }
        });
        return false; // cancel original event to prevent form submitting
    });


</script>

