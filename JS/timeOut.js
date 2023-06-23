
var lapsetime = 120 * 1000; 
var time = setTimeout(destroysession, lapsetime);

document.addEventListener('mousemove', restarTime);
document.addEventListener('keypress', restarTime);

function restarTime() {
  clearTimeout(time);
  time = setTimeout(destroysession, lapsetime);
}
function destroysession() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "./actions/close.php", true);
  xhr.send();

  window.location.href = "login-form.php";
}
