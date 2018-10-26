<?php
$username = $_POST['username'];
$post = $_POST['post'];

echo "Good work " .$username. " you successfully created a post <br>";

if($post==""){
  echo "You cannot create a blank post<br>";
  header( "refresh:2; url=https://people.eecs.ku.edu/~t695l633/LAB5/CreatePosts.html" );
}
else{
  /* gain access to mysqli */
  $mysqli = new mysqli("mysql.eecs.ku.edu", "t695l633", "ae4aaKi3", "t695l633");

  /* check connection */
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  $checkUsers = "SELECT * FROM Users WHERE user_id='$username'";

  $query = "INSERT INTO Posts(content, author_id) VALUES ('$post', '$username')";

  $result = $mysqli->query($checkUsers);
  $row_count = mysqli_num_rows($result);
  if($row_count==0){
        echo "This user does not exist, please enter a valid username";
        header( "refresh:2; url=https://people.eecs.ku.edu/~t695l633/LAB5/CreatePosts.html" );
  }
  else if($mysqli->query($query)){
    echo "Successful post!";
    header( "refresh:2; url=https://people.eecs.ku.edu/~t695l633/LAB5/CreatePosts.html" );
  }
  $mysqli->close();
}

?>
