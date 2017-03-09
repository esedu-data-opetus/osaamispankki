//valitsee kaikki saman nimiset id:t
//$('[id="id"]')

var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject() {
  var xmlHttp;

  if (window.ActiveXObject) {
    try {
      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch(e) {
      xmlHttp = false;
    }
  } else {
    try {
      xmlHttp = new XMLHttpRequest();
    } catch(e) {
      xmlHttp = false;
    }
  }
  if (!xmlHttp) {
    alert('Problem found!');
  } else {
    return xmlHttp;
  }
}

function process() {
  if (xmlHttp.readyState==0 || xmlHttp.readyState==4) {
    food = encodeURIComponent(document.getElementById("userInput").value);
    xmlHttp.open("GET", "foodstore.php?food=" + food, true);
    xmlHttp.onreadystatechange = handleServerResponse;
    xmlHttp.send(null);
  } else {
    setTimeout('process()',1000);
  }
}

function handleServerResponse() {
  if (xmlHttp.readyState==4) {
    if (xmlHttp.status==200) {
      xmlResponse = xmlHttp.responseXML;
      xmlDocumentElement = xmlResponse.documentElement;
      message = xmlDocumentElement.firstChild.data;
      document.getElementById("underInput").innerHTML = '<span style="color: blue">' + message + '</span>';
      setTimeout('process()',1000);
    } else {
      alert('Found an error D:');
    }
  }
}


function myResize() {
  var w = window.outerWidth;
  var h = window.outerHeight;
  var txt = "Window size: width=" + w + ", height=" + h;
  // if (w <= 480) {
  //   var txt = "Puhlin!";
  // } else {
  //   var txt = "jotain muuta!";
  // }
  document.getElementById("size").innerHTML = txt;
}

function check_user() {
if( document.getElementById("uploadBox").files.length == 0 ){
    document.getElementById("nappi").disabled = true;
} else {
  document.getElementById("nappi").disabled = false;
}
}

function MyAlert() {
  $('#F_MSG').hide();
}

function validateDropdown() {
   var e = document.getElementById("select");
   var strUser = e.options[e.selectedIndex].value;

   console.log(strUser);

     if(strUser == '0')
   {
     document.getElementById('nappi').disabled = true;
   } else {
     document.getElementById('nappi').disabled = false;
   }
 }

 $(function() {
   $('#alkoi').datepick();
   $('#loppui').datepick();
 });
var main = function() {

    $('#luo').click(function() {
        $('.counter').text('50');
        $('#luo').addClass('disabled');
    });
    $('#meta').keyup(function() {
        var postLength = $(this).val().length;
        var charactersLeft = 50 - postLength;
        $('.counter').text(charactersLeft);
        if (charactersLeft < 0) {
            $('#luo').addClass('disabled');
        } else if (charactersLeft == 50) {
            $('#luo').addClass('disabled');
        } else {
            $('#luo').removeClass('disabled');
        }
    });
    $('#luo').addClass('disabled');

    $('#F_MSG').delay(30000).slideUp(500);

};
$(document).ready(main);
