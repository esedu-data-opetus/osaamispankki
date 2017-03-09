<div class="input-group">
                <input type="text" name="search_firm" id="search" class="form-control" style="width: 200px !important;float: right !important;"/>
            </div>
            <ul id="finalResult"></ul>
  <script>
   var base_url = "<?=base_url()?>";
 </script>
<script>
$(document).ready(function(){
    $("#search").keyup(function(){
        if($("#search").val().length>3){
            $.ajax({
                type: "post",
                url :  base_url + "firm/searchFirm",
                cache: false,
                data:'search='+$("#search").val(),
                success: function(response){
                    $('#finalResult').html("");
                    var obj = JSON.parse(response);
                    if(obj.length>0){
                        try{
                            var items=[];
                            $.each(obj, function(i,val){
                                items.push($('<li/>').text(val.F_Name + " " + val.L_Name));
                            });
                            $('#finalResult').append.apply($('#finalResult'), items);
                        }catch(e) {
                            alert('Exception while request..');
                        }
                    }else{
                        $('#finalResult').html($('<li/>').text("No Data Found"));
                    }

                },
                error: function(){
                    alert('Error while request..');
                }
            });
        }
        return false;
    });
});
