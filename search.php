<?php
// Uses https://github.com/joshcam/PHP-MySQLi-Database-Class
// in order to simplify amount of database code needed
include('database.class.php');

$db = new MysqliDb('localhost', 'db_user', 'db_password', 'employees');

$search = $_GET['search'] ?? '';

if($search) {

	$query = "SELECT id, release_date, name from movies where name = '$search'";

	$results = $db->rawQuery($query);

	echo 'ran query: ' . $db->getLastQuery() . '</br>';

	echo '<b>' . count($results) . ' movies found:</b></br></br>';

	foreach($results as $result) {
		echo 'id: ' . $result['id'] . '</br>';
		echo 'release date: ' . $result['release_date'] . '</br>';
		echo 'name: ' . $result['name'] . '</br></br>';
	}

	die();
}

?>
<form action="" method="GET">
	<input type="text" name="search"/>
	<input type="submit" value="Search"/>
</form>
