
<div class="col-md-4">
    <h3>Recent posts</h3>
    <ul class="list-group">
        <?php foreach ($recent_posts as $key => $rpost): ?>
            <li class="list-group-item post-item" id="<?= $key ?>">
                <a href="<?= $rpost['id'] ?>"><?= $rpost['title'] ?></a>
                <button type="button" class="btn btn-sm btn-danger" onclick="hidePost(<?= $key ?>)">НЕ цікаво!</button>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<script>
    function hidePost(id) {
        document.getElementById(id).style.display = 'none';
    }
</script>