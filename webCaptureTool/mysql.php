<?php
//Connect To Database
$hostname='113.101.88.97.ukld.db.5513497.hostedresource.com';
$username='root';
$password='shl2016';
$dbname='systemhealthlab';
$usertable='users';
$yourfield = 'id';

mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);

$query = 'SELECT * FROM ' . $usertable;
$result = mysql_query($query);
if($result) {
    while($row = mysql_fetch_array($result)){
        print $name = $row[$yourfield];
        echo 'Name ' . $name;
    }
}
else {
print Database NOT Found ;
mysql_close($db_handle);
}
?>