<?php
// $db = new PDO('mysql:host=localhost;dbname=club;charset=utf8', 'root', '');

function getDatabase() {
  return new PDO('mysql:host=localhost;dbname=club;charset=utf8', 'root', '');
}
?>