<?php
require_once 'login.php';
$conn = new mysqli($hn,$un,$pw,$db);
if ($conn -> connect_error) die("Fatal Error");
$query = "SELECT * FROM classics";
$result = $conn -> query($query);
if ($result) die ("Fatal Error");
$rows = $result->num_rows;
for ($j = 0 ; $j < $rows;$j++){
    $rows = $result->fetch_array(MYSQLI_ASSOC);
    echo 'Author: ' .$rows['author'] .'<br>';
    echo 'Title: ' .$rows['title'] .'<br>';
    echo 'Category: ' .$rows['category '] .'<br>';
    echo 'Year: ' .$rows['year'] .'<br>';
    echo 'Isbn: ' .$rows['isbn'] .'<br>';

    $result -> close();
    $conn -> close();

}
?>
