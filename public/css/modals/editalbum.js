
    $('.open-album').click(function() {

        var id = $(this).data('album-id');   
        var name = $(this).data('album-name'); 
        var path = $(this).data('album-path');   
        var publicstatus = $(this).data('album-publicstatus');   
        var editmodal = $(this).data('target');

        var albid = $('#id').val(id); 
        var albname = $('#name').val(name);
        var albpath = $('#currentimage').attr("src",path);

        if(publicstatus == 1){
            var albstatus = $('#public_status').prop( "checked", true );
        }
        else{
            var albstatus = $('#public_status').prop( "checked", false );
        }

        $('#formaction').attr("action",'/update/album/'+id);
        $(editmodal).css("display", "block")
        } );

    $('#close-btn').click(function() {
        var editmodal = document.getElementById("editModal");
        $(editmodal).css("display", "none")
    });