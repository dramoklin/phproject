<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "TITLE" ?></title>
    <base href="<?= BASE_URL ?>/">
    <link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css>
    <link rel="stylesheet" href="assets/main.css">
    <link rel="icon" href="img/internet.png">
</head>

<?php  // dump($posts) ?>

<body>
    <div class="wrapper">
        <?php require VIEWS_PATH . "/incs/header.php" ?>
        <main class="main py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php foreach ($posts as $post): ?>
                            <div class="card mb-3">
                                <div style="background-color:rgba(219, 218, 218, 0.98);text-align:center;"
                                    class="card-body">
                                    <h5 class="card-title"><a href="post?id=<?= $post['id'] ?>"> <?= $post['title'] ?></a>
                                    </h5>
                                    <p class=" card-text"><?= $post['excerpt'] ?></p>
                                    <a href="post?id=<?= $post['id'] ?>">Детальніше</a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                    <?php require VIEWS_PATH . "/incs/sidebar.php" ?>
                </div>
            </div>
        </main>
        <?php require VIEWS_PATH . "/incs/footer.php" ?>
    </div>

    <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js></script>
</body>

</html>