<?php
require_once "database.php";
$sql = "SELECT * FROM content";
$result = $conn->query($sql, PDO::FETCH_ASSOC);

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}
?>

<?php require_once "partial_header.php"; ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Blog Post Titles</title>
    </head>
    <body>
    <h1>Blog Post Titles </h1>

    <h2>Dashboard</h2>
    <h3>Welcome <?=$_SESSION['username'];?></h3>
    <a href="logout.php">Logout</a>

    <ol>
        <?php
        foreach ($result as $row) {
            echo "<li>"  .
                " <a href='blogpost.php?id=" . $row['ID'] . "'>" .$row['Title']."</a>"."<br></br>";

        }
        ?>
    </ol>


    </body>
    </html>




<?php require_once "partial_footer.php"; ?>