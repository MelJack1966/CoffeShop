<html lang="en">
    <!-- Added style settings for generated table -->
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
        <title>FK - Item Display</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <center>
        <?php
            session_start();
            include "dynamic/DBController.php";
            $keyword_err = $keyword = "";
            
            //<!-------------------------  HEADER  ------------------------------->
            include "static/header.php";
            
            //<!-------------------------  Grabs ID of listing, no ID, redirect to search.php  ------------------------------->
            if (isset($_GET['id'])) {

                $id = mysqli_real_escape_string($conn, $_GET['id']);
                $sql = "SELECT * FROM items WHERE itemID = " . $id;
                $GLOBALS['row_data'] = mysqli_query($conn, $sql);

            } else {
                header("Location: search.php");
                exit();
            } 

            //<!-------------------------  Generates table  ------------------------------->
            if ($row_data->num_rows > 0) {
                echo "<br><table border='1'><tr>  <th>Listing #</th>  <th>Listing Title</th>  <th>Description</th>  <th>Cost</th>  <th>Location</th>  <th>Image</th>  <th>Status</th>  <th>Contact?</th>  </tr>";
                while($row = $row_data->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['itemID'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td><img src='images/" . $row['filename'] . "' style='width:450px;height: 450px;'</td>";
                    $_SESSION['sellerID'] = $row['userID'];
                    if ($row['status'] == 1){
                        $status = "Active";
                    } elseif ($row['status'] == 2) {
                        $status = "Pending";
                    } else {
                        $status = "Closed";
                    }
                    echo "<td>" . $status . "</td>";
                    
                    if ($status == "Active"){
                        if (isset($_SESSION['loggedin'])){
                            echo "<td><a class='btn btn-green' href='message_seller.php?id=" . $row['itemID'] . "'>Message Seller</td>";
                        }else{
                            echo "<td><a class='btn btn-lblue' href='login.php'>Please Login</td>";
                        }
                    } elseif ($status == "Pending"){
                        if (isset($_SESSION['loggedin'])){
                            echo "<td><a class='btn btn-yellow' href='message_seller.php?id=" . $row['itemID'] . "'>Message Seller</td>";
                        }else{
                            echo "<td><a class='btn btn-lblue' href='login.php'>Please Login</td>";
                        }
                    }else{
                        if (isset($_SESSION['loggedin'])){ 
                            echo "<td><a class='btn btn-red' href='#" . $row['itemID'] . "' disabled>Cannot Message Seller</td>"; 
                        }else{
                            echo "<td><a class='btn btn-lblue' href='login.php'>Please Login</td>";
                        }
                    }  // End of Status IFs
                    echo "</tr>";
                } // End of WHILE loops
                echo "</table>";
                echo "<br><br>";
            } else {
                print('Listing does not exist.');
            }

        //<!-------------------------  FOOTER  ------------------------------->
        include("static/footer.html");
        ?>
    </body>
</html>
<!-- Created by Dan Shields for ICS325 -->