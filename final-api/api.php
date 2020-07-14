<?php 
    $connect = mysqli_connect("localhost", "root", "", "crud-final");   
    $query = mysqli_query($connect, "SELECT * FROM data");

    $name = [];
    $location = [];
    $vehicle_type = [];
    $vehicle_color = [];
    $plate_number = [];
    $temperature = [];
    $entry_date = [];

    if($query) {
        $records = [];
        while($record = mysqli_fetch_assoc($query)){
            $records[] = $record;
        }
    }

    echo  json_encode($records);
?>