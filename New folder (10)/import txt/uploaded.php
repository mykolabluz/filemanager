<?php
echo '<pre>';
print_r($_FILES['im']['tmp_name']);
echo '<pre>';

?>

<form name="upload" method="post" action="uploaded.php" enctype="multipart/form-data">
    <p>
        <input type="file" name="im" />
    </p>
    <p>
        <input type="submit" value="Отправить" />
    </p>
</form>
