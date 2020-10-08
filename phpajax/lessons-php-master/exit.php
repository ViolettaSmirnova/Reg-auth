<?php
session_start();
session_destroy();
header("Location: auth.php");
//Такое перенаправление возможно только если страница пуста - нет html кода на ней и нет ни одного echo