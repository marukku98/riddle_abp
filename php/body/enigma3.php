<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .box {
        background-color: grey;
        position: absolute;
        height: 50px;
        width: 50px;
        border: solid 1px white;
    }

    .box:hover {
        background-color: #afafaf;
    }

    button:active {
        display: nonez;
        background-color: red;
    }

    .sea {
        position: absolute;
        background-size: cover;

        background-image: url("/riddle_abp/assets/img/sea.png");
        height: 550px;
        width: 550px;
    }
</style>

<body>
    <div class="sea">
        <?php
        for ($i=0; $i < 10; $i++) { 
           for ($j=0; $j < 10; $j++) { 
                echo '<button class="box" style="top:'.(50*($i+1)).'px; left:'.(50*($j+1)).'px;"></button>';
           } 
        }
    ?>
    </div>


</body>

</html>