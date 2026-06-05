<?php
include("db.php");
$sql = "SELECT * FROM produits";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Produits - Horizons Electrical</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <h1>Nos Produits</h1>
    <nav>
      <a href="index.php">Accueil</a>
      <a href="produits.php">Produits</a>
      <a href="panier.php">Panier</a>
      <a href="admin.php">Admin</a>
    </nav>
  </header>
  <main>
    <h2>Catalogue</h2>
    <div class="catalogue">
      <?php
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<div class='produit'>";
              echo "<img src='images/" . $row['image'] . "' alt='" . $row['nom'] . "'>";
              echo "<h3>" . $row['nom'] . "</h3>";
              echo "<p>" . $row['description'] . "</p>";
              echo "<p><strong>Prix: " . $row['prix'] . " $</strong></p>";
              echo "<p>Stock: " . $row['stock'] . "</p>";
              echo "<button>Ajouter au panier</button>";
              echo "</div>";
          }
      } else {
          echo "<p>Aucun produit disponible pour le moment.</p>";
      }
      ?>
    </div>
  </main>
  <footer>
    <p>&copy; 2026 Horizons Electrical</p>
  </footer>
</body>
</html>