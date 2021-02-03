/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}

function myFunction() {
  document.getElementById("dropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function (event) {
  if (!event.target.matches('.btn-user')) {
    var dropdowns = document.getElementsByClassName("d-item");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function loadimage() {
  var img = document.createElement("img");
  var div = document.createElement("div");
  var imagecontainer = document.getElementById("imagecontainer");
  console.log(imagecontainer);
  var container = document.getElementById("image");
  if(!imagecontainer){
    img.id="imagecontainer";
    div.classList.add("mb-10");
    div.appendChild(img);
    container.insertBefore(div, container.childNodes[0]);
  }
  else{
    img = imagecontainer;
  }
  img.src = URL.createObjectURL(event.target.files[0]);
}