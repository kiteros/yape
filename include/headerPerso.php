<style>

.container, .main {
    width: 640px;
    margin-left: auto;
    margin-right: auto;
    height: 50px;
}


input {
    font-family: 'HelveticaNeue', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-size: 13px;
    color: #555860;
}

.search {
    position: relative;
    margin: 0 auto;
    width: 700px;
}

.search input {
    height: 50px;
    width: 100%;
    padding: 0 24px 0 25px;
    background: white url("http://cssdeck.com/uploads/media/items/5/5JuDgOa.png") 10px 18px no-repeat;
    border-width: 1px;
    border-style: solid;
    border-color: #a8acbc #babdcc #c0c3d2;
    border-radius: 26px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -o-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
    -moz-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
    -ms-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
    -o-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
    box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
}

.search input:focus {
    outline: none;
    border-color: #66b1ee;
    -webkit-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
    -moz-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
    -ms-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
    -o-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
    box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
}

.search input:focus + .results { display: block }

:-moz-placeholder {
    color: #a7aabc;
    font-weight: 200;
}

::-webkit-input-placeholder {
    color: #a7aabc;
    font-weight: 200;
}

</style>



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
