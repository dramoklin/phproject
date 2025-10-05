<?php require VIEWS_PATH . "/incs/header.php" ?>

<body>
    <div class="wrapper">
        <main class="main py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?= h( $post['title'] ) ?> </h1>
                        <p class="post-content"><?= h( $post['content'] ) ?></p>
                    </div>

                    <form
                        action="<?= htmlspecialchars(BASE_URL) ?>/posts"
                        method="post"
                    >
                        <input
                            type="hidden"
                            name="_method"
                            value="delete"
                        >
                        <input
                            type="hidden"
                            name="id"
                            value="<?= $post['id'] ?>"
                        >
                        <button
                            type="submit"
                            class="btn btn-link"
                        >Delete</button>
                    </form>

                </div>
            </div>
        </main>
        <?php require VIEWS_PATH . "/incs/footer.php" ?>
    </div>
    <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js></script>
</body>