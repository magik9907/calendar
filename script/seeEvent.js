
var eventdesc = document.querySelector(".EventDesc");

var check = function(e){
  if(e.target.classList.contains("event")){
    getCal(e.target.getAttribute("data-id"));
  }
};

var getCal = function (id) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      eventdesc.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "getE.php?id="+id+"&see=true", true);
  xhttp.send();
};

var addEvent = function () {
  var calendar = document.querySelector(".calendar-table");
  calendar.addEventListener("click",check,true);
}
