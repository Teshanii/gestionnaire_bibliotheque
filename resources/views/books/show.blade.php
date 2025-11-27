<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du livre</title>
</head>
<body>
    <h1><?php echo htmlspecialchars($book->title); ?></h1>

    <p><strong>Auteur :</strong> <?php echo htmlspecialchars($book->author); ?></p>

    <p><strong>Année de publication :</strong> <?php echo $book->year; ?></p>

    <a href="/">← Retour à la liste</a>

</body>
</html>
