<?php
function showBlockHome($items, $title, $link = null){
    if(count($items) <=0) return false;
    $item = $items[0];
    unset($items[0]);
    
    ?>
            <div class="entry-container">
                <div class="entry-title">
                    <div class="entry-title-text">
                        <?php if($link != null) {
                            echo '<a href="'.$link.'"><span>'.$title.'</span></a>';
                        }else{
                            echo '<span>'.$title.'</span>';
                        }?>
                    </div>
                </div>
                <div class="entry-content">
                    <div class="col-md-6 no-padding-left padding-mb-2">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php
                            if (isset($item['fecth_link']) && $item['fecth_link']) {
                                $urlQ = parse_url($item['fecth_link'], PHP_URL_QUERY);
                                parse_str($urlQ, $query);
                                $origin_link = isset($item['origin_link']) ? $item['origin_link'] : '';
                            }
                            ?>
                            <img src="<?php echo $item['image']; ?>" class="img-responsive img-banner"/>
                            <div class="icon-play" rel="<?php echo isset($query['v']) ? $query['v'] : '' ?>" data-link="<?php echo isset($origin_link) ? $origin_link : '' ?>"></div>
                            <div class="ytplayer"></div>
                        </div>
                        <h4>
                            <a href="<?php echo $item['link']; ?>"><?php echo $item['title'] ?></a>
                        </h4>
                    </div>
                   
                    <div class="col-md-6 no-padding-right padding-mb-2">
                        <?php if (isset($items) && $items): ?>
                            <?php foreach ($items as $video): ?>
                                <div class="entry-recomment-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="<?php echo $item['link']; ?>">
                                                <img class="media-object" src="<?php echo $video['image'] ?>" alt="" width="150" height="80">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="<?php echo $item['link']; ?>" title="<?php echo $video['title'] ?>"><?php echo $video['title'] ?></a></h4>
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
    <?php
}


?>



<div class="app-home">

    <div class="content-video">
        <?php if (isset($items_video_hot) && $items_video_hot){
                showBlockHome($items_video_hot,"Video Hot Trong Tuần");
        } ?>
        <div class="clearfix"></div>
        <?php if (isset($videos_update) && $videos_update){
            showBlockHome($videos_update,"Video mới update");
        } ?>
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