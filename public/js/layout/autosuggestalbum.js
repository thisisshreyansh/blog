$(document).ready(function () {
    $('#searchAlbum').on('keyup',function() {
        var query = $(this).val(); 
        $.ajax({
            url:"/searchAlbum",
            type:"GET",
            data:{'name':query},
            success:function (data) {
                $('#searchAlbum_list').html(data);
            }
        })
        // end of ajax call
    });

    
    $(document).on('click', 'li', function(){
        var value = $(this).text();
        $('#searchAlbum').val(value);
        $('#searchAlbum_list').html("");
    });
});