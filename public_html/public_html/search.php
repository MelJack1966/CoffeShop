<html lang="en">
    <!-- *********************************  Added styling for generated table ******************************* -->    
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        th, td {
        padding: 15px;
        }
    </style>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FK - Search</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
            //<!-- *********************************  HEADER ******************************* -->    
            session_start();
            include "dynamic/DBController.php";
            include "static/header.php";

        ?>

        <!-- *********************************  Title & Search field ******************************* -->   
        <div class="small-container2">
            <div class="col-1"> 
                <h1 class="title">Item Search</h1>    
            </div>    
        </div>
        
        <div class="small-container2">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
                <div class="form-group">
                    <label>Keywords:</label>
                    <input type="text" name="keyword" class="form-control" value="">
                </div>
                
                <center>
                <div class="form-group2">
                    <input type="submit" class="btn btn-primary" value="Search">
                </div></center>
            </form>
        </div>


        <!-- *********************************  Generated table based off keyword search ******************************* -->   
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if (isset($_GET['keyword'])) {
                    if (strlen(trim($_GET["keyword"]))==0) {
                        ?>
                        <p style="text-align: center; color: red; font-size: 16px" id="keyword_err" class="input_error">***Please enter an item or items to search for.***</p><br>
                        <?php

                    } elseif (!preg_match('/^[a-zA-Z0-9 ]/', trim($_GET["keyword"]))){
                        ?>
                        <p style="text-align: center; color: red; font-size: 16px" id="keyword_err" class="input_error">***Keywords can only contain words or spaces.***</p><br>
                        <?php

                    } else {
                        $keywordx = explode(" ", trim($_GET['keyword']));
                        $keywordi = implode("%' OR description LIKE '%", $keywordx);
                        $sql = "SELECT * FROM items WHERE description LIKE '%$keywordi%' OR title LIKE '%$keywordi%'";
                        $result = mysqli_query($conn, $sql);
                        ?>
                        <center>

                        <!--********************************** SEARCH RESULTS ***************************************** -->
                        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" name="tableData">
                        <?php
                        // If results > 0, start generating table - Will only show Active and Pending listings
                        if (mysqli_num_rows($result) >= 1) {
                            echo "<table border='1'><tr>  <th>Listing #</th>  <th>Listing Title</th>  <th>Description</th>  <th>Cost</th>  <th>Location</th>  <th>Image</th>  <th>Status</th>  <th>View</th>  </tr>";
                            while($row    = mysqli_fetch_assoc($result))  {
                                if ($row['status'] == 1){
                                    $status = "Active";
                                    echo "<tr>";
                                    echo "<td>" . $row['itemID'] . "</td>";
                                    echo "<td>" . $row['title'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td>" . $row['price'] . "</td>";
                                    echo "<td>" . $row['location'] . "</td>";
                                    echo "<td><img src='images/" . $row['filename'] . "' style='width:100px;height:100px;' </td>";
                                    echo "<td>" . $status . "</td>";
                                    echo "<td><a class='btn btn-yellow' href='display_item.php?id=" . $row['itemID'] . "'>View Listing</td>";
                                    echo "</tr>";
                                } elseif ($row['status'] == 2) {
                                    $status = "Pending";
                                    echo "<tr>";
                                    echo "<td>" . $row['itemID'] . "</td>";
                                    echo "<td>" . $row['title'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td>" . $row['price'] . "</td>";
                                    echo "<td>" . $row['location'] . "</td>";
                                    echo "<td><img src='images/" . $row['filename'] . "' style='width:100px;height:100px;' </td>";
                                    echo "<td>" . $status . "</td>";
                                    echo "<td><a class='btn btn-yellow' href='display_item.php?id=" . $row['itemID'] . "'>View Listing</td>";
                                    echo "</tr>";
                                } else {
                                    $status = "Closed";
                                } //end of Status IF

                            } //end of While
                            echo "</table>";
                            echo "<br><br>";
                        }  //  End of if Result > 0 
                        ?>  </center>  <?php
            
                    }
                }
            }
    //<!--------- FOOTER --------->
    include("static/footer.html");
    ?>
</html>