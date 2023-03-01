<html>
<body>
    <h1>Liste des film</h1>
    <?php
    // Récupérer l'année de recherche
    $ANNEE = $_GET['annee'];

    // Connexion à la BDD
    $base = new PDO('mysql:host=localhost; dbname=id20205714_facnanterre', 'id20205714_ammar', 'A8jFE5)UTW5Li*^o');
    $base->exec("SET CHARACTER SET utf8");

    // Échapper les caractères spéciaux pour éviter les injections SQL
    $ANNEE = $base->quote($ANNEE);

    // Construire la requête SQL
    $sql = "SELECT titre FROM movies WHERE annee = $ANNEE";

    // Exécuter la requête SQL
    $retour = $base->query($sql);

    // Vérifier si des résultats ont été trouvés
    if ($retour->rowCount() > 0) {
        // Afficher les résultats sous forme de liste
        echo "<ul>";
        while ($data = $retour->fetch()) {
            echo "<li>" . $data["titre"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Aucun film trouvé pour l'année $ANNEE";
    }

    // Fermer la connexion à la base de données
    $base = null;
    ?>
</body>
</html>

