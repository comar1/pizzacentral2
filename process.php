<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'pc2' ) or die(mysqli_error($mysqli));

$id = 0;
$name = 'test';
$picture = '';
$price = 0;
$total = 0;
$random = "Test display";
$cart_total = 0;
$order_total = 0;

$amount = 0;
$order_no = 0;

$update = false;
$show = false;
$show_receipt = false;

$location = '';


//add
if (isset($_POST['save'])){

  $name = $_POST['name'];
  $location = $_POST['location'];

  $mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or die($mysqli->error);

  $_SESSION['message'] = "record has been saved";
  $_SESSION['msg_type'] = "success";

  header("location: cart.php");
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
  $inc = 1;

  $result = $mysqli->query("SELECT * FROM bianos WHERE id=$id") or die($mysqli->error);


  if (count($result)==1){ //checks for record
    $row = $result->fetch_array(); //gets record

    $name = $row['name'];
    $picture = $row['picture'];
    $amount = $row['amount'];
    $price = $row['price'];
    $total = $row['price'] * $row['amount'];
    }

    $mysqli->query("INSERT INTO cart (name, picture, amount, price, total) VALUES('$name', '$picture','$amount', '$price', '$total') ") or die($mysqli->error);


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
    $amount = $row['amount'];
    $price = $row['price'];
    $total = $row['price'] * $row['amount'];
    }


$mysqli->query("INSERT INTO cart (name, picture, amount, price, total) VALUES('$name', '$picture','$amount', '$price', '$total') ") or die($mysqli->error);

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
  $amount = $row['amount'];
  $price = $row['price'];
  $total = $row['price'] * $row['amount'];
  }


$mysqli->query("INSERT INTO cart (name, picture, amount, price, total) VALUES('$name', '$picture','$amount', '$price', '$total') ") or die($mysqli->error);

$_SESSION['message'] = "RECORD has been updated";
$_SESSION['msg_type'] = "warning";
header('location: caesars.php');

}




//Setamount to Cart
if (isset($_GET['setamount'])){
  $id = $_GET['setamount'];
  $update = true;

  if( $row['id'] = $id){
    $show = true;
  }

}


if (isset($_POST['changeamount'])){
  $id = $_POST['id'];
  $amount = $_POST['amount'];
  $update = true;

  $mysqli->query("UPDATE cart SET amount='$amount' WHERE id=$id ") or die($mysqli->error);

  $result = $mysqli->query("SELECT * FROM cart WHERE id=$id") or die($mysqli->error);
    if (count($result)==1){
      $row = $result->fetch_array();

      $sum = $row['price'] * $amount;
      }

  $mysqli->query("UPDATE cart SET total='$sum' WHERE id=$id") or die($mysqli->error);

  $_SESSION['message'] = "amount added";
  $_SESSION['msg_type'] = "warning";
  header('location: cart.php');
}

//sum of Cart
$result = $mysqli->query("SELECT SUM(total) AS value_sum FROM cart");
$row = mysqli_fetch_assoc($result);
$cart_total = $row['value_sum'];

$result = $mysqli->query("SELECT SUM(total) AS value_sum FROM orders");
$row = mysqli_fetch_assoc($result);
$order_total = $row['value_sum'];

//RECEIPT

if (isset($_GET['addtoorders'])){
  $id = $_GET['addtoorders'];

  $show_receipt = true;

  $mysqli->query("DELETE FROM orders") or die($mysqli->error);
  $result1 = $mysqli->query("SELECT * FROM cart") or die($mysqli->error);

    if (count($result1)==1){
      while ($row = $result1->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $amount = $row['amount'];
        $price = $row['price'];
        $total = $row['total'];

        $mysqli->query("INSERT INTO orders (name, amount, price, total) VALUES('$name','$amount', '$price', '$total') ") or die($mysqli->error);
      }
  }

$mysqli->query("DELETE FROM cart") or die($mysqli->error);

  $_SESSION['message'] = "Added to orders";
  $_SESSION['msg_type'] = "warning";
  header('location: orders.php');

}

//to remove all items from order and go back to index
if(isset($_GET['clear'])){

  $mysqli->query("DELETE FROM orders") or die($mysqli->error);

  $_SESSION['message'] = "Thank you for ordering at pizza central 2";
  $_SESSION['msg_type'] = "success";
  header('location: index.php');
}
