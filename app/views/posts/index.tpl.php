<?php
// dump($posts)
require VIEWS_PATH . "/incs/header.php";
?>
<body>
    <div class="wrapper">
        <main class="main py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php foreach ($posts as $post): ?>
                            <div class="card mb-3">
                                <div style="background-color:rgba(219, 218, 218, 0.98);text-align:center;"
                                    class="card-body">
                                    <h5 class="card-title"><a href="posts?id=<?= $post['id'] ?>"> <?= h($post['title']) ?></a>
                                    </h5>
                                    <p class=" card-text"><?= h($post['excerpt']) ?></p>
                                    <a href="posts?id=<?= $post['id'] ?>">Детальніше</a>
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

