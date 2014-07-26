<html>

<script type="text/javascript">
setInterval(ajax, 10000);
			
			function ajax(){
				
				var ajax;
				if (window.XMLHttpRequest){
 				
  					ajax = new XMLHttpRequest();
  				} else if (window.ActiveXObject) {
 					
 					ajax = new ActiveXObject("Microsoft.XMLHTTP");
 				} else {
 					
  					alert("Your browser.");
 				}

				
				ajax.onreadystatechange=function(){
					
					if(ajax.readyState==4){
						
  						document.getElementById('ReloadThis').innerHTML = ajax.responseText;
 					}
				}	
				ajax.open("GET", "menu.php", true);
				ajax.send(null);
			}
</script>
<body onload="ajax();">

<div id="ReloadThis">
    
</div>




</body>
</html>
