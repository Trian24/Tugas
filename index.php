<html>
    <head>
        <title>Latihan Programming</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <?php
            session_start();

            include('config.php');
            if(isset($_POST['subreg'])){

                $username = $_POST['userreg'];
                $email = $_POST['emreg'];
                $notelp = $_POST['notelp'];
                $pass = $_POST['pasreg'];
                $query = "INSERT INTO users_table (email, username, mobile_number, password) 
                VALUES ('$email','$username','$notelp','$pass')";
                

                $insert = mysqli_query($mysql_connect, $query);
                if($insert)
                {
                    echo"<script type='text/javascript'>window.location='http://localhost:8080/tp4/index.php';alert('Register success!');</script>";
                    
                }
                else {
                    echo"<script type='text/javascript'>window.location='http://localhost:8080/tp4/index.php';alert('Register failed!');</script>";
                }
            }

            if(isset($_POST['sublog'])){
                

                $emaillog= $_POST['emlog'];
                $passlog= $_POST['paslog'];

                $query = "SELECT * FROM users_table WHERE email='$emaillog'";
                $logquer = mysqli_query($mysql_connect, $query);
                while ($row = mysqli_fetch_assoc($logquer)) 
                {
                    $userid = $row['user_id'];
                    $username = $row['username'];
                    $check_password = $row['password'];
                }
                
                if(mysqli_num_rows($logquer)<1)
                {
                    echo"<script>alert('You haven't registered')</script>";
                }
                else if($passlog == $check_password)
                {
                    $_SESSION['login'] = $username;
                    //insert query goes here
                }
                else
                {
                    echo"<script>alert('Wrong password!');</script>";
                }
            }

            if(isset($_POST['belidasar']))
            {
                if(isset($_SESSION['login']))
                {
                    $username = $_SESSION['login'];
                    $query = "SELECT * FROM users_table WHERE username='$username'";
                    $logquer = mysqli_query($mysql_connect, $query);
                    while ($row = mysqli_fetch_assoc($logquer)) 
                    {
                        $userid = $row['user_id'];
                    }

                    $product= "Web Development Fundamental";
                    $price = 152000;
                    $query = "INSERT INTO cart_table (user_id, product, price) VALUES ('$userid','$product','$price')";
                    $carquer = mysqli_query($mysql_connect, $query);

                    if(!$carquer)
                    {
                        echo"<script>alert('Gagal');</script>";
                    }
                }
                else
                {
                    echo"<script>alert('Anda belum login');</script>";
                }
            }

            if(isset($_POST['belicsharp']))
            {
                if(isset($_SESSION['login']))
                {
                    $username = $_SESSION['login'];
                    $query = "SELECT * FROM users_table WHERE username='$username'";
                    $logquer = mysqli_query($mysql_connect, $query);
                    while ($row = mysqli_fetch_assoc($logquer)) 
                    {
                        $userid = $row['user_id'];
                    }

                    $product= "C# Programming for Beginners";
                    $price = 180000;
                    $query = "INSERT INTO cart_table (user_id, product, price) VALUES ('$userid','$product','$price')";
                    $carquer = mysqli_query($mysql_connect, $query);

                    if(!$carquer)
                    {
                        echo"<script>alert('Gagal');</script>";
                    }
                }
                else
                {
                    echo"<script>alert('Anda belum login');</script>";
                }
            }

            if(isset($_POST['belijava']))
            {
                if(isset($_SESSION['login']))
                {
                    $username = $_SESSION['login'];
                    $query = "SELECT * FROM users_table WHERE username='$username'";
                    $logquer = mysqli_query($mysql_connect, $query);
                    while ($row = mysqli_fetch_assoc($logquer)) 
                    {
                        $userid = $row['user_id'];
                    }

                    $product= "Java Programming Language : Expert Guide";
                    $price = 125000;
                    $query = "INSERT INTO cart_table (user_id, product, price) VALUES ('$userid','$product','$price')";
                    $carquer = mysqli_query($mysql_connect, $query);

                    if(!$carquer)
                    {
                        echo"<script>alert('Gagal');</script>";
                    }
                }
                else
                {
                    echo"<script>alert('Anda belum login');</script>";
                }
            }
        ?>
    </head>
    <body>

        <!-- the navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="EAD.png" class="navbar-nav mr-auto" width="100" height="30"></img>
            <ul class="navbar-nav ml-auto">

                <?php if(!isset($_SESSION['login'])) { ?>

                <li><button type="button" class="btn btn-outline-success my-2 my-sm-0" 
                    data-dismiss="modal" data-toggle="modal" data-target="#modreg" style="margin-inline: 10px;">
                    Register</button></li>
                <li><button type="button" class="btn btn-outline-success my-2 my-sm-0" 
                    data-dismiss="modal" data-toggle="modal" data-target="#modlog">
                    Login</button></li>

                <?php } else { ?>

                <li><a href="cart.php" class="btn btn-default" style="color: lime;">Cart</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo($_SESSION['login']); ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="change.php">Change profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>

                <?php } ?>
                
            </ul>
        </nav>

        <br>
    
        <!-- KARTU KARTU KARTU -->
        
        <div class="container">
            <form action="" method="POST">
            <div style="padding: 0% 10%">
                <div class="card bg-light" style="padding: 5% 1%">
                    <p>asd</p>
                </div>
            </div>
            <br>
            <div class="card-deck" style="padding: 0% 10%">
                <div class="card" style="width:200px">
                    <img class="card-img-top mx-auto d-block" src="global.png" alt="Card image" style="width:50%; padding-top: 5%;">
                    <div class="card-body">
                        <h4 class="card-title">Web Development Fundamental</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <input type="submit" class="btn btn-primary" style="width: 30%" name="belidasar" value="Buy">
                    </div>
                </div>
                <div class="card" style="width:200px">
                    <img class="card-img-top mx-auto d-block" src="hashtag.png" alt="Card image" style="width:50%; padding-top: 5%">
                    <div class="card-body">
                        <h4 class="card-title">C# Programming for Beginners</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <input type="submit" class="btn btn-primary" style="width: 30%" name="belicsharp" value="Buy">
                    </div>
                </div>
                <div class="card" style="width:200px">
                    <img class="card-img-top mx-auto d-block" src="java.png" alt="Card image" style="width:50%; padding-top: 5%">
                    <div class="card-body">
                        <h4 class="card-title">Java Programming Language</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <input type="submit" class="btn btn-primary" style="width: 30%" name="belijava" value="Buy">
                    </div>
                </div>
            </div>
            </form>
        </div>


        <!-- MODAL MODAL MODAL -->
        <div class="modal fade" id="modreg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Masukkan data anda</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class ="form-group">
                            <form action="" method="POST">
                                <label>Username</label>
                                <input type = "text" class="form-control" name="userreg" required>
                                <label>Email</label>
                                <input type="email" class="form-control" name="emreg" required>
                                <label>Nomor Telepon</label>
                                <input type="number" class="form-control" name="notelp" required>
                                <label>Password</label>
                                <input type="password" class="form-control" name="pasreg" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-default" value="Register" name="subreg">
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    
        <div id="modlog" class="modal fade">
            <div class="modal-dialog">
            
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="emlog" placeholder="Enter email" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="paslog" placeholder="Password" required>
                            </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-default" value="Login" name="sublog">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>