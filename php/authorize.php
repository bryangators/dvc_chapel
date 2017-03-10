<?php 


// db object from outside public dir tree
include('../../dvc_private/dbObject.php');
$db = new mysqli($servername,$username,$password,$dbname);

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}

//function compares login imputs to database and returns
//boolean value for authorized
function  authorized($username, $password)
{
	$token = hashPass($password);	

	$query = "SELECT * FROM users WHERE username = '$username'";
	global $db;
	$result = $db->query($query);

	if($result->num_rows)
	{
		$row = $result->fetch_array(MYSQLI_NUM);

		$result->close();

		if($token == $row[4]){
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['forename'] = $row[1];
			$_SESSION['surname'] = $row[2];
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

//function used to hash password for new users and comparing password tokens
function hashPass($password)
{
	$salt1 = 'b&8ua';
	$salt2 = 'c&u34';
	$token = hash('ripemd128', "$salt1$password$salt2");
	return $token;
}

//function to create new user with same hashing algorithm used in authentication
function createUser($first, $last, $username, $password){

	$token = hashPass($password);

	$query = "INSERT INTO users	VALUES
			(null, '$first', '$last', '$username', '$token')";
	
	global $db;
	$db->query($query);		
}


//function to destroy user session
// function destroy_session()
// {
// 	session_start();
// 	$_SESSION = array();
// 	session_destroy();
// }

mysqli_close( $db );
//createUser("Joshua", "Shapiro", "deltonaVadmin", "JesusL@ve$");
?>