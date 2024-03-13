<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vložit novou knihu</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <ul>
        <li><a href="new-book.php">Vložit novou knihu</a></li>
        <li><a href="register.php">Přehled knih</a></li>
        <li><a href="search.php">Vyhledávání knih</a></li>
    </ul>
    <fieldset>
        <legend>Vložit novou knihu</legend>
        <form action="new-book-insert.php" method="post">
            <div>
                <label for="isbn">ISBN</label>
                <input type="text" id="isbn" name="isbn" required />
            </div>
            <div>
                <label for="firstName">Křestní jméno autora</label>
                <input type="text" id="firstName" name="firstName" required />
            </div>
            <div>
                <label for="surname">Příjmení autora</label>
                <input type="text" id="surname" name="surname" required />
            </div>
            <div>
                <label for="bookName">Název knihy</label>
                <input type="text" id="bookName" name="bookName" required />
            </div>
            <div>
                <label for="description">Popis</label>
                <textarea id="description" name="description" rows="5" cols="30">Popis knihy</textarea>
            </div>
            <input type="submit" value="Uložit">
        </form>
    </fieldset>
    <?php
    include("dbLogin.php");

    if (!$con = mysqli_connect("$host", "$user", "$password", "$db")) {
        die("Nelze se pripojit k databazovemu serveru!</body></html>");
    }
    mysqli_query($con, "SET NAMES 'utf8'");
    if (
        mysqli_query(
            $con,
            "INSERT INTO knihy(isbn, krestni, prijmeni, nazev, popis) 
            VALUES('" .
            addslashes($_POST["isbn"]) . "', '" .
            addslashes($_POST["firstName"]) . "', '" .
            addslashes($_POST["surname"]) . "', '" .
            addslashes($_POST["bookName"]) . "', '" .
            addslashes($_POST["description"]) . "')"
        )
    ) {
        echo "Uspesne vlozeno.";
    } else {
        echo "Nelze provest dotaz. " . mysqli_error($con);
    }
    mysqli_close($con);
    ?>
</body>

</html>