<?php

$connect = odbc_connect("Driver={Microsoft Access Driver (*.mdb)};Dbq=C:\Apache24\htdocs\Git\shl-prognostics\dropdown\DataCodes.accdb", "", "");

#query the users table for name and surname
$query = "SELECT * FROM tblEquipClass";



# perform the query
$result = odbc_exec($connect, $query);

echo $result;

$var = odbc_fetch_row($result);

if ($result) {
	echo "Yes";
} else {
	echo "No";
}


# fetch the data from the database
while(odbc_fetch_row($result)){
  $name = odbc_result($result, 1);
  #$surname = odbc_result($result, 2);
  echo $name;
  echo "Hello";
}



# close the connection
odbc_close($connect);

#echo "Hello, is it me you're looking for?";













?>