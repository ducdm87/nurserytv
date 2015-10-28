<div class="detail-app" style="margin-bottom: 30px;">
    <div class="content-video">
        <?php if (isset($items) && $items): ?>
            <div class="entry-container">
                <div class="entry-title">
                    <div class="entry-title-text">
                        <span>Video Happy Birth Day</span>
                    </div>
                </div>
                <div class="entry-content">
                    <div class="col-md-8 no-padding-left padding-mb-2">
                        <div class="detail embed-responsive embed-responsive-16by9">
                            <?php
                            $urlQ = parse_url($items['video']['fecth_link'], PHP_URL_QUERY);
                            parse_str($urlQ, $query);
                            ?>
                            <iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $query['v'] ?>?rel=0&amp;autoplay=1" allowfullscreen=""></iframe>
                        </div>
                        <div class="entry-caption">
                            <a href=""><h4><?php echo $items['video']['title'] ?></h4></a>
                            <div class="entry-user" >
                                <div class="fb-social pull-left">
                                    <div class="fb-like" data-href="<?php echo Yii::app()->getBaseUrl(true) . '/playlist/detail?pid=' . $items['video']['play_id'] . '&pslug=&vid=' . $items['video']['id'] . '&vslug=' . $items['video']['alias'] ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                                </div>
                                <div class="pull-right" style="margin-right: 15px;">
                                    <div class="entry-recomment-user">
                                        <span class="entry-viewed">
                                            <span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/eye.png"><?php echo isset($items['video']['viewed']) ? $items['video']['viewed'] : 0 ?></span>
                                        </span>
                                        <span class="entry-like">
                                            <a href="javascript:void(0)" title="Thích" onclick="userLike(<?php echo $items['video']['id'] ?>)"><i class="fa fa-heart"></i></a><span class="like-data"> <?php echo isset($items['video']['liked']) ? $items['video']['liked'] : 0 ?></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="entry-desc">
                                <p>
                                    <?php echo $items['video']['info'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="hidden-md hidden-lg" id="display-playlist-mobile">
                            <?php echo buildHtml::showPlaylist($items['video']['play_id'], $items['video']['id']); ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="entry-container">
                            <div class="entry-title">
                                <div class="entry-title-text">
                                    <span>Bình Luận</span>
                                </div>
                            </div>
                            <div class="entry-content">
                                <div class="">
                                    <div class="pull-right">
                                        <h5 style="color: #ff0000; font-weight: bold;">
                                            <i class="fa fa-warning"></i> <a  class="btn-err"data-toggle="collapse" href="#collapseForm" aria-expanded="false" aria-controls="collapseForm" style="color: #ff0000">Báo lỗi VIDEO</a>
                                        </h5>
                                    </div>
                                    <div id="collapseForm" class="form-err collapse" style="margin-bottom: 20px;">
                                        <form action="" method="post" id="formErr">
                                            <input type="hidden" name="vid" value="<?php echo $items['video']['id']; ?>"/>
                                            <div class="form-group">
                                                <label class="control-lable">Báo lỗi</label>
                                                <div>
                                                    <input type="text" name="subject" class="form-control input-sm input-lg-50" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-lable">Nội dung khác</label>
                                                <div>
                                                    <textarea name="message" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-warning btn-sm">Gửi</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <div class="fb-comments" data-href="<?php echo Yii::app()->getBaseUrl(true) . '/playlist/detail?pid=' . $items['video']['play_id'] . '&pslug=&vid=' . $items['video']['id'] . '&vslug=' . $items['video']['alias'] ?>" data-version="v2.3"  data-width="100%"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="hidden-sm hidden-xs">
                        <?php echo buildHtml::showPlaylist($items['video']['play_id'], $items['video']['id']); ?>
                    </div>
                  <?php echo buildHtml::showSideBar(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="clearfix"></div>