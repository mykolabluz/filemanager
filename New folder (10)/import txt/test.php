<?php


$conn = new mysqli('localhost','root','','films');
$path = $_FILES['im']['tmp_name'];
if(!empty($path)) {
$file = fopen($path, "r");

while (!feof($file)) {
    
    $content = fgets($file);
    $carray = explode(",", $content);
    list($name,$age,$city) = $carray;
//    echo '<pre>';
//    print_r($carray);
//    echo '<pre>';
    $sql = "INSERT INTO `test` (`name`, `age`, `city`) VALUES ('$name', '$age', '$city')";
    $conn->query($sql);

}
fclose($file);
}
?>

<form name="upload" method="post" action="test.php" enctype="multipart/form-data">
    <p>
        <input type="file" name="im" />
    </p>
    <p>
        <input type="submit" value="Отправить" />
    </p>
</form>
