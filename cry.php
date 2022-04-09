<?php 
$R=mysqli_connect('localhost','root','','music_db');

if(isset($_POST('submit')))
{
    $name=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM users where email='$name' and password='$password'";
    $query=mysqli_query($conn,$sql);





}

?>

<html>
    <head>
        <title>Music Player</tile>
</head>

<body>
    <center>
    <form method="post">
        <label>Email</label>
        <input type="text" placeholder="email" id="email" name="email">
        <label>Password</label>
        <input  type="password" placeholder="password" id="password" name="password">
        <button name="submit">Signup</button>
        
</form>
</center>
</html>