<?php
$str = "La Plateforme";
$str2 = "Vive";
$str3 = "!";
$val = "6";
$myBool = "true";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>
        <?php echo $str . ' ' . $str2 . $str3;?>
    <h2>
        <p><?php echo $val;?><p>
       
       <?php $val = ($val+4);
       echo $val;?>
       
       <p><?php echo $myBool;?><p>
       <?php echo '<p>' . $myBool . '</p>' ;?>

       <?php $myBool = "false";?>
       <p><?php echo $myBool;?><p>

</body>
</html>