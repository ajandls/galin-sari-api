<?php
    session_start();

    $name = " ";
    $location = " ";
    $vehicle_type = " ";
    $vehicle_color = " ";
    $plate_number = " ";
    $temperature = " ";
    $entry_date = " ";
    $id = 0;
    $edit_state = false;

    //connect
    $db = mysqli_connect("localhost", "root", "", "crud-final");
    if($db){
        echo "Connected Successfully!";
    } else {
        echo "Connection Failed.";  
    }


    //save button
    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $location = $_POST['location'];
        $vehicle_type = $_POST ['vehicle_type'];
        $vehicle_color = $_POST ['vehicle_color'];
        $plate_number = $_POST ['plate_number'];
        $temperature = $_POST ['temperature'];
        $entry_date = $_POST ['entry_date'];

        $query = "INSERT INTO data(name, location, vehicle_type, vehicle_color, plate_number, temperature, entry_date) VALUES('$name', '$location', '$vehicle_type', '$vehicle_color', '$plate_number', '$temperature', '$entry_date')";
        mysqli_query($db, $query);
        $_SESSION['msg'] = "Record added!";
        header('location: final-midterm.php');
    }

    //update
    if(isset($_POST['update'])){
        $name = mysqli_real_escape_string($_POST['name']);
        $location = mysqli_real_escape_string($_POST['location']);
        $vehicle_type = mysqli_real_escape_string($_POST['vehicle_type']);
        $vehicle_color = mysqli_real_escape_string($_POST['vehicle_color']);
        $plate_number = mysqli_real_escape_string($_POST['plate_number']);
        $temperature = mysqli_real_escape_string($_POST['temperature']);
        $entry_date = mysqli_real_escape_string($_POST['entry_date']);
        $id = mysqli_real_escape_string($_POST['id']);

        mysqli_query($db, "UPDATE data SET name='$name', location='$location', vehicle_type='$vehicle_type', vehicle_color='$vehicle_color', plate_number='$plate_number', temperature='$temperature', entry_date='$entry_date' WHERE id=$id");
        $_SESSION['msg']="Record updated!";
        header('location: final-midterm.php');
    }

    //delete
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM data WHERE id=$id");
        $_SESSION['msg']="Record deleted!";
        header('location: final-midterm.php');
    }

    //retrieve

    $results = mysqli_query($db, "SELECT * FROM data");
?>