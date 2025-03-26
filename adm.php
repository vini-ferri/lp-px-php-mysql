<?php
session_start();
include_once('config.php');

$correct_user = "admin";
$correct_password = "123456";

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    if ($user === $correct_user && $password === $correct_password) {
        $_SESSION['logged_in'] = true;
    } else {
        echo "<script>alert('Incorrect username or password!');</script>";
    }
}

if (!isset($_SESSION['logged_in'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
            form { display: inline-block; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
            input { display: block; width: 100%; margin-bottom: 10px; padding: 10px; }
            button { padding: 10px; background: blue; color: white; border: none; cursor: pointer; }
        </style>
    </head>
    <body>
        <h2>Restricted Access</h2>
        <form method="POST">
            <input type="text" name="user" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </body>
    </html>
    <?php
    exit();
}

$result = mysqli_query($connection, "SELECT * FROM leads");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration List</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7-beta.19/jquery.inputmask.min.js"></script>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        button { margin-top: 10px; padding: 10px; background: red; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Registration List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Position</th>
            <th>Truck Quantity</th>
            <th>State</th>
            <th>City</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['company']) ?></td>
            <td><?= htmlspecialchars($row['position']) ?></td>
            <td><?= htmlspecialchars($row['truck_quantity']) ?></td>
            <td><?= htmlspecialchars($row['state']) ?></td>
            <td><?= htmlspecialchars($row['city']) ?></td>
        </tr>
        <?php } ?>
    </table>

    <form method="POST" action="logout.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html>