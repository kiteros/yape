<header id="headperso">
  <p></p>

    <div class="smallSearch"><form action="../actions/search.php" method="post">
      <input type="text" name="search" placeholder="Search anything..." class="smallSearch" autocomplete="off" onkeyup="ontouch(this.value)" />

    </form>
    <div id="hints_float">
    </div>

  </div>
  <?php
  if($_SESSION['id'] != ''){
  ?>
  <div id="profilPic">
    <p style="display:inline-block;" class="inProfil2"></p>
    <a class="fancybox" href="#inline1"><img style="display:inline-block;" class="inProfil" width="50px" height="50px" src="<?php echo $_SESSION['profil']; ?>"></a>

    <div class="dropdown" style="display:inline-block;" class="inProfil">
      <button class="dropbtn"><?php echo $_SESSION['fname']; ?></button>
      <div class="dropdown-content">
        <a href="params.php">Parametres</a>
        <a href="../actions/disconnet.php">Déconnecter</a>
      </div>
    </div>

  </div>
  <?php
  }else{
    //Boutton se connecter
    ?>
    <div class="connect">
      <button id="myBtn" class="buttonSignUp" onclick="showSignUp()">Sign Up</button>
      <form action="actions/signin.php" method="post">
        <input type="submit" value="Sign in" class="buttonSignIn"/>
      </form>
    </div>
    <?php
  }
   ?>
</header>
<hr/>


      <script type="text/javascript">
        $(document).ready(function() {
          $(".fancybox").fancybox();
        });
      </script>
<div id="inline1" style="width: 750px; height : 350px;display: none;">
  <h3>Change your profil picture</h3>
  <form action="../actions/changePic.php" class="dropzone" id="my-dropzone" style="width: 750px; height : 350px;"></form>
  <!--crop-->

</div>

<script>
//Crop

</script>


<script>
  Dropzone.autoDiscover = false;
  $(function() {
  var myDropzone = new Dropzone("#my-dropzone");
    myDropzone.on("success", function(file) {
      //location.reload();
      //On supprime la dropzone, et on affiche le croppie
      document.getElementById("inline1").innerHTML = '<div id="demo"><button id="result">Crop</button></div>'
      var basic = $('#demo').croppie({
        viewport: {
            width: 250,
            height: 250,
            type: 'circle'
        },
        boundary: {
            width: 300,
            height: 300
        }
      });
      basic.croppie('bind', {
        url: '../images/profil2/' + file.name.split(".")[0]+'.png',
        points: [77,469,280,739]
      });
      //on button click
      $( "#result" ).click(function() {
        basic.croppie('result', 'base64').then(function(image) {
          //Envoyer image au PHP qui décodera
          var xmlhttp2 = new XMLHttpRequest();
          xmlhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                if(this.responseText == 'sucess'){
                  location.reload();
                  //alert(image);
                }
            }
          };
          var params2 = "image=" + image + "&name=" + file.name.split(".")[0]+'.png';
          xmlhttp2.open("POST", "../actions/changePicCrop.php", true);
          xmlhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xmlhttp2.send(params2);
          //alert(image);
        });
      });
    });
  })

</script>

<script>

var isLoading = false;
function ontouch(str){
  if(!isLoading){

    $('#hints_float').empty();
    $('#hints_float').append('<div style=\"display: inline-block;\" id=\"loading2\"></div>');
    isLoading = true;
    $('#loading2').append('<center id="loading"><div><img width="30px" height="30px" src="../images/Loading_icon.gif" /></div></center>');

  }
  var element = document.getElementById("hints_float");
    if (str.length == 0) {

      element.innerHTML = "<div style=\"display: inline-block;\" id=\"loading2\"></div>";
      element.style.visibility = 'hidden';
      $("#loading").remove();
      isLoading = false;
      return;
    } else {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $("#loading").remove();
            isLoading = false;
            document.getElementById("hints_float").innerHTML = "";
            document.getElementById("hints_float").style.visibility = 'visible';
            var x = 0;
            var res = this.responseText.split("DEP")[0].split("SEP");
            var nbPeople = this.responseText.split("XEP")[1];

            $('#hints_float').append('<div class="whiteSeparator">Books</div>');
            while(x < 4){
              var imageMini = document.createElement("img");
              imageMini.scr = res[3 * x + 2];
              var li2 = document.createElement("a");
              li2.href = "../perso/addBook.php?link=" + res[3 * x + 1];
              var br = document.createElement("br");
              var text2 = document.createTextNode(res[3 * x]);
              li2.appendChild(text2);
              li2.appendChild(imageMini);
              var element2 = document.getElementById("hints_float");
              element2.appendChild(li2);
              element2.appendChild(br);
              x++;
            }
            $('#hints_float').append('<div class="whiteSeparator">People</div>');
            var res2 = this.responseText.split("DEP")[1].split("SEP");
            x = 0;

            if(nbPeople >= 4){
              nbPeople = 4;
            }
            while(x < nbPeople){
              var li3 = document.createElement("a");
              li3.href = "../perso/myFeed.php?id=" + res2[2 * x + 1];
              var br = document.createElement("br");
              var text2 = document.createTextNode(res2[2 * x]);
              li3.appendChild(text2);
              var element2 = document.getElementById("hints_float");
              element2.appendChild(li3);
              element2.appendChild(br);
              x++;
            }
          }
      };
      xmlhttp.open("GET", "../actions/liveSearchAll.php?q=" + str, true);
      xmlhttp.send();


    }
}
</script>
