<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vyhledávání knih</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <ul>
        <li><a href="new-book.php">Vložit novou knihu</a></li>
        <li><a href="register.php">Přehled knih</a></li>
        <li><a href="search.php">Vyhledávání knih</a></li>
    </ul>
    <fieldset>
        <legend>Vyhledávání knih</legend>
        <form action="search-script.php" method="post">
            <div>
                <label for="isbn">ISBN</label>
                <input type="text" id="isbn" name="isbn" />
            </div>
            <div>
                <label for="firstName">Křestní jméno autora</label>
                <input type="text" id="firstName" name="firstName" />
            </div>
            <div>
                <label for="surname">Příjmení autora</label>
                <input type="text" id="surname" name="surname" />
            </div>
            <div>
                <label for="bookName">Název knihy</label>
                <input type="text" id="bookName" name="bookName" />
            </div>
            <input type="submit" value="Hledej">
        </form>
    </fieldset>
    <?php
    include "./dbLogin.php";

    $query = "SELECT isbn, krestni, prijmeni, nazev, popis FROM knihy WHERE 1=1";

    if (isset($_POST["isbn"]) && !$_POST["isbn"] == "") {
        $query .= " AND isbn = '" . $_POST["isbn"] . "'";
    }
    if (isset($_POST["firstName"]) && !$_POST["firstName"] == "") {
        $query .= " AND krestni = '" . $_POST["firstName"] . "'";
    }
    if (isset($_POST["surname"]) && !$_POST["surname"] == "") {
        $query .= " AND prijmeni = '" . $_POST["surname"] . "'";
    }
    if (isset($_POST["bookName"]) && !$_POST["bookName"] == "") {
        $query .= " AND nazev = '" . $_POST["bookName"] . "'";
    }

    if (!$con = mysqli_connect("$host", "$user", "$password", "$db")) {
        die("Nelze se pripojit k databazovemu serveru!</body></html>");
    }
    mysqli_query($con, "SET NAMES 'utf8'");
    if (!$result = mysqli_query($con, $query)) {
        die("Nelze provest dotaz.</body></html>");
    }
    while (($row = mysqli_fetch_array($result)) && (!$_POST["isbn"] == "" || !$_POST["firstName"] == "" || !$_POST["surname"] == "" || !$_POST["bookName"] == "")) {
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