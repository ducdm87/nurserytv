<div class="detail-app" style="margin-bottom: 30px;">
    <div class="row-fuild">
        <div class="col-md-8">
            <div class="row">
                <div class="entry-container">
                    <div class="entry-title">
                        <div class="entry-title-text">
                            <span>Danh sách Play List</span>
                        </div>
                    </div>
                    <div class="entry-content">
                        <?php if (isset($videos) && $videos): ?>
                            <?php foreach ($videos as $video): ?>
                                <?php if (isset($video['videos']) && $video['videos']): ?>
                                    <div class="col-md-4 play-list-item no-padding-left">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <img src="<?php echo $video['videos'][0]['image'] ?>" class="img-responsive"/>
                                            <a href="<?php echo $this->createUrl('/xem-video?pid=' . $video['id'] . '&pslug=' . $video['alias'] . '&vid=' . $video['videos'][0]['id'] . '&vslug=' . $video['videos'][0]['alias']) ?>" class="entry-play-list-all">
                                                <span>
                                                    <i class="fa fa-play"></i> Phát tất cả
                                                </span>
                                            </a>
                                            <a href="" class="entry-play-list">
                                                <span class="play-list-text">
                                                    <?php echo count($video['videos']); ?><br/>
                                                    Video
                                                    <br/>
                                                    <i class="fa fa-th"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-cennter">
                                <h3>Dữ liệu đang cập nhập..</h3>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
        <?php echo buildHtml::showSideBar(); ?>
    </div>
</div>
<div class="clearfix"></div>