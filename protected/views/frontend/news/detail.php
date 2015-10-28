<?php if (isset($post) && $post): ?>
<div class="news-app" style="margin-top: 80px;">
        <div class="entry-container">
            <div class="entry-body">
                <div class="container-fluid">
                    <h4 style="color: red">
                        <?php echo isset($post['title']) ? $post['title'] : ''; ?>
                    </h4>
                    <p>
                        <b><?php echo isset($post['introtext']) ? $post['introtext'] : ''; ?></b>
                    </p>
                    <div class="content-text">
                        <?php echo isset($post['fulltext']) ? $post['fulltext'] : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>