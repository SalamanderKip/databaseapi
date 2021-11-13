<?php
require_once 'api.php';
require_once 'api/objects/Access.php';
$acces = new Access($dbConn);
if (isset($_POST['apisleutel'])) {
    if (!$acces->validateAPIkey($_POST['apikey'])) {
        die("ongeldige API key ingevoerd probeer het opnieuw");
    }
    $apiKey = $_POST['apikey'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>api key</h2>
    <form action="#" method="POST">
        api key<input type="text" name="apikey">
        <input type="submit" name="apisleutel" value="Bevestig">
    </form>
    <?php if (isset($_POST['apikey'])) {
        echo "<h2>API key ingesteld";
    }
    ?>
    <h2>Create product</h2>
    <form action="api.php" method="get">
        <input type="hidden" name="action" value="createProduct">
        <input type="hidden" name="apikey" value="<?php echo $_POST['apikey']; ?>">
        Naam<input type="text" name="name"><br>
        Beschrijving<input type="text" name="desc"><br>
        Prijs<input type="text" name="price"><br>
        <input type="submit" value="Bevestig">
    </form>
    <br>
    <br>
    <br>
    <h2>Delete product</h2>
    <form action="api.php" method="get">
        <input type="hidden" name="action" value="deleteProduct">
        <input type="hidden" name="apikey" value="<?php echo $_POST['apikey']; ?>">
        ID<input type="text" name="id"><br>
        <input type="submit" value="Bevestig">
    </form>
    <br>
    <br>
    <br>
    <h2>Update product</h2>
    <form action="api.php" method="get">
        <input type="hidden" name="action" value="updateProduct">
        <input type="hidden" name="apikey" value="<?php echo $_POST['apikey']; ?>">
        ID<input type="text" name="id"><br>
        Naam<input type="text" name="name"><br>
        Beschrijving<input type="text" name="desc"><br>
        Prijs<input type="text" name="price"><br>
        <input type="submit" value="Bevestig">
    </form>
    <br>
    <br>
    <br>
</body>

</html>