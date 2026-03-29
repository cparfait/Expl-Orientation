<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration - Mise à jour ONISEP</title>
    <style>
        body { font-family: sans-serif; padding: 40px; background: #f3f4f6; }
        .card { background: white; padding: 20px; border-radius: 10px; max-width: 600px; margin: auto; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .success { color: #059669; font-weight: bold; }
        .error { color: #dc2626; font-weight: bold; }
        button { padding: 10px 20px; background: #4647d3; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="card">
        <h1>🛠️ Mise à jour de la base de données</h1>
        
        <?php
        if (isset($_POST['update'])) {
            echo "<p>Téléchargement en cours depuis data.gouv.fr...</p>";
            
            // L'URL stable de l'ONISEP
            $url = "https://www.data.gouv.fr/api/1/datasets/r/834b9458-342c-4018-999d-8365594a2806";
            
            // On récupère le contenu
            $json_data = @file_get_contents($url);
            
            if ($json_data !== false) {
                // On sauvegarde le contenu dans un fichier local
                file_put_contents('metiers.json', $json_data);
                echo "<p class='success'>✅ Mise à jour réussie ! Le fichier metiers.json a été créé/mis à jour avec succès.</p>";
            } else {
                echo "<p class='error'>❌ Erreur lors du téléchargement. Vérifie ta connexion internet.</p>";
            }
        }
        ?>

        <form method="POST">
            <p>Cliquez sur le bouton ci-dessous pour télécharger la dernière version des métiers de l'ONISEP. Cela créera un fichier <strong>metiers.json</strong> local.</p>
            <button type="submit" name="update">Mettre à jour la base locale</button>
        </form>
    </div>
</body>
</html>