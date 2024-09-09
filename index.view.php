<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
</head>

<body>

<h1>Recommended Books</h1>

<ul>
    <?php
    foreach ($books as $book) {
        echo "<li><strong>Title: </strong>{$book['title']} <br> <strong>Author: </strong> {$book['author']} <br> <strong>Price: </strong> {$book['price']} <br> <strong>Purchase: </strong> <a href='{$book['purchaseUrl']}'>Link</a> </li><br>";
    }
    ?>
</ul>


<h1>Recommended Books Type 2</h1>

<ul>
    <?php foreach ($filteredBooks as $book) : ?>

        <a href="<?php echo $book['purchaseUrl']; ?>">
            <?= $book["title"] ?> (<?= $book["releaseYear"] ?>) by <?= $book["author"] ?>
        </a>
        <br>
    <?php endforeach; ?>
</ul>

</body>

</html>