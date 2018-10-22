<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 03/10/2018
 * Time: 16:39
 */
?>

<html>
<head>
    <title>User list - PDF</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=GOOGLE_MAP_API_KEY&libraries=places®ion=in"></script>
</head>
<body>
<div class="container">
    <form>
        <div class="form-group">
            <label>City<star>*</star></label>
            <input type="text" name="city" placeholder="City" class="form-control" value="{{ old('city') }}" id="city">
        </div>
    </form>
    <script type="text/javascript">
        function initialize() {
            var options = {
                types: ['(cities)'],
                componentRestrictions: {country: "in"}
            };
            var input = document.getElementById('city');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</div>
</body>
</html>
