<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FindersKeepers Search</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
            //header
            session_start();
            include "dynamic/DBController.php";
            $keyword_err = $keyword = "";
            if (isset($_SESSION['loggedin'])){
                if ($_SESSION['loggedin'] == 1) { 
                    if ($_SESSION['role'] == 1) {
                        include("static/header3.html");
                    }else {
                        include("static/header2.html");
                    }
                } else {
                    include("static/header1.html");
                }
            } else {
                include("static/header1.html");
            }       





        ?>

        <div class="small-container2">
            <div class="col-1"> 
                <h1 class="title">Item Search</h1>
                
            </div>    
        </div>
        <div class="small-container2">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
                <div class="form-group">
                    <label>Keywords:</label>
                    <input type="text" name="keyword" class="form-control" value="">
                    <p><?php echo $keyword_err; ?></p>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Search">
                </div>
            </form>
        </div>
<?php
            if ($_SERVER["REQUEST_METHOD"] == "GET"){
                // Validate username
                if (isset($_GET['keyword'])){
                if (empty(trim($_GET["keyword"]))){
                    $keyword_err = "Please enter a keyword(s).";
                    } elseif (!preg_match('/^[a-zA-Z0-9 ]/', trim($_GET["keyword"]))){
                        $keyword_err = "Keywords can only contain words or spaces.";
                    } else {

                        
                        $keywordx = explode(" ", trim($_GET['keyword']));
                        $keywordi = implode("%' OR description LIKE '%", $keywordx);
                        $sql = "SELECT * FROM items WHERE description LIKE '%$keywordi%'";
                        
                        $result = mysqli_query($conn, $sql);
                        
                        ?>
                        <center>
                            <?php
                        if (mysqli_num_rows($result) >= 1) {
                            
                            echo "<table border='1'><tr><th>ItemID</th><th>Item Title</th><th>Item Description</th><th>Item Cost</th><th>Location</th></tr>";

                            while($row    = mysqli_fetch_assoc($result))
                              {
                              echo "<tr>";
                              echo "<td>" . $row['itemID'] . "</td>";
                              echo "<td>" . $row['title'] . "</td>";
                              echo "<td>" . $row['description'] . "</td>";
                              echo "<td>" . $row['price'] . "</td>";
                              echo "<td>" . $row['location'] . "</td>";
                              echo "</tr>";
                              }
                            echo "</table>";
                            echo "<br><br>";
                        } ?>
                        </center>  
            <?php
             }
             }
            }


    //<!--------- FOOTER --------->
    include("static/footer.html");
    ?>
</html>