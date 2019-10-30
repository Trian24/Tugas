<?php
    include ('config.php');
    session_start();

    if(isset($_SESSION['login']))
    {
        $username = $_SESSION['login'];
        $query = "SELECT * FROM users_table WHERE username='$username'";
        $logquer = mysqli_query($mysql_connect, $query);
        while ($row = mysqli_fetch_assoc($logquer)) 
        {
            $userid = $row['user_id'];
        }

        $i = 1;
        $jumlah = 0;
        $query = "SELECT * FROM cart_table WHERE user_id='$userid'";
        $cartquer = mysqli_query($mysql_connect, $query);

        ?>
        <html>
            <head>
                
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

            </head>
            <body>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>

        <?php
        if ($cartquer->num_rows > 0) {
            // output data of each row
            while($row = $cartquer->fetch_assoc()) {
                $product = $row["product"];
                $price = $row["price"];
             ?>
                     <tr>
                     <th scope="row"><?php echo"$i"; ?></th>
                     <td><?php echo"$product" ?></td>
                     <td><?php echo"$price" ?></td>
                     </tr>
             <?php
                $jumlah+=$price;
                $i++;
            }
        }
         ?>   
                    <tr>
                    <th scope="row">Total</th>
                    <td></td>
                    <td><?php echo"$jumlah" ?></td>
                    </tr>
        </tbody>
        </table>

        <a href="index.php" class="btn btn-default">Kembali</a>
    </body>
        </html>

        <?php
    }    
    else
    {
        header("location: index.php");
        echo"<script>alert('Anda belum login')</script>";
    }
?>