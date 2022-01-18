
    var modalalbum = document.getElementById("my-album-modal");
    
    var btnalbum = document.getElementById("addalbum");
  
    var buttonalbum = document.getElementById("ok-album-btn");
  
    // We want the modal to open when the Open button is clicked
    btnalbum.onclick = function() {
        modalalbum.style.display = "block";
    }
    // We want the modal to close when the OK button is clicked
    buttonalbum.onclick = function() {
        modalalbum.style.display = "none";
    }
  
    // The modal will close when the user clicks anywhere outside the modal
    window.onclick = function(event) {
        if (event.target == modalalbum) {
            modalalbum.style.display = "none";
        }
    }