<?php
//Connect To Database
$hostname='http://systemhealthlab.ddns.net:3306';
$username='root';
$password='shl2016';
$dbname='systemhealthlab';
$usertable='users';
$yourfield = 'id';

$link = mysqli_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysqli_select_db($dbname);

//$query = 'SELECT * FROM ' . $usertable;
$query = 'SHOW DATABASES';
$result = mysqli_query($query);

if($result) {
    while($row = mysqli_fetch_array($result)){
        print $name = $row[$yourfield];
        echo 'Name ' . $name;
    }
}
else {
echo "Database NOT Found";
mysqli_close($link);
}
?>