<div class="input-group">
                <input type="text" name="search_firm" id="search" class="form-control" style="width: 200px !important;float: right !important;"/>
            </div>
            <p id="finalResult"></p>
  <script>
   var base_url = "<?=base_url()?>";
 </script>
<script>
$('.signinform').submit(function() {
   $(this).ajaxSubmit({
       type : "POST",
       //set the data type
       dataType:'json',
       url: 'index.php/user/signin', // target element(s) to be updated with server response
       cache : false,
       //check this in Firefox browser
       success : function(response){ console.log(response); alert(response)},
       error: onFailRegistered
   });
   return false;
}); 
</script>
