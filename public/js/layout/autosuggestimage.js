$(document).ready(function () {
    $('#searchImage').on('keyup',function() {
        // var id = $(this).data('searchimage-id');   
        var query = $(this).val(); 
        $.ajax({
            url:"/searchImage",
            type:"GET",
            data:{'name':query},
            success:function (data) {
                $('#searchImage_list').html(data);
            }
        })
        // end of ajax call
    });

    
    $(document).on('click', 'li', function(){
        var value = $(this).text();
        $('#searchImage').val(value);
        $('#searchImage_list').html("");
    });
});

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });