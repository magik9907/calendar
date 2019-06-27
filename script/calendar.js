(function() {

  var getCal = function () {
    var radio=document.querySelectorAll(".type");
    for (let i = 0,l=radio.length; i < l; i++) {
      if (radio[i].checked===true) {
        var type = radio[i].value;
      }
    }
    var id = document.querySelector(".user-list").value;
    var value = monthIndex.value;
    var year = yearInput.value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.kalendarz').innerHTML = this.responseText;
        addEvent();
      }
    };

    xhttp.open("GET", "genCal.php?month="+value+"&type="+type+"&year="+year+"&id="+id, true);
    xhttp.send();
  };

var date =  new Date();
var month = date.getMonth()+1;
var year = date.getFullYear();
if (month<10){month = "0" + month;}
var options = document.querySelectorAll(".month option");
for (let i = 0, l = options.length; i < l; i++) {
  if(options[i].value == month){
    options[i].selected = true;
  }
}

var yearInput = document.querySelector(".year");
yearInput.setAttribute("value", year);

var monthIndex = document.querySelector('.month');
var type="calendar";
monthIndex.addEventListener("change" , getCal,true);
yearInput.addEventListener("input" , getCal,true);
var radio=document.querySelectorAll(".type");
for (let i = 0,l=radio.length; i < l; i++) {
  radio[i].addEventListener("change" , getCal,true);
}
document.querySelector('.user-list').addEventListener("change" , getCal,true);;
window.onload=getCal;


})();
