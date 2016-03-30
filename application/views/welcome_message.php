<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
<head>
	<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
	<!--<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->
	<meta charset="utf-8">
	<title>Etusivu</title>
</head>
<script type="text/javascript">
    $.ajax
    ({
        url: "application/views/kanjis/",
        success: function (data) 
        {
            $(data).find("a:contains('.png'), a:contains('.jpg')").each(function () {
                $("#nextrow").append('<img src="application/views/kanjis/' + $(this).attr("href") + '"width="124" alt="Kuva">');
            });
        }
    });

    setTimeout(function()
    {
        $("img").each(function()
        {
            $(this).draggable();
        });
    }, 500);

</script>
<style type="text/css">
</style>

<body>
<h1 style="text-align:center;font-weight:bold;">Etusivu</h1><br>
<h5 class="col-md-6 col-md-offset-3" style="text-align:center;">Tervetuloa esedun osaamispankkiin täällä voit opetella kanjeja 爰</h5><br><br><br>

</body>
</html>