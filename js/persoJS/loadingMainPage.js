//document.getElementById("hints_float").style.visibility = 'hidden';
var isLoading = false;
function ontouch(str){
  if(!isLoading){

    $('#hints_float').empty();
    $('#hints_float').append('<div style=\"display: inline-block;\" id=\"loading2\"></div><div id="back"></div>');
    isLoading = true;
    $('#loading2').append('<div id="loading"><img width="30px" height="30px" src="img/Loading_icon.gif" /></div><div id="back"></div>');

  }
  var element = document.getElementById("hints_float");
    if (str.length == 0) {


      $("#loading").remove();
      isLoading = false;
      $("#back").empty();
      $("#back").show();
      return;
    } else {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              $("#loading").remove();
              isLoading = false;
              $("#back").empty();
              $("#back").show();

              var x = 0;
              var myOBJson = JSON.parse(this.responseText);
              var nbPeople = myOBJson.results;

              $('#back').append('<div class="whiteSeparator">Books</div>');
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

                $("#back").append('<a href="../perso/addBook.php?stay=ok&link=' + linkText + '">' + titleText + '<br/><span style="color:#6d1c07;">' + authorText + '</span></a>');
                $("#back").append('<br/>');
                x++;

              }
              $('#back').append('<div class="whiteSeparator">People</div>');

              x = 0;

              if(nbPeople >= 4){
                nbPeople = 4;
              }
              while(x < nbPeople){

                var idPeople = myOBJson.people[x].id;
                var namePeople = myOBJson.people[x].firstName;

                $("#back").append('<a href="../perso/myFeed.php?id="' + idPeople + '>' + namePeople + '</a>');
                $("#back").append('<br/>');
                x++;

              }
            }
        };
        xmlhttp.open("GET", "../actions/liveSearchAll.php?q=" + str, true);
        xmlhttp.send();
    }
}
