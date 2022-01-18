

$('.open-share-btn').click(function() {
    // ajax form
    var id = $(this).data('share-id');   
    // console.log(id);
    var sharemodal = $(this).data('share-target');

    $('#id').val(id); 
    $('#formshareaction').attr("action", "albums/sharing/"+id);
    $(sharemodal).css("display", "block")
    // call a function fetch sharing with a ajax call with response json
    // for delete a set data attribute and use those when called 

    $.getJSON( "albums/sharing-list/"+id, function(data){
        console.log(data);
        var sharinglist = [];
        $.each(data, function(key,value){
            
            for (var i = 0; i < value.length; i++) {
                sharinglist.push("<li class='sharinglistli justify-content-between flex'><div><div class='font-bold text-xs text-capitalize'>"+value[i].name+"</div>"+"<div class='text-xs'>"+value[i].email+"</div></div>"+
                    "<div><form action=/removesharing/"+value[i].id+ 
                        " method='POST'> <input type='hidden' name='_token' value='rkvQoAnoI1OarBfm7VEeIm4Cg5KXeBC6GpCtiIEm'> <input type='hidden' name='_method' value='DELETE'>  <button class='text-red-500 text-xs hover:text-red-600'>Delete</button> </form> </div> </li>")
            }
        });
        $(".sharingdata").html(sharinglist);
    });

    } );

$('#close-shairng-btn').click(function() {
    // console.log('test');
    var sharemodal = document.getElementById("shareModal");
    $(sharemodal).css("display", "none")
});