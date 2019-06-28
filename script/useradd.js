(function() {

  var getData = function () {
    var id = document.querySelector("form .user").value;
    var n = document.querySelector("form .name");
    var p = document.querySelector("form .pass");
    var a = document.querySelector("form .a-a");
    var n = document.querySelector("form .a-n");
    if(id == false){
      document.querySelector("form .name").value="";
      p.value="";
      a.checked=false;
      n.checked=false;
      document.querySelector("form button").value = "";
      document.querySelector("form button").setAttribute("class","dodaj");
      document.querySelector("form button").innerHTML ="dodaj";
    }
    else{
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.querySelector("form .us-form").innerHTML = this.responseText;
          document.querySelector("form button").setAttribute("class","modyfikuj");
          document.querySelector("form button").innerHTML ="modyfikuj";
        }
      };
      console.log(id);
      xhttp.open("GET", "useradd.php?id="+id, true);
      xhttp.send();
    }
  };

document.querySelector("form .user").addEventListener("change",getData,true);


})();
