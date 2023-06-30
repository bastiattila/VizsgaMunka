<?php
include "include/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  $id = $_GET['id'];

  try {
    $dbName = "vizsga";
    $dbUser = "root";
    $dbPass = "mysql";
    $dsn = "mysql:host=localhost;dbname=". $dbName .";charset=utf8mb4";
    $db = new PDO($dsn, $dbUser, $dbPass);

    $sql = "DELETE FROM kinalat WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        A sor sikeresen törölve lett.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
} catch (PDOException $e) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        HIBA: Nem sikerült végrehajtani a törlési parancsot: ' . $e->getMessage() . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
  }
}
?>

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
