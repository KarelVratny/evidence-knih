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
</body>

</html>