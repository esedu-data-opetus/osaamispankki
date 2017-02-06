//valitsee kaikki saman nimiset id:t
//$('[id="id"]')
function check_user() {

if( document.getElementById("uploadBox").files.length == 0 ){
    document.getElementById("nappi").disabled = true;
} else {
  document.getElementById("nappi").disabled = false;
}
}

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
};
$(document).ready(main);
