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

<body>
    <div class="wrapper">
        <?php require VIEWS_PATH . "/incs/header.php" ?>
        <main class="main py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p class="post-content"><?= h($post) ?></p>
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