<style>
h1{
font-size: 20px;
color: #111;
}
.content{
width: 80%;
margin: 0 auto;
margin-top: 50px;
}


</style>
<script>
    $(document).ready(function() {
       

        $('input#search').typeahead({
            name: 'country',
            remote: 'http://localhost/globalmigration/staff1/bootstrap-autocomplete/country.php?query=%QUERY'

        });

        $('input.allcountry').typeahead({
            name: 'allcountry',
            prefetch: 'http://localhost/bootstrap-autocomplete/allcountry.php'
        });

    })
</script>


<form name="search" action="index.php?name" method="get" autocomplete="off" >
    <input type="text" name="name" class="input-medium search-query country"   placeholder="Search"  id="search" required="required">
    <input type="submit" name="submit" value="Search" class="btn btn-primary"/>
</form>
