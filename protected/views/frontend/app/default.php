<div class="app-home">

    <div class="content-video">
        <?php if (isset($videos_viewed) && $videos_viewed): ?>
            <div class="entry-container">
                <div class="entry-title">
                    <div class="entry-title-text">
                        <span>Video Hot Trong Tuần</span>
                    </div>
                </div>
                <div class="entry-content">
                    <div class="col-md-6 no-padding-left padding-mb-2">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php
                            if (isset($videos_viewed[0]['fecth_link']) && $videos_viewed[0]['fecth_link']) {
                                $urlQ = parse_url($videos_viewed[0]['fecth_link'], PHP_URL_QUERY);
                                parse_str($urlQ, $query);
                                $origin_link = isset($videos_viewed[0]['origin_link']) ? $videos_viewed[0]['origin_link'] : '';
                            }
                            ?>
                            <img src="<?php echo $videos_viewed[0]['image']; ?>" class="img-responsive img-banner"/>
                            <div class="icon-play" rel="<?php echo isset($query['v']) ? $query['v'] : '' ?>" data-link="<?php echo isset($origin_link) ? $origin_link : '' ?>"></div>
                            <div class="ytplayer"></div>
                        </div>
                        <h4>
                            <a href="<?php echo $this->createUrl('/xem-video?pid=' . $videos_viewed[0]['play_id'] . '&pslug=&vid=' . $videos_viewed[0]['id'] . '&vslug=' . $videos_viewed[0]['alias']) ?>"><?php echo $videos_viewed[0]['title'] ?></a>
                        </h4>
                    </div>
                    <?php unset($videos_viewed[0]) ?>
                    <div class="col-md-6 no-padding-right padding-mb-2">
                        <?php if (isset($videos_viewed) && $videos_viewed): ?>
                            <?php foreach ($videos_viewed as $video): ?>
                                <div class="entry-recomment-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="<?php echo $this->createUrl('/xem-video?pid=' . $video['play_id'] . '&pslug=&vid=' . $video['id'] . '&vslug=' . $video['alias']) ?>">
                                                <img class="media-object" src="<?php echo $video['image'] ?>" alt="" width="150" height="80">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="<?php echo $this->createUrl('playlist/detail?pid=' . $video['play_id'] . '&pslug=&vid=' . $video['id'] . '&vslug=' . $video['alias']) ?>" title="<?php echo $video['title'] ?>"><?php echo $video['title'] ?></a></h4>
                                            <div class="entry-recomment-user">
                                                <span class="entry-viewed">
                                                    <span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/eye.png"><?php echo isset($video['viewed']) ? $video['viewed'] : 0 ?></span>
                                                </span>
                                                <span class="entry-like">
                                                    <span><i class="fa fa-heart"></i> <?php echo isset($video['liked']) ? $video['liked'] : 0 ?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="clearfix"></div>
        <?php if (isset($videos_update) && $videos_update): ?>
            <div class="entry-container">
                <div class="entry-title">
                    <div class="entry-title-text">
                        <span>Video Mới Update</span>
                    </div>
                </div>
                <div class="entry-content">
                    <div class="col-md-6 no-padding-left padding-mb-2">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php
                           
                            if (isset($videos_update[0]['fecth_link']) && $videos_update[0]['fecth_link']) {
                                $urlQ = parse_url($videos_update[0]['fecth_link'], PHP_URL_QUERY);
                                parse_str($urlQ, $query_s);
                                
                            }
                            if(isset($videos_update[0]['origin_link']) && $videos_update[0]['origin_link']){
                                $origin_link2 = isset($videos_update[0]['origin_link']) ? $videos_update[0]['origin_link'] : '';
                            }
                            ?>
                            <!--<a href="<?php echo $this->createUrl('/xem-video?pid=' . $videos_update[0]['play_id'] . '&pslug=&vid=' . $videos_update[0]['id'] . '&vslug=' . $videos_update[0]['alias']) ?>"  class="thumb">-->
                            <img src="<?php echo $videos_update[0]['image']; ?>" class="img-responsive"/>
                            <div class="icon-play"></div>
                            <div class="icon-play" rel="<?php echo isset($query_s['v']) ? $query_s['v'] : '' ?>" data-link="<?php echo isset($origin_link2) ? $origin_link2 : '' ?>"></div>
                            <div class="ytplayer"></div>
                            <!--</a>-->
                        </div>
                        <h4>
                            <a href="<?php echo $this->createUrl('/xem-video?pid=' . $videos_update[0]['play_id'] . '&pslug=&vid=' . $videos_update[0]['id'] . '&vslug=' . $videos_update[0]['alias']) ?>"><?php echo $videos_update[0]['title'] ?></a>
                        </h4>
                    </div>
                    <?php unset($videos_update[0]) ?>
                    <div class="col-md-6 no-padding-right">
                        <?php if (isset($videos_update) && $videos_update): ?>
                            <?php foreach ($videos_update as $video): ?>
                                <div class="entry-recomment-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="<?php echo $this->createUrl('/xem-video?pid=' . $video['play_id'] . '&pslug=&vid=' . $video['id'] . '&vslug=' . $video['alias']) ?>">
                                                <img class="media-object" src="<?php echo $video['image'] ?>" alt="" width="150" height="80">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="<?php echo $this->createUrl('/' . $video['alias']) ?>" title="<?php echo $video['title'] ?>"><?php echo $video['title'] ?></a></h4>
                                            <div class="entry-recomment">
                                                bởi <a href="#">Nursery Rhymes TV</a>
                                                <div class="entry-recomment-user">
                                                    <span class="entry-viewed">
                                                        <span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/eye.png"><?php echo isset($video['viewed']) ? $video['viewed'] : 0 ?></span>
                                                    </span>
                                                    <span class="entry-like">
                                                        <span><i class="fa fa-heart"></i> <?php echo isset($video['liked']) ? $video['liked'] : 0 ?></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="clearfix"></div>
        <?php if (isset($playlists) && $playlists): ?>
            <div class="entry-container">
                <div class="entry-title">
                    <div class="entry-title-text">
                        <span>Video Happy Birth Day</span>
                    </div>
                </div>
                <div class="entry-content">
                    <?php $index = 0; ?>
                    <?php foreach ($playlists as $playlist): ?>
                        <div class="col-md-6 col-sm-6 col-xs-6 <?php echo ($index == 0) ? 'no-padding-left' : 'no-padding-right' ?> ">
                            <div class="embed-responsive embed-responsive-16by9">
                                <img src="<?php echo $playlist['videos'][0]['image'] ?>" class="img-responsive"/>
                                <a href="<?php echo $this->createUrl('/xem-video?pid=' . $playlist['id'] . '&pslug=&vid=' . $playlist['videos'][0]['id'] . '&vslug=' . $playlist['videos'][0]['alias']) ?>" class="entry-play-list-all">
                                    <span>
                                        <i class="fa fa-play"></i> Phát tất cả
                                    </span>
                                </a>
                                <a href="" class="entry-play-list">
                                    <span class="play-list-text">
                                        <?php echo count($playlist['videos']) ?>
                                        <br/>
                                        Video
                                        <br/>
                                        <i class="fa fa-th"></i>
                                    </span>
                                </a>
                            </div>
                            <h4>
                                <a href="<?php echo $this->createUrl('/xem-video?pid=' . $playlist['id'] . '&pslug=&vid=' . $playlist['videos'][0]['id'] . '&vslug=' . $playlist['videos'][0]['alias']) ?>"><?php echo $playlist['name'] ?></a>
                            </h4>
                        </div>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="clearfix"></div>
    <div class="google-adwords" style="margin-top: 15px">
        <div class="text-center">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/addword2.png" alt="Google AdWords" class="img-responsives"/>
        </div>
    </div>
    <div class="clearfix"></div>

</div>