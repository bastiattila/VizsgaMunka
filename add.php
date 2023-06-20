<?php
include "include/begin.php";
include "include/database.php";

if (isset($_POST["sendEmail"])) {
    $title = trim($_POST["title"]);
    $race = trim($_POST["race"]);
    $raiser = $_POST["raiser"];
    $vintage = trim($_POST["vintage"]);
    $price = trim($_POST["price"]);

    $error = null;

    if (empty($title) || empty($race) || empty($raiser) || empty($vintage) || empty($price)) {
        $error = "Minden mező kitöltése kötelező";
    }

    if ($error) {
        echo '<p class="error">' . $error . '</p>';
    } else {
        try {
            // Adatbázis kapcsolat felépítése
            $dsn = "mysql:host=localhost;dbname=vizsga;charset=utf8mb4";
            $username = "root";
            $password = "mysql";

            $db = new PDO($dsn, $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Beszúrás végrehajtása
            $sql = "INSERT INTO add (title, race, raiser, vintage, price) VALUES (:title, :race, :raiser, :vintage, :price)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":race", $race);
            $stmt->bindParam(":raiser", $raiser);
            $stmt->bindParam(":vintage", $vintage);
            $stmt->bindParam(":price", $price);
            $stmt->execute();

            echo '<p class="success">Bejegyzésed tároltuk! Köszönjük!</p>';

            $db = null; // Adatbázis kapcsolat bezárása
        } catch (PDOException $e) {
            echo '<p class="error">Hiba történt az adatbáziskapcsolat során: ' . $e->getMessage() . '</p>';
        }
    }
}
?>

<form method="post" action="services.php">
  <div>
    <label for="inputTitle">A bor neve</label>
    <input type="text" name="title" id="inputTitle" maxlength="50">
  </div>
  <div>
    <label for="inputRace">A bor fajtája</label>
    <input type="text" name="race" id="inputRace" maxlength="256">
  </div>
  <div>
    <label for="inputRaiser">Termelő</label>
    <select name="raiser" id="inputRaiser" >
      <option value="3">Nyakas</option>
      <option value="2">Boch</option>
      <option value="1">St. Andrea</option>
      <option value="0">Tokaji</option>
    </select>
    <label for="inputVintage">Évjárat</label>
    <select onchange="alert('Kiválasztott évszám: ' + this.value)" id="inputVintage" name="vintage">
      <option value="">Válassz egy évszámot</option>
      <option value="2023">2023</option>
      <option value="2022">2022</option>
      <option value="2021">2021</option>
      <option value="2020">2020</option>
      <option value="2019">2019</option>
      <option value="2018">2018</option>
      <!-- további évszámok hozzáadása -->
    </select>
  </div>
  <div>
    <label for="inputPrice">Ár megadása</label>
    <textarea name="price" id="inputPrice"></textarea>
  </div>
  <div>
    <button name="sendEmail" type="submit">Küldés</button>
  </div>
</form>
