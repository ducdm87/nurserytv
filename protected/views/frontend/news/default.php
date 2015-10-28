
<div class="container-full">
    <div class="dialog-message">
        <div class="alert alert-warning alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p>Qúy khách vui lòng đăng nhập <strong>Tại đây</strong> hoặc vui lòng chuyển sang truy cập GPRS/3G/DEGE</p>
        </div>
    </div>
</div>
<?php if (isset($categories) && $categories): ?>
    <?php foreach ($categories as $category): ?>
        <div class="entry-container">
            <div class="entry-header">
                <div class="container-fluid">
                    <div class="entry-title entry-title-news">
                        <span><?php echo $category['title'] ?></span>
                    </div>
                </div>
            </div>
            <div class="entry-body">
                <div class="container-fluid">
                    <?php if (isset($category['posts']) && $category['posts']): ?>
                        <?php foreach ($category['posts'] as $post): ?>
                            <div class="media entry-news">
                                <div class="media-left media-middle">
                                    <a href="<?php echo $this->createUrl('news/detail/?id=' . $post['id'] . '&alias=' . $post['alias']) ?>" class="thumb">
                                        <img class="media-object" src="<?php echo $post['thumbnail'] ?>" alt="<?php echo $post['title'] ?>" height="105" width="105">
                                    </a>
                                </div>
                                <div class="media-body entry-caption">
                                    <h4 class="media-heading">
                                        <a href="<?php echo $this->createUrl('news/detail/?id=' . $post['id'] . '&alias=' . $post['alias']) ?>">
                                            <span class="hidden-lg hidden-md"><?php echo buildHtml::truncateText($post['title']) ?></span>
                                            <span class="hidden-sm hidden-xs"><?php echo $post['title'] ?></span>
                                        </a>
                                    </h4>
                                    <p class="hidden-xs hidden-sm"><?php echo $post['introtext'] ?></p>
                                    <p class="hidden-md hidden-lg"><?php echo buildHtml::truncateText($post['title'], 40) ?></p>

                                    <div class="clearfix"></div>
                                    <div class="readmore">
                                        <a href="<?php echo $this->createUrl('news/detail/?id=' . $post['id'] . '&alias=' . $post['alias']) ?>">Xem tất cả >></a>
                                    </div>
                                </div>
                            </div>
                            <div class="clear-fix break-line border-botton "></div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center">
                            <h3>Dữ liệu đang được cập nhât...</h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="text-center">
        <h3>Dữ liệu đang được cập nhât...</h3>
    </div>
<?php endif; ?>
