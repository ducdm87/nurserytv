
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jwplayer/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key = "Il334Pdk5OF2EBrjO5LrSA/ZK7qdYC/nL80QExPiIxoQ96iqPROaAEye70E=";</script>

<div class="container-full">
    <div class="dialog-message">
        <div class="alert alert-warning alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p>Qúy khách vui lòng đăng nhập <strong>Tại đây</strong> hoặc vui lòng chuyển sang truy cập GPRS/3G/DEGE</p>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="entry-container">
        <div class="entry-header">
            <div class="container-fluid">
                <div class="entry-title entry-title-news">
                    <span>Video Liên quan</span>
                </div>
                <div class="pull-right entry-all hidden-xs hidden-sm">
                    <a href="/videos">Xem tất cả <i class="fa fa-caret-right"></i></a>
                </div>
            </div>
        </div>
        <div class="entry-body">
            <?php if (isset($video) && $video): ?>
                <div class="container-fluid">
                    <h4 style="color: #f32323;"><?php echo isset($video['title']) ? $video['title'] : '' ?></h4>
                    <div class="clearfix"></div>
                    <div class="col-md-5">
                        <div class="row">
                            <div id="player"></div>
                            <div class="entry-contrainer-info">
                                <div class="entry-info">
                                    <div class="pull-left">
                                        <ul class="list-inline btn-group">
                                            <li>
                                                <a href="javascript:void(0)" class="" onclick="like_video(<?php echo $video['id'] ?>)"><i class="fa fa-thumbs-o-up fa-x2"></i></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" onclick="share_vide()"><i class="fa fa-share-alt fa-x2"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pull-right">
                                        <span class="entry-viewed">Lượt xem <span><?php echo isset($video['viewed']) ? $video['viewed'] : 0 ?></span></span>
                                    </div>

                                </div>
                                <div class="entry-caption">
                                    <div class="info-social">
                                        <strong>Chia sẻ :</strong> 
                                        <a href="javascript:void(0)" onclick="return share_facebook('<?php echo $this->createUrl('/videos/detail?id=' . $video['id'] . '&alias=' . $video['alias']) ?>', '<?php echo $video['title'] ?>', '<?php echo $video['info'] ?>');"><i class="fa fa-facebook-square "></i></a>
                                        <a href="javascript:void(0)" onclick="return share_twitter('<?php echo $this->createUrl('/videos/detail?id=' . $video['id'] . '&alias=' . $video['alias']) ?>')" ><i class="fa fa-twitter-square "></i></a>
                                    </div>
                                    <div class="info-description">
                                        <span><?php echo isset($video['info']) ? $video['info'] : 'Đang cập nhật...' ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            jwplayer("player").setup({
                                width: "100%",
                                height: "450px",
                                aspectratio: "12:8",
                                file: "<?php echo isset($video['episode_url']) ? $video['episode_url'] : '' ?>",
                                image: "<?php echo isset($video['image']) ? $video['image'] : '' ?>"
                            });
                            jwplayer().onDisplayClick(function (event) {
                                jwplayer().play();
                                $.post('/videos/setview', {video_id:<?php echo isset($video['id']) ? $video['id'] : '' ?>}, function (data) {
                                    if (data != 'false') {
                                        $('.entry-viewed span').html(data);
                                    }
                                });
                            });

                        </script>
                    </div>
                    <?php if (isset($videos) && $videos): ?>
                        <div class="col-md-7 no-padding-md">
                            <div class="well">
                                <div class="row-mobile row">
                                    <?php foreach ($videos as $key => $video): ?>
                                        <div class="col-md-6 col-sm-6 no-padding-md">
                                            <div class="row-mobile">
                                                <div class="media item">
                                                    <div class="media-left entry-thunb">
                                                        <a href="<?php echo $this->createUrl('videos/detail?id=' . $video['id'] . '&alias=' . $video['alias']) ?>">
                                                            <img class="media-object" src="<?php echo $video['image'] ?>" alt="Video <?php echo $video['title'] ?>">
                                                            <span class="entry_time"><?php echo $video['duration'] ?></span>
                                                        </a>
                                                    </div>
                                                    <div class="media-body entry-thunb">
                                                        <span class="media-heading"><a href="<?php echo $this->createUrl('videos/detail?id=' . $video['id'] . '&alias=' . $video['alias']) ?>"><?php echo buildHtml::truncateText($video['title'], 40) ?></a></span>
                                                        <span class="entry-control">
                                                            <span><i class="fa fa-thumbs-o-up"></i> <?php echo isset($video['value']) ? $video['value'] : 0; ?></span>
                                                            <span><i class="fa fa-play-circle-o"></i> <?php echo isset($video['viewed']) ? $video['viewed'] : 0; ?></span>
                                                        </span>
                                                        <div class="entry-social">
                                                            <div class="fb-like" data-href="<?php echo $this->createUrl('videos/detail?id=' . $video['id'] . '&alias=' . $video['alias']) ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($key == 1): ?>
                                            <div class="break-line clearfix"></div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
        <div class="entry-header-box">
            <div class="container-fluid">
                <div class="entry-box">
                    <h2>
                        <span>Bạn muốn xem</span>
                    </h2>
                </div>
                <div class="entry-box-body entry-body">
                    <?php if (isset($videosRand) && $videosRand): ?>
                        <?php $index = 0; ?>
                        <?php foreach ($videosRand as $video): ?>
                            <div class="col-md-4 col-sm-6 no-padding-md">
                                <div class="row-mobile">
                                    <div class="media item">
                                        <div class="media-left entry-thunb">
                                            <a href="<?php echo $this->createUrl('videos/detail?id=' . $video['id'] . '&alias=' . $video['alias']) ?>">
                                                <img class="media-object" src="<?php echo $video['image'] ?>" alt="Video <?php echo $video['title'] ?>">
                                                <span class="entry_time"><?php echo $video['duration'] ?></span>
                                            </a>
                                        </div>
                                        <div class="media-body entry-thunb">
                                            <span class="media-heading"><a href="<?php echo $this->createUrl('videos/detail?id=' . $video['id'] . '&alias=' . $video['alias']) ?>"><?php echo $video['title'] ?></a></span>
                                            <span class="entry-control">
                                                <span><i class="fa fa-thumbs-o-up"></i> <?php echo isset($video['value']) ? $video['value'] : 0; ?></span>
                                                <span><i class="fa fa-play-circle-o"></i> <?php echo isset($video['viewed']) ? $video['viewed'] : 0; ?></span>
                                            </span>
                                            <div class="entry-social">
                                                <div class="fb-like" data-href="<?php echo $this->createUrl('videos/detail?id=' . $video['id'] . '&alias=' . $video['alias']) ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo ($index == 2) ? '<div class="break-line clearfix"></div>' : '' ?>
                            <?php $index++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>