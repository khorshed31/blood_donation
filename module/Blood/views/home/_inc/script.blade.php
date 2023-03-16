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




        function addToLike(obj,post_id){

        var route              = `{{ route('admin.add-to-like') }}`;

        
        axios.post(route, {
            'post_id': post_id,
        })
            .then(function (response) {
                if(response.data.success){
                    $(obj).html('<i class="mdi mdi-heart text-danger"></i> '+response.data.total +  ' Likes')

                }else {
                    deleteLike(obj,post_id);
                }
            })
            .catch(function (error) {
            }); 
    }



    function deleteLike(obj,post_id){

    var route              = `{{ route('admin.like-delete') }}`;
    
        axios.post(route, {

            'post_id': post_id
        })
            .then(function (response) {

                $(obj).html('<i class="uil uil-heart me-1"></i> '+response.data.total +  ' Likes')

            })
            .catch(function (error) {
                toster_error(response.data.message)
            });


    }


     var isOpen = false;

        function comment(id) {
            if (!isOpen) {
                $('#comment'+id).show()
                isOpen = true;

                $(document).on('mouseup', function(e) {
                    if (!$('#comment'+id).is(e.target) && $('#comment'+id).has(e.target).length === 0) {
                        $('#comment'+id).hide();
                        isOpen = false;
                        $(document).off('mouseup');
                    }
                });
            } else {
                $('#comment'+id).hide();
                isOpen = false;
            }
        }






</script>