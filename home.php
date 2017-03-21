<?php 
$jsondata = file_get_contents("homeCatagory.json");

$json = json_decode($jsondata,true);
                ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DEXTER</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <link rel="manifest" href="manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <style>
        .top-header{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: flex-end;
            align-items: stretch;
            align-content: stretch;
            padding: 10px 0;
        }
        .right-container a{
            text-decoration: none;
            color: #222222;
            padding: 0 15px;
        }
        .main-container {
            height: 90vh;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
            align-content: space-around;
        }

        .row {
            height: 20vh;
            width: 100%;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: stretch;
            align-content: stretch;
        }

        .tab-squares {
            width: 40vh;
            border: 1px solid #f0f0f0;
            background-color: #cccccc;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
        }
        .centre-container{
            padding-right: 30%;
        }
        .item.list-group-item img
        {
            float: left;
        }
        .tab-squares {
            height: 100%;
            padding: 50px 0;
            border: 1px solid #f0f0f0;
            background-color: #cccccc;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            cursor: pointer;
        }
    </style>
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->
<div class="container">
    <header class="top-header">
        <div class="right-container">
            <a href="#">Logout</a>
            <a href="#">Trouble Using Portal?</a>
        </div>
    </header>
    <main class="main-container">
        <div id="products" class="row list-group">
            <?php 
                    for( $i = 0; $i<sizeof($json); $i++ ) {
                ?>
            <div class="item  col-xs-4 col-lg-4">
                <div class="tab-squares" onclick="window.location.href = '?mainCat=<?php echo $json[$i]['id'] ?>'">
                    <span><?php echo $json[$i]['name'] ?></span>
                </div>
            </div>
            <?php 
            }
             ?>
        </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.2.0.min.js"
        integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.0.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script !src="">
    $(document).ready(function() {
    });
</script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function () {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview')
</script>

<script !src="">
    window.onload = function() {
        getLocation();
    };
    function getLocation() {
        var geolocation = navigator.geolocation;
        geolocation.getCurrentPosition(showLocation, errorHandler, {maximumAge: 75000});
    }
    function showLocation( position ) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        console.log(latitude+"       "+longitude);
        var latlng = new google.maps.LatLng(latitude, longitude);
        geocoder = new google.maps.Geocoder();

        geocoder.geocode({'latLng': latlng}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    for (j = 0; j < results[0].address_components.length; j++) {
                        if (results[0].address_components[j].types[0] == 'postal_code')
                            alert("Zip Code: " + results[0].address_components[j].short_name);
                    }
                }
            } else {
                alert("Geocoder failed due to: " + status);
            }
        });
    }
    function errorHandler( err ) {
        if (err.code == 1) {
            // access is denied
        }
    }
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>
