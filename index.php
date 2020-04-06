<a href="?key=1&key2=про">Тест1</a><br />
<a href="?key=2&key2=тест">Тест2</a>

<!--<form action="/">-->
<!--    <input type="text" name="userForm[login]">-->
<!--    <input type="text" name="userForm[password]">-->
<!--    <input type="checkbox" name="test[]" value="1">-->
<!--    <input type="checkbox" name="test[]" value="2">-->
<!--    <input type="checkbox" name="test[]" value="3">-->
<!--    <input type="submit">-->
<!--</form>-->

<form action="/" method="post">
    <input type="text" name="userForm[login]">
    <input type="text" name="userForm[password]">
    <input type="checkbox" name="test[]" value="1">
    <input type="checkbox" name="test[]" value="2">
    <input type="checkbox" name="test[]" value="3">
    <input type="submit">
</form>

<?php

    var_dump($_POST);