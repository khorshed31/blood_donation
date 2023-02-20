<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.toast.js') }}"></script>
<script src="{{ asset('frontend/js/validin.js') }}"></script>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"78a7b8025d0abc25","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>


@yield('js')
@yield('script')


<script>

    $(".subscribe-submit").on('click', function(e){
        e.preventDefault();
        let email          = $('#subscribe-email').val();
        $.ajax({
            type:'POST',
            url: "{{ url('send/subscribe') }}",
            data: {
                _token: $('#token').val(),
                email: email,
            },
            success:function(data) {
                if (data.status == 1){
                    $('#subscribe-email').val(null);
                    $.toast({
                        heading: 'Success',
                        showHideTransition: 'slide',
                        text: data.message,
                        icon: 'success',
                        textAlign : 'left',
                        position : 'top-right'
                    })
                }else {
                    $('#subscribe-email').val(null);
                    $.toast({
                        heading: 'Warning',
                        text: data.message,
                        showHideTransition: 'plain',
                        icon: 'warning',
                        textAlign : 'left',
                        position : 'top-right'
                    })
                }

            },
            error:function (error) {
                $.toast({
                    heading: 'Warning',
                    text: error,
                    showHideTransition: 'plain',
                    icon: 'warning',
                    textAlign : 'left',
                    position : 'top-right'
                })
            }
        });

    });

</script>

<script>

    // Validate Email
    $('#validateForm').validin();

</script>
