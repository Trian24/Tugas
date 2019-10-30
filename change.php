<?php
    session_start();
    include('config.php');
    if(isset($_SESSION['login']))
    {
    $username = $_SESSION['login'];
    $query = "SELECT * FROM users_table WHERE username='$username'";
    $logquer = mysqli_query($mysql_connect, $query);
    while ($row = mysqli_fetch_assoc($logquer)) 
        {
            $email = $row['email'];
        }

    if(isset($_POST['submit']))
    {
        $uname = $_POST['emcha'];
        $telp = $_POST['nocha'];
        $pas = $_POST['pascha'];

        $query = "UPDATE users_table SET username='$uname', mobile_number='$telp', password='$pas' WHERE username='$username'";
        $change = mysqli_query($mysql_connect, $query);

        $_SESSION['login'] = $uname;

        if($change)
        {
            echo"<script>alert('Berhasil ganti data')</script>";
        }
        else{
            echo"<script>alert('Gagal')</script>";
        }
    }
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
    <div class ="form-group" style="padding: 5% 10%">
        <form action="" method="POST" oninput='up2.setCustomValidity(pascha.value != pascha2.value ? "Passwords do not match." : "")'>
            <label>Email</label>
            <input type = "text" class="form-control" name="email" required readonly placeholder="<?php echo"$email" ?>">
            <label>Username</label>
            <input type="text" class="form-control" name="emcha" required>
            <label>Nomor Telepon</label>
            <input type="number" class="form-control" name="nocha" required>
            <label>Password</label>
            <input type="password" class="form-control" name="pascha" required>
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="pascha2" required>
            <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submit" value="Submit">
            <a href="index.php" class="btn btn-default">Kembali</a>
        </form>
    </div>
</body>
</html>

<?php
    }else{
        header("location: index.php");
        echo"<script>alert('Anda belum login')</script>";
    }
?>