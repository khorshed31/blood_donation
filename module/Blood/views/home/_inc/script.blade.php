<script>


    let page            = parseInt('{{ $posts->currentPage() }}');
    let currentPage     = parseInt('{{ $posts->currentPage() }}');
    let searchRoute     = `{{ route('home') }}`;


    function fetchData() {

        let blood_group = [];

        $('input[name="blood_group"]:checked').each(function() {
            blood_group.push($(this).val());
        });

        let params = {
            blood_group: blood_group,
            is_ajax: 1,
            page: page,
        }

        axios.get(searchRoute, {
                params: params
            })
            .then(function(response) {
                page        = parseInt(response.data.current_page || 1);
                currentPage = parseInt(response.data.current_page || 1);

                $('div').find('.post_load').html(response.data.html);
            })
            .catch(function(error) {

            });
    }







    /*
    |--------------------------------------------------------------------------
    | LOAD MORE DATA METHOD
    |--------------------------------------------------------------------------
    */
    function loadMoreData() {

        let blood_group = [];

        $('input[name="blood_group"]:checked').each(function() {
            blood_group.push($(this).val());
        });

        let params = {
            blood_group: blood_group,
            is_ajax: 1,
            page: page + 1,
        }

        $.ajax({
                url: searchRoute,
                method: 'get',
                data: params,
                beforeSend: function() {
                    $('.ajax-load').show();
                }
            })
            .done(function(data) {


                if (data.status == 0) {

                    $('.ajax-load').html('No more records found!');
                    return;
                }
                if (data.status == 1) {

                    page        = parseInt(data.page);
                    currentPage = parseInt(data.page);
                
                    $('.ajax-load').hide();
                    $('div').find('.post_load').append(data.html);
                }

            })
            .fail(function(jqXHR, ajaxOptions, ThrownError) {
                $('.ajax-load').html('Server not responding...');
            })
        }


        $(window).scroll(function() {

        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 20) {

            if (page != currentPage) {
                return;
            }
            loadMoreData(page)
            currentPage++;
        }
        })



</script>