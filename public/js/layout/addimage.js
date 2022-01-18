
var modalimage = document.getElementById("my-image-modal");

var btnimage = document.getElementById("addimage");

var buttonimage = document.getElementById("ok-image-btn");

// We want the modal to open when the Open button is clicked
btnimage.onclick = function() {
    modalimage.style.display = "block";
}
// We want the modal to close when the OK button is clicked
buttonimage.onclick = function() {
    modalimage.style.display = "none";
}

// The modal will close when the user clicks anywhere outside the modal
window.onclick = function(event) {
    if (event.target == modalimage) {
        modalimage.style.display = "none";
    }
}