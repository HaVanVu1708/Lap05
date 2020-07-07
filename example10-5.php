<?php
require_once  'login.php';
$conn = new mysqli($hn,$un,$pw,$db);
if ($conn -> connect_error) die("Fatal Error");
if (isset($_POST['delete']) && isset($_POST['isbn'])){}

if (isset($_POST['author'])  && isset($_POST['title']) &&
    isset($_POST['category'])  && isset($_POST['year']) &&
     isset($_POST['isbn'])){}

echo <<<_END
<form action="example10-5.php" method ="post"><pre>
Author <input type = "text" name = "author"> 
Title <input type = "text" name = "title"> 
Category <input type = "text" name = "category"> 
Year <input type = "text" name = "year"> 
ISBN <input type = "text" name = "isbn"> 
<input type="submit" value="ADD RECORD">
</pre></porm>
_END;

$query = "SELECT * FROM classics";
$result = $conn -> query($query);

if (!$result) die ("Database access failed");
$rows = $result->num_rows;
for ($j = 0;$j < $rows;++$j){
    $rows = $result->fetch_array(MYSQLI_NUM);
    $r0 = $rows[0];
    $r1 = $rows[1];
    $r2 = $rows[2];
    $r3 = $rows[3];
    $r4 = $rows[4];

    echo <<<_END
<pre>
Athour $r0
Title $r1
Category $r2
Year $r3
ISBN $r4
</pre>
<form action='example10-5.php' method='post'>
<input type='hidden' name='delete' value='yes'>
<input type='hidden' name='isbn' value='$r4'>
<input type='submit' value='DELETE RECORD'>
</form>
_END;
    $result -> close();

}



?>