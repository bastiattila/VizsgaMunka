<?php
include "include/begin.php";
include "include/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $race = $_POST['race'];
    $raiser = $_POST['raiser'];
    $vintage = $_POST['vintage'];
    $price = $_POST['price'];

    // Ellenőrizzük, hogy a kötelező mezők üresek-e
    if (empty($title) || empty($race) || empty($raiser) || empty($vintage) || empty($price) || !is_string($title) || !is_string($race) || !is_numeric($price)) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">>Kérlek, töltsd ki az összes mezőt helyesen.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>';
    } else {
        try {
            $dbName = "vizsga";
            $dbUser = "root";
            $dbPass = "mysql";
            $dsn = "mysql:host=localhost;dbname=". $dbName .";charset=utf8mb4";
            $db = new PDO($dsn, $dbUser, $dbPass);

            $sql = "INSERT INTO kinalat (title, race, raiser, vintage, price) VALUES (?, ?, ?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->execute([$title, $race, $raiser, $vintage, $price]);

           echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        A termék sikeresen hozzá lett adva a kínálathoz.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        HIBA: Nem sikerült végrehajtani a mentési parancsot: ' . $e->getMessage() . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
        }
    }
}

?>


<form method="post" action="add.php">
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
      <option value="Nyakas">Nyakas</option>
      <option value="Boch">Boch</option>
      <option value="St. Andrea">St. Andrea</option>
      <option value="Tokaji">Tokaji</option>
    </select>
  </div>
  <div>
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

<?php include "include/end.php"; ?>


<script>
    // Az üzenet eltűntetése a bezárás gombra kattintva
    document.addEventListener("DOMContentLoaded", function() {
        var alertCloseButtons = document.querySelectorAll(".alert button.close");
        alertCloseButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var alert = button.closest(".alert");
                alert.classList.remove("show");
                alert.addEventListener("transitionend", function() {
                    alert.style.display = "none";
                }, {once: true});
            });
        });
    });
</script>