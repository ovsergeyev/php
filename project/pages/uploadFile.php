<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    var_dump($_FILES);
    $fileName = dirname(__DIR__) . '/' . basename($_FILES['my_file']['name']);
    move_uploaded_file($_FILES['my_file']['tmp_name'], $fileName);

    header('Location: ?page=5');
    exit;
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="my_file">
    <input type="submit">
</form>