<?php
session_start();
echo "<form method='POST'>";
echo "Enter the String :<br>";
echo "<input type='text' name='txt'>";
echo "<br> <br>";
echo "Enter the starting index <br>";
echo "<input type='number' name='start'>";
echo "<br> <br>";
echo "Enter the length of substring <br>";
echo "<input type='number' name='len'>";
echo "<br> <br> <br>";
echo "<input type='submit' name='submit' value='Find Substring' >";

if(isset($_POST["submit"]))
{
    $str = $_POST['txt'];
    $s =$_POST['start'];
    $len =$_POST['len'];
    $substr = substr($str,$s,$len);
    echo "<br> <br>The Substring is : ".$substr;
}
?>