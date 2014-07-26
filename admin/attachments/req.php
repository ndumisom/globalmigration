<html>
<script>
window.addEvent('domready', function(){

  $('makeRequest').addEvent('click', function(event){
    event.stop();

    new Request.HTML({

      url: '/echo/html/',

      onRequest: function(){
        $('result').set('text', 'loading...');
      },

      onComplete: function(response){
        $('result').empty().adopt(response);
      },

      data: {
        // This is some content that the server will return
        // we pass this only for our demo runner and jsfiddle
        html: '<h3>The Request Was Successful</h3>' +
          '<p>Here is some <em>HTML content</em>.  It\'s pretty neat, isn\'t it?</p>' +
          '<p>It does not have to be a complete page, since the <head> section is already present in the parent page.</p>' +
          '<p>If we had things inside this HTML that needed some MooTools love (the sort of things that go inside the domready event), we would have to call our scripts\' attention to this code manually.</p>'
      }

    }).send();

  });

});
</script>
<style>
#result {
  width: 500px;
  padding: 10px;
  background-color: #F9F9F9;
  border-right: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
}
</style>
<body>
<p>Request.HTML is a subclass of Request built for making XHR requests which return HTML content.</p>
<p><a href="#" id="makeRequest">Get HTML</a></p>
<h2>Result</h2>

<div id="result">Waiting for the request to happen.</div>
</body>
</html>