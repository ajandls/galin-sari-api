<?php include('db.php'); 
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $edit_state= true;
        $rec = mysqli_query($db, "SELECT * FROM data WHERE id = $id");
        $record =mysqli_fetch_array($rec);
        $name = $record['name'];
        $location = $record['location'];
        $vehicle_type = $record['vehicle_type'];
        $vehicle_color = $record['vehicle_color'];
        $plate_number = $record['plate_number'];
        $temperature = $record['temperature'];
        $entry_date = $record['entry_date'];
        $id = $record['id'];
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Galin sari? </title>
        <link rel="stylesheet" type="text/css" href="crud-style.css">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat+Subrayada:wght@700&display=swap" rel="stylesheet">

    <body>
        <main>
            <div class="header-bg">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                    <h1 class="py-4 bg-dark text-light"> Galin sari? </h1>
                        <h2> A Road-Checkpoint Database System </h2>
            </div>
        </main>


        <?php if (isset($_SESSION['msg'])): ?>
            <div class="msg">
                <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                ?>
            </div>

        <?php endif ?>

            <table>
                <thead>
                    <tr>
                        <th> Name </th>
                        <th> Location from </th>
                        <th> Vehicle Type </th>
                        <th> Vehicle Color </th>
                        <th> Plate number </th>
                        <th> Temperature </th>
                        <th> Entry date 
                             (YYYY/M/D)
                        </th>
                        <th colspan="2"> Action </th>
                <tbody>
                    <?php while($row=mysqli_fetch_array($results)){ ?>
                    
                    <tr> 
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['vehicle_type']; ?></td>
                        <td><?php echo $row['vehicle_color']; ?></td>
                        <td><?php echo $row['plate_number']; ?></td>
                        <td><?php echo $row['temperature']; ?></td>
                        <td><?php echo $row['entry_date']; ?><td>
                        <td>
                            <a class="edit_btn" href="final-midterm.php?edit=<?php echo $row['id']; ?>">Edit</a>
                        </td>
                        <td>
                            <a class="del_btn" href="final-midterm.php?del=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>

                   <?php } ?>

                </tbody>                    
                    </tr>
                </thead>
            </table>
                <form action="db.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="input-group">
                        <label> Name </label>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </div>

                    <div class="input-group">
                        <label> Location from </label>
                        <input type="text" name="location" value="<?php echo $location; ?>">
                    </div>

                    <div class="input-group">
                        <label> Vehicle Type </label>
                        <input type="text" name="vehicle type" value="<?php echo $vehicle_type ?>">
                    </div>

                    <div class="input-group">
                        <label> Vehicle Color </label>
                        <input type="text" name="vehicle color" value="<?php echo $vehicle_color ?>">
                    </div>

                    <div class="input-group">
                        <label> Plate Number </label>
                        <input type="text" name="plate number" value="<?php echo $plate_number ?>">
                    </div>

                    <div class="input-group">
                        <label> Temperature </label>
                        <input type="text" name="temperature" value="<?php echo $temperature ?>">
                    </div>

                    <div class="input-group">
                        <label> Entry date (YYYY/M/D)</label>
                        <input type="text" name="entry date" value="<?php echo $entry_date ?>">
                    </div>

                    <div class="input-group">
                            <?php if ($edit_state == false): ?>
                                <button type="submit" name="save" class="btn"><b>SAVE</b></button>
                            <?php else: ?>
                                <button type="submit" name="update" class="btn"><b>UPDATE</b></button>
                            <?php endif ?>
        
                    </div>
                </form>
        </body>
    </head>
</html>