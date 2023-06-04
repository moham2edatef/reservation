<div class="well">
			<h3>الموقع ammeratef@google.com
				<span class="pull-right">اعجب بنا على : www.facebook.com </span>
			</h3>
		</div>
	</div>
	<script type="text/javascript">
	     function update_item(item) {
            var ajaxRequest;
            try {
                ajaxRequest = new XMLHttpRequest();
            } catch (e) {
                try {
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {

                    try {
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {
                        alert("Your browser broke!");
                        return false;
                    }
                }
            }
            ajaxRequest.onreadystatechange = function() {
                if (ajaxRequest.readyState == 4) {
                    var ajaxDisplay = document.getElementById("users_"+item);
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }
            ajaxRequest.open("get", "journey_update.php?pay="+ item, true);
            ajaxRequest.send();
        }
		</script>
</body>
</html>