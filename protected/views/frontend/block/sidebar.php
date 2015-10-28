<div class="col-md-4 no-padding-right sidebar">
    <div class="row-fuild">
        <?php if (isset($video_hots) && $video_hots): ?>
            <div class="entry-container">
                <div class="entry-title">
                    <div class="entry-title-text">
                        <span>Video Hot</span>
                    </div>
                </div>
                <div class="entry-content hot-video">
                    <div class="" style="position: relative">
                        <?php $index = 0; ?>
                        <?php foreach ($video_hots as $video): ?>
                            <?php if ($index == 0): ?>   
                                <a href="<?php echo $this->createUrl('playlist/detail?pid=' . $video['play_id'] . '&pslug=&vid=' . $video['id'] . '&vslug=' . $video['alias']) ?>"  class="thumb">
                                    <img src="<?php echo $video['image']; ?>" class="img-responsive"/>
                                    <div class="icon-play"></div>
                                </a>
                            <?php endif; ?>
                            <div class="caption entry-recomment-item" style="margin-top: 30px;">
                                <a href=""><h4><?php echo $video['title'] ?></h4></a>
                            </div>
                            <div class="entry-recomment-user" style="margin-left: 40px;">
                                <span class="entry-viewed">
                                    <span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/eye.png"><?php echo isset($video['viewed']) ? $video['viewed'] : 0 ?></span>
                                </span>
                                <span class="entry-like">
                                    <span><i class="fa fa-heart"></i> <?php echo isset($video['liked']) ? $video['liked'] : 0 ?></span>
                                </span>
                            </div>
                            <?php $index ++; ?>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        <?php endif; ?>
        <div class="clearfix"></div>
        <?php if (isset($video_new) && $video_new): ?>
            <div class="entry-container">
                <div class="entry-title">
                    <div class="entry-title-text">
                        <span>Video Mới</span>
                    </div>
                </div>
                <div class="entry-content" style="position: relative;">
                    <a href="<?php echo $this->createUrl('playlist/detail?pid=' . $video_new[0]['play_id'] . '&pslug=&vid=' . $video_new[0]['id'] . '&vslug=' . $video_new[0]['alias']) ?>"  class="thumb">
                        <img src="<?php echo $video_new[0]['image']; ?>" class="img-responsive"/>
                        <div class="icon-play"></div>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>