<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mask Validation</title>
</head>
<body>
    
    <?php
    $mask = "255.255.255.128";
    $n = 2;
    $secret = 1234;
    $signature = hash("SHA256", $n . $secret);

    if (isset($_GET["format"])&&$_GET["format"]=="xml") {
        $url = "http://localhost/php/masky.php?n=$n&s=$signature&m=$mask&format=xml";
    } else {
        $url = "http://localhost/php/masky.php?n=$n&s=$signature&m=$mask";
    }

    echo "mask: " . $mask . "<br />";
    echo "url: " . $url ." <br />";
    echo "response:<pre><textarea> " . file_get_contents($url)."</textarea></pre>";
    
    ?>

</body>
</html>