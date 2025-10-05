<?php

use myfrm\Validator;

require VIEWS_PATH . "/incs/header.php";
/**
 * @var Validator $validator
 */
?>
<body>
    <div class="wrapper">
        <main class="main py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>New Post </h1>
                        <div class="mb-3">
                            <form action="posts" method="post">
                                <label for="title" class="form-label">Post title</label>
                                <input name="title" type="text"
                                    class="form-control <?= isset($error['title']) ? 'is-invalid' : '' ?>" id="title"
                                    placeholder="Post title" value="<?= old('title') ?>">
                                <?= isset($validator) ? $validator->renderErrors('title'):'' ?>
                        </div>
                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <textarea name="excerpt"
                                class="form-control <?= isset($error['excerpt']) ? 'is-invalid' : '' ?>" id="excerpt"
                                rows="2"
                                placeholder="Post excerpt"><?= old( 'excerpt' )?></textarea>
                            <?= isset($validator) ? $validator->renderErrors('excerpt'):'' ?>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content"
                                class="form-control <?= isset($error['content']) ? 'is-invalid' : '' ?>" id="content"
                                rows="5"
                                placeholder="Post content"><?= old( 'content' ) ?></textarea>
                            <?= isset($validator) ? $validator->renderErrors('content'):'' ?>
                            <button class="btn btn-primary" type="submit" value="send">Send</button>
                            <button class="btn btn-secondary" type="reset">Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php require VIEWS_PATH . "/incs/footer.php" ?>
    </div>


    <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js></script>
</body>

