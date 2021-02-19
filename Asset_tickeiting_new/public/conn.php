
<?php
error_reporting(E_ERROR | E_PARSE);
$host = "localhost";
$username = "root";
$password = "";
$dbname = "asset_ticketing";
try
{
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
die(var_dump($e));
$message = 'database is not connected';
}
?>

