var isLoading = false;
$('#res').hide();

function ontouch(str){

  if(!isLoading){
    $('#res').show();
    $('#res').empty();
    isLoading = true;
    $('#res').append('<li id="loading"><center><img width="30px" height="30px" src="../images/Loading_icon.gif" /></center></li>');

  }

  if (str.length == 0) {
    $('#res').hide();
    $('#res').empty();
    $("#loading").remove();
    isLoading = false;
    //isBlocked = true;
    //return;


  }else{

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {
          $('#res').show();
          $("#loading").remove();
          isLoading = false;
          $('#res').empty();
          var x = 0;

          var myOBJson = JSON.parse(this.responseText);
          var nbPeople = myOBJson.results;

          //$('#res').append('<li><a href="index.html">Search Result #1<br /><span>Description...</span></a></li>');
          while(x < 4){

              var titleText = myOBJson.bookResult[x].title;
              var authorText = myOBJson.bookResult[x].author;
              var linkText = myOBJson.bookResult[x].link;
              var thumbSrc = myOBJson.bookResult[x].thumb;


              if(authorText == null){
                authorText = 'unknown';
              }
              if(titleText == null){
                titleText = 'unknown';
              }

              $('#res').append('<li><a href="../perso/addBook.php?link=' + linkText + '">' + titleText + '<br/><span>' + authorText + '</span></a></li>');
              //$("#hints_float2").append('<a href="../perso/addBook.php?link=' + linkText + '">' + titleText + '<br/><span style="color:#ef5f3b;">' + authorText + '</span></a>');
              //$("#hints_float2").append('<br/>');
              x++;

          }

          $('#hints_float2').append('<div class="whiteSeparator">People</div>');

          x = 0;
          if(nbPeople >= 4){
            nbPeople = 4;
          }

          while(x < nbPeople){

            var idPeople = myOBJson.people[x].id;
            var namePeople = myOBJson.people[x].firstName;

            $("#hints_float2").append('<a href="../perso/myFeed.php?id=' + idPeople + '">' + namePeople + '</a>');
            $("#hints_float2").append('<br/>');
            x++;

          }
        }
      };
      xmlhttp.open("GET", "../actions/liveSearchAll.php?q=" + str, true);
      xmlhttp.send();


    }
}
