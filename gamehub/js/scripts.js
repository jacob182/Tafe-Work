window.onload = function() {
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("imageSlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 3000);
}
};

function edit_password() {
  var toggler = document.getElementById('edit-password');
  if(toggler.style.display == 'block') {
    document.getElementById('editPasswordbtn').innerHTML="Edit Password";
    toggler.style.display="none";
  } else {
    toggler.style.display="block";
    document.getElementById('editPasswordbtn').innerHTML="Hide";
  }

  return false;

}
