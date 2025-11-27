<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
</head>
<body>
    <h1>Ma Bibliothèque</h1>

    <?php if(count($books) > 0): ?>
        <ul>
            <?php foreach ($books as $book): ?>
                <li>
                    <a href="/books/<?php echo $book->id; ?>">
                        <?php echo htmlspecialchars($book->title); ?>
                    </a>
                    - par <?php echo htmlspecialchars($book->author); ?> 
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun livre dans la bibliothèque.</p>
    <?php endif; ?>

</body>
</html>
