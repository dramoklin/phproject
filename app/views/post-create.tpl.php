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
        <?php require "incs/header.php" ?>
        <main class="main py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>New Post </h1>
                        <div class="mb-3">
                            <form action="" method="post">
                                <label for="title" class="form-label">Post title</label>
                                <input name="title" type="text"
                                    class="form-control <?= isset($error['title']) ? 'is-invalid' : '' ?>" id="title"
                                    placeholder="Post title">
                                <?php if (isset($error['title'])): ?>
                                    <div class="invalid-feedback d-block">
                                        <?= $error['title'] ?>
                                    </div>
                                <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <textarea name="excerpt"
                                class="form-control <?= isset($error['excerpt']) ? 'is-invalid' : '' ?>" id="excerpt"
                                rows="2" placeholder="Post excerpt"></textarea>
                            <?php if (isset($error['excerpt'])): ?>
                                <div class="invalid-feedback d-block">
                                    <?= $error['excerpt'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content"
                                class="form-control <?= isset($error['content']) ? 'is-invalid' : '' ?>" id="content"
                                rows="5" placeholder="Post content"></textarea>
                            <?php if (isset($error['content'])): ?>
                                <div class="invalid-feedback d-block">
                                    <?= $error['content'] ?>
                                </div>
                            <?php endif; ?>


                            <button class="btn btn-primary" type="submit" value="send">Send</button>
                            <button class="btn btn-secondary" type="reset">Reset
                            </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php require "incs/footer.php" ?>
    </div>


    <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js></script>
</body>

</html>