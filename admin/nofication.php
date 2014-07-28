<script>
if (window.webkitNotifications){
 
function requestingPopupPermission(callback){
  window.webkitNotifications.requestPermission(callback);
}
 
function showPopup(){
  if(window.webkitNotifications.checkPermission() > 0){
   requestingPopupPermission(showPopup);
}
else{
var thumb = 'http://athousandnodes.com/logo.png';
var title = 'Test Notification';
var body = 'Test Notification body. Test Notification body. Test Notification body. Test Notification body. ';
 
  
        var popup = window.webkitNotifications.createNotification(thumb, title, body);
 
        //Show the popup
        popup.show();
 
        //set timeout to hide it
        setTimeout(function(){
        popup.cancel();
        }, '10000');
 
}
}
 
 }
else{
alert('Desktop Notification is not supported by browser');
}
</script>
<button onClick='showPopup()'>Notify</button>