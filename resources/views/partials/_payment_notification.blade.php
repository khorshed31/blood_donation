<script>
    $(document).ready(function () {
        $.get('{{route('dokani.subscription.alert')}}', function (res) {
            console.log(res)
            if (res.success) {
                $('body').prepend(
                    `
                        <div class="alert alert-danger text-center" role="alert" style="z-index: 9999999999;
                                                    margin: 0;padding: 5px;position: fixed;left: 0;right: 0;">
                            <a href="{{ route('dokani.subscription.index') }}" class="btn-link alert-link smp-button" style="border: none; outline: none">
                            <u>Your Software Subscription Expired at {{ optional(auth()->user()->package)->end_date }} (Click to Payment)</u>
                            </a>
                        </div>
                    `
                );
                $('#navbar').css('margin-top', '35px');
                $('.pos-rel').css('top', '35px');
            }


            if (res.overdue) {
                $('button').each(function () {
                    if (['save', 'update',].includes($(this).text().toString().trim().toLowerCase())) {
                        $(this).attr('disabled', true);
                    }
                });
                $('button[type=submit]:not(:disabled)').each(function () {
                    $(this).attr('disabled', true);
                });
                $('input[type=submit]:not(:disabled)').each(function () {
                    $(this).attr('disabled', true);
                });
                $('button[title=Delete]').attr('disabled', true);
                $('.smp-button').attr('disabled', false);
            }
        })
    })
</script>
