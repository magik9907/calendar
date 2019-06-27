(function() {
  var addClassesPages=(function(){
    var addClass = function(s){
      mainContent.classList.add(s);
    };

    var mainContent = document.querySelector(".main-content");
    var pathName = location.pathname;
    pathName = pathName.toString();
    var status = pathName.search("index.php");
    if(status != -1){
      addClass("index");
    }
  })();

  var logoutUser = function(){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        window.open(location.href,"_self");
      }
    };

    xhttp.open("POST", location.href+"?logout=true", true);
    xhttp.send();

  };
  var logoutBtn = document.querySelector(".js--logout")
  if( logoutBtn ){
    logoutBtn.addEventListener('click', logoutUser,true);
  }
})();
