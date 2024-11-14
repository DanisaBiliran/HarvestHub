document.getElementById("showOverlay").onclick = function() {
    document.getElementById("overlay").style.display = "block"; // Show overlay

   fetch('sign_in.html')
       .then(response => response.text())
       .then(data => {
           document.getElementById("overlayContent").innerHTML = data;

           // Show Overlay 1 by default
           document.getElementById("overlay1").style.display = "block";

           // Event listener to switch to login overlay
           document.getElementById("toLogin").onclick = function() {
               document.getElementById("overlay1").style.display = "none";
               document.getElementById("overlay2").style.display = "block";
           };
       });
};

// CLOSE OVERLAY
function closeForm() {
   document.getElementById("overlay").style.display = "none"; // Hide overlay
   document.getElementById("overlay1").style.display = "none"; // Hide first overlay
   document.getElementById("overlay2").style.display = "none"; // Hide second overlay
}