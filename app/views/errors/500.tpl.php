<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "TITLE" ?></title>
<link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css>
<link rel="stylesheet" href="assets/main.css">
<link rel="icon" href="public/img/internet.png">
</head>

<?php  // dump($posts) ?>

<body>
<div class="wrapper">
    <?php require VIEWS_PATH ."/incs/header.php" ?>
    <main class="main py-3">
        <div class="container">
            <div  class="row error-div">
                <div  class="col-md-12">
                    <h3 class="error-h3">500-Server error</h3>
                </div>
            </div>
        </div>
    </main>
    <?php require VIEWS_PATH . "/incs/footer.php" ?>
</div>

<script src=https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js></script>
</body>

</html>