<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div id="container">
        <?php
        $server = 'localhost';
        $username = 'dev';
        $password = 'dev';
        $database = 'bdd_cours';

        $bdd = new PDO("mysql:host=$server;dbname=$database;charset=utf8", "$username", $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $request = $bdd->prepare("SELECT * FROM user");
        $request->execute();

        foreach($request->fetchAll() as $user) { ?>
            <div class="userList">
                <p>Monsieur/Madame : <?= $user['nom'] ?> <?= $user['prenom'] ?></p>
                <p>Habite à <?= $user['ville'] ?> code postal <?= $user['code_postal'] ?> dans le pays <?= $user['pays'] ?></p>
                <p>Son adresse est : <?= $user['numero'] ?> <?= $user['rue'] ?></p>
                <p>Vous pouvez le/la contacter à l'adresse mail suivant : <?= $user['mail'] ?></p>
            </div>
        <?php }

        $request = $bdd->prepare("SELECT * FROM user ORDER BY id DESC");
        $request->execute();

        foreach($request->fetchAll() as $user) { ?>
        <div class="userList">
            <p>Monsieur/Madame : <?= $user['nom'] ?> <?= $user['prenom'] ?></p>
            <p>Habite à <?= $user['ville'] ?> code postal <?= $user['code_postal'] ?> dans le pays <?= $user['pays'] ?></p>
            <p>Son adresse est : <?= $user['numero'] ?> <?= $user['rue'] ?></p>
            <p>Vous pouvez le/la contacter à l'adresse mail suivant : <?= $user['mail'] ?></p>
        </div>
        <?php }

        $request = $bdd->prepare("SELECT nom, prenom FROM user ORDER BY id DESC");
        $request->execute();

        foreach($request->fetchAll() as $user) { ?>
        <div class="userList">
            <p>Monsieur/Madame : <?= $user['nom'] ?> <?= $user['prenom'] ?></p>
        </div>
        <?php } ?>
    </div>
</body>
</html>


<?php
/**
 * 1. Importez le fichier SQL se trouvant dans le dossier SQL.
 * 2. Connectez vous à votre base de données avec PHP
 * 3. Sélectionnez tous les utilisateurs et affichez toutes les infos proprement dans un div avec du css
 *    ex:  <div class="classe-css-utilisateur">
 *              utilisateur 1, données ( nom, prenom, etc ... )
 *         </div>
 *         <div class="classe-css-utilisateur">
 *              utilisateur 2, données ( nom, prenom, etc ... )
 *         </div>
 * 4. Faites la même chose, mais cette fois ci, triez le résultat selon la colonne ID, du plus grand au plus petit.
 * 5. Faites la même chose, mais cette fois ci en ne sélectionnant que les noms et les prénoms.
 */
