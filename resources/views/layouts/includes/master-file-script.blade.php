<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>

<!-- Code Highlight js -->
<script src="{{ asset('assets/vendor/highlightjs/highlight.pack.min.js') }}"></script>
<script src="{{ asset('assets/js/hyper-syntax.js') }}"></script>

<!--  Select2 Plugin Js -->
<script src="{{ asset('assets/vendor/select2/js/select2.min.js') }}"></script>


<!-- quill js -->
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<!-- quill Init js-->
<script src="{{ asset('assets/js/pages/demo.quilljs.js') }}"></script>

<!-- Daterangepicker Plugin js -->
<script src="{{ asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>

<!-- Bootstrap Datepicker Plugin js -->
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<!-- Bootstrap Timepicker Plugin js -->
<script src="{{ asset('assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>

<!-- Input Mask Plugin js -->
<script src="{{ asset('assets/vendor/jquery-mask-plugin/jquery.mask.min.js') }}"></script>

<!-- Bootstrap Touchspin Plugin js -->
<script src="{{ asset('assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>

<!-- Bootstrap Maxlength Plugin js -->
<script src="{{ asset('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

<!-- Typehead Plugin js -->
<script src="{{ asset('assets/vendor/handlebars/handlebars.min.js') }}"></script>
<script src="{{ asset('assets/vendor/typeahead.js/typeahead.bundle.min.js') }}"></script>


<!-- Fullcalendar js -->
<script src="{{ asset('assets/vendor/fullcalendar/main.min.js') }}"></script>

<!-- Calendar App Demo js -->
<script src="{{ asset('assets/js/pages/demo.calendar.js') }}"></script>



<!-- Datatables js -->
<script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>



<!-- Dropzone File Upload js -->
<script src="{{ asset('assets/vendor/dropzone/min/dropzone.min.js') }}"></script>

<!-- File Upload Demo js -->
<script src="{{ asset('assets/js/ui/component.fileupload.js') }}"></script>



<!-- Typehead Demo js -->
<script src="{{ asset('assets/js/pages/demo.typehead.js') }}"></script>

<!-- Timepicker Demo js -->
<script src="{{ asset('assets/js/pages/demo.timepicker.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.3/axios.min.js" integrity="sha512-wS6VWtjvRcylhyoArkahZUkzZFeKB7ch/MHukprGSh1XIidNvHG1rxPhyFnL73M0FC1YXPIXLRDAoOyRJNni/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


<script type="text/javascript">
    function withDefault(value, default_value) {
        return value ? value : default_value
    }
</script>








<!-- datepicker & timepicker script -->
<script src="{{ asset('assets/custom_js/chosen-box.js') }}"></script>



<!-- chosen script -->
<script src="{{ asset('assets/custom_js/date-picker.js') }}"></script>






<!-- custom toster -->
<script src="{{ asset('assets/custom_js/message-display.js') }}"></script>



<!-- file upload js -->
<script src="{{ asset('assets/custom_js/file_upload.js') }}"></script>

<script src="{{ asset('assets/custom_js/drag-and-drop.js') }}"></script>


<script src="{{ asset('assets/custom_js/gallery.js') }}"></script>


<script src="{{ asset('assets/custom_js/jquery.toast.js') }}"></script>




<!-- delete confirm dialog -->
<script type="text/javascript" src="{{ asset('assets/custom_js/confirm_delete_dialog.js') }}"></script>


<!-- dynamically include script -->
@yield('js')
@yield('script')

<script>
    function log(message) {
        console.log(message)
    }

    let path = window.location.href

    path = path.replace('#', '')

    let selector = "a[href='" + path + "']"


    if (!$(selector).closest('li').hasClass('hasQuery')) {
        path = path.split('?')[0]
    }

    selector = "a[href='" + path + "']"

    selector = selector.replace('edit', '');
    selector = selector.replace('print', '');
    selector = selector.replace('show', '');

    if ($(selector).length < 1) {

        selector = selector.substring(0, selector.lastIndexOf('/'))

        if ($(selector).length < 1) {

            selector = selector.substring(0, selector.lastIndexOf('/'))

            // if ($(selector).length < 1) {

            //     selector = selector.substring(0, selector.lastIndexOf('/'))

            //     if ($(selector).length < 1) {

            //         selector = selector.substring(0, selector.lastIndexOf('/'))
            //     }
            // }
        }
    }



    let a_tag = $(selector)



    let li_tag = a_tag.closest('li')


    if (!$(selector).closest('li').hasClass('unlink') || $(selector).closest('li').hasClass('hasChild')) {
        li_tag.addClass('active')
    }

    li_tag.parents('li').add(this).each(function() {

        $(this).addClass('open')

    });
</script>



<script>
    $(document).ready(function(){
        $('.select2').select2({})
    })
</script>



<script>
    $('select').each(function() {
        let selected = $(this).data('selected');

        if (typeof selected === "undefined") {
            return;
        }

        $(this).val(selected).prop('selected', 'selected')

    })
</script>

<!-- global scripts -->
<script type="text/javascript">
    // <!-- popover -->
    // $('[data-rel=popover]').popover({
    //     html: true,
    //     container: 'body'
    // });

    JavaScriptGallery.initGallery();



    // auto fadeout success message, when redirect with success message
    $('.success').fadeIn('slow').delay(10000).fadeOut('slow');




    // alert message display
    function showAlertMessage(message, time = 1000, type = 'error') {
        swal.fire({
            title: type.toUpperCase(),
            html: "<b>" + message + "</b>",
            type: type,
            timer: time
        })
    }



    // success alert message like popup window
    @if (session()->get('message'))
        swal.fire({
        title: "Success",
        html: "<b>{{ session()->get('message') }}</b>",
        type: "success",
        timer: 1000
        });



        // success alert message like popup window
    @elseif (session()->get('success'))
        swal.fire({
        title: "Success",
        html: "<b>{{ session()->get('success') }}</b>",
        type: "success",
        timer: 1000
        });


        // error alert message like popup window
    @elseif(session()->get('error'))
        swal.fire({
        title: "Error",
        html: "<b>{{ session()->get('error') }}</b>",
        type: "error",
        timer: 1000
        });
    @endif




    // input field only number accept method
    function onlyNumber(evnt) {
        let keyCode = evnt.charCode
        let str = evnt.target.value
        let n = str.includes(".")

        if (keyCode == 13) {
            evnt.preventDefault();
        }

        if (keyCode == 46 && n) {
            return false
        }

        if (str.length > 12) {
            showAlertMessage('Number length out of range', 3000)
            return false
        }
        return (keyCode >= 48 && keyCode <= 57) || keyCode == 13 || keyCode == 46
    }


    // input field only number accept class
    $('.only-number').keypress(function() {
        return onlyNumber(event)
    })





    function getPercentAmount(total_amount, percent) {
        return (total_amount * percent) / 100
    }





    function getPercent(total_amount, discount_amount) {
        if (total_amount < 1) {
            return 0;
        }

        return (discount_amount * 100) / total_amount
    }
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>





<!-- software payment notification script -->
@if (request()->segment(1) != 'em')
    {{-- @include('partials._payment_notification') --}}
@endif
