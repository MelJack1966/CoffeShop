<?php
    //<!-- ********************************* HEADER ******************************* -->   
    if (isset($_SESSION['locked'])){
        if ($_SESSION['locked'] ==  1) {

            header("location: locked.php");
            session_unset();
            session_destroy();
        }
    }
    if (isset($_SESSION['loggedin'])){
        if ($_SESSION['loggedin'] == 1) { 
            if ($_SESSION['role'] == 1) {
                ?>
                    <body>
                    <!---------- header ---------->	
                        <div class="header">
                            <div class="container">
                                <div class="navbar">
                                    <div class="logo">
                                        <a href="index.php"><img src="img/logo.png" width="120px"></a>
                                    </div>
                                    <nav>
                                        <ul id="MenuItems">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                        <li><a href="profile.php">Profile</a></li>
                                        <li><a href="items.php">Items</a></li>
                                        <li><a href="search.php">Search</a></li>
                                        <li><a href="messages.php">Messages</a></li>
                                        <li><a href="adminmanage.php">Admin Manage</a></li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </body>
                <?php
            }else {
                ?>
                <body>
                <!---------- header ---------->	
                    <div class="header">
                        <div class="container">
                            <div class="navbar">
                                <div class="logo">
                                    <a href="index.php"><img src="img/logo.png" width="120px"></a>
                                </div>
                                <nav>
                                    <ul id="MenuItems">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="items.php">Items</a></li>
                                    <li><a href="search.php">Search</a></li>
                                    <li><a href="messages.php">Messages</a></li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                </body>
            <?php
            }
        } else {
            ?>
            <body>
            <!---------- header ---------->	
                <div class="header">
                    <div class="container">
                        <div class="navbar">
                            <div class="logo">
                                <a href="index.php"><img src="img/logo.png" width="120px"></a>
                            </div>
                            <nav>
                                <ul id="MenuItems">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="login.php">Login</a></li>
                                <li><a href="register.php">Register</a></li>
                                <li><a href="search.php">Search</a></li>
                                <li><a href="about.php">About</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </body>
        <?php
        }
    } else {
        ?>
        <body>
        <!---------- header ---------->	
            <div class="header">
                <div class="container">
                    <div class="navbar">
                        <div class="logo">
                            <a href="index.php"><img src="img/logo.png" width="120px"></a>
                        </div>
                        <nav>
                            <ul id="MenuItems">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="register.php">Register</a></li>
                            <li><a href="search.php">Search</a></li>
                            <li><a href="about.php">About</a></li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </body>
    <?php
    }       
    
?>