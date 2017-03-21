<?php 
    session_start();
    $catId = $_GET["catId"];
    $jsondata = file_get_contents("serviceDesc.json");
    $json = json_decode($jsondata,true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DEXTER</title>
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
        .back-button{
            padding: 30px;
            position: absolute;
            background-color: #555555;
            left: 0;
            top: 0;
            cursor:pointer;
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
        }
        .side-menu-filter{
            height: 350px;
            width: 100px;
            right: 0;
            background-color: #555555;
            position: fixed;
        }

        .service-desc-row{
            padding: 50px 100px;
        }

    </style>
</head>
<body>
<div class="container">
    <header class="top-header">
        <div class="centre-container">
            <h1><?php echo $json[$catId]['name']; ?></h1>
        </div>
        <div class="right-container">
            <a href="#">HELLO &nbsp;<?php echo $_SESSION['username']; ?></a>
            <a href="#" onclick="window.location.href='../index.php'">Logout</a>
            <a href="#">Trouble Using Portal?</a>
        </div>
    </header>
    <div class="back-button"  onclick="window.location.href='singleService.php?catId=<?php echo $json[$catId]['mainCat']; ?>'">
        <img src="../img/left-arrow.png">
    </div>
    <div class="main-container">
        <?php 
             foreach ($json[$catId]['desc'] as $val) {
        ?>
        <div class="row service-desc-row">
            <div class="col-sm-6">
                <?php echo $val["name"] ?>   :
            </div>
            <div class="col-sm-6">
                <ul>
                    <?php 
                        foreach ($val['details'] as $value) {
                    ?>
                    <li><?php echo $value ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script !src="">
    $(document).ready(function() {
    });
</script>
</body>
</html>
