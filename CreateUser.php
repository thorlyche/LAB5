<?php
$q1 = $_POST['username'];

if($q1==""){
  echo "YOU MUST INSERT A USERNAME<br>";
  header( "refresh:2; url=https://people.eecs.ku.edu/~t695l633/LAB5/CreateUser.html" );
}
else{
  /* gain access to mysqli */
  $mysqli = new mysqli("mysql.eecs.ku.edu", "t695l633", "ae4aaKi3", "t695l633");

  /* check connection */
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  $query = "INSERT INTO Users(user_id) VALUES ('$q1')";

  if($mysqli->query($query)){
    echo "Your username has been created";
    header( "refresh:2; url=https://people.eecs.ku.edu/~t695l633/LAB5/CreateUser.html" );
  }
  else{
    echo "Your username is not unique, please try again";
    header( "refresh:2; url=https://people.eecs.ku.edu/~t695l633/LAB5/CreateUser.html" );
  }
  $mysqli->close();
}

?>
