<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přehled knih</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <ul>
        <li><a href="new-book.php">Vložit novou knihu</a></li>
        <li><a href="register.php">Přehled knih</a></li>
        <li><a href="search.php">Vyhledávání knih</a></li>
    </ul>
    <?php
    include "./dbLogin.php";

    if (!$con = mysqli_connect("$host", "$user", "$password", "$db")) {
        die("Nelze se pripojit k databazovemu serveru!</body></html>");
    }
    mysqli_query($con, "SET NAMES 'utf8'");
    if (!$result = mysqli_query($con, "SELECT isbn, krestni, prijmeni, nazev, popis FROM knihy")) {
        die("Nelze provest dotaz.</body></html>");
    }
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <h2>
            <?php echo htmlspecialchars($row["nazev"]); ?>
        </h2>
        <h3>
            <?php echo htmlspecialchars($row["krestni"]) . " " . htmlspecialchars($row["prijmeni"]); ?>
        </h3>
        <p>Popis knihy: <br>
            <?php echo htmlspecialchars($row["popis"]); ?>
        </p>
        <p>ISBN:
            <?php echo htmlspecialchars($row["isbn"]); ?>
        </p>
        <hr>
        <?php
    }
    mysqli_free_result($result);
    mysqli_close($con);
    ?>
</body>

</html>