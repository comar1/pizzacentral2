<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'pc2' ) or die(mysqli_error($mysqli));

$id = 0;
$name = '';
$picture = '';
$price = 0;

$update = false;

$location = '';



//add
if (isset($_POST['save'])){

  $name = $_POST['name'];
  $location = $_POST['location'];

  $mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or die($mysqli->error);

  $_SESSION['message'] = "record has been saved";
  $_SESSION['msg_type'] = "success";

  header("location: bianos.php");
}

//delete
if (isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM cart WHERE id=$id") or die($mysqli->error());

  $_SESSION['message'] = "record has been deleted";
  $_SESSION['msg_type'] = "danger";

  header("location: cart.php");
}

//update

if (isset($_GET['edit'])){
  $id = $_GET['edit'];
  $update = true;

  $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error);
if (count($result)==1){
  $row = $result->fetch_array();
  $name = $row['name'];
  $location = $row['location'];
  }
}

if (isset($_POST['update'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $location = $_POST['location'];

  $mysqli->query("UPDATE data SET  name='$name', location = '$location' WHERE id=$id ") or die($mysqli->error);

  $_SESSION['message'] = "RECORD has been updated";
  $_SESSION['msg_type'] = "warning";
  header('location: bianos.php');
}

//bianos to cart

if (isset($_GET['addtobianos'])){
  $id = $_GET['addtobianos'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM bianos WHERE id=$id") or die($mysqli->error);
if (count($result)==1){
  $row = $result->fetch_array();

  $name = $row['name'];
  $picture = $row['picture'];
  $price = $row['price'];
  }


$mysqli->query("INSERT INTO cart (name, picture, price) VALUES('$name', '$picture', '$price') ") or die($mysqli->error);

$_SESSION['message'] = "RECORD has been updated";
$_SESSION['msg_type'] = "warning";
header('location: bianos.php');

}

//shakeys to cart

if (isset($_GET['addtoshakeys'])){
  $id = $_GET['addtoshakeys'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM shakeys WHERE id=$id") or die($mysqli->error);
if (count($result)==1){
  $row = $result->fetch_array();

  $name = $row['name'];
  $picture = $row['picture'];
  $price = $row['price'];
  }


$mysqli->query("INSERT INTO cart (name, picture, price) VALUES('$name', '$picture', '$price') ") or die($mysqli->error);

$_SESSION['message'] = "RECORD has been updated";
$_SESSION['msg_type'] = "warning";
header('location: shakeys.php');

}

//caesars to cart

if (isset($_GET['addtocaesars'])){
  $id = $_GET['addtocaesars'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM caesars WHERE id=$id") or die($mysqli->error);
if (count($result)==1){
  $row = $result->fetch_array();

  $name = $row['name'];
  $picture = $row['picture'];
  $price = $row['price'];
  }


$mysqli->query("INSERT INTO cart (name, picture, price) VALUES('$name', '$picture', '$price') ") or die($mysqli->error);

$_SESSION['message'] = "RECORD has been updated";
$_SESSION['msg_type'] = "warning";
header('location: caesars.php');

}
?>
