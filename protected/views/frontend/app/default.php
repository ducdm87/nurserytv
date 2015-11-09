<?php
function showBlockHome($items, $title, $link = null){
    if(count($items) <=0) return false;
    $item = $items[0];
    unset($items[0]);
?>
<div class="entry-container">
    <div class="entry-title col-md-12 ">
        <div class="col-md-10">
            <div class="entry-title-text-left">
                <div class="entry-title-text-right">
                    <div class="entry-title-text-center">
                        <?php if($link != null) {echo '<a href="'.$link.'"><span>'.$title.'</span></a>';
                        }else{  echo '<span>'.$title.'</span>'; }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="xem-them col-md-2"><a href="/playlist">Xem Thêm <span class="caret"></span></a></div>
    </div>
    <div class="entry-content">
        <div class="col-md-6 no-padding-left padding-mb-2">
            <div class="embed-responsive embed-responsive-16by9">
                <div class="embed-responsive embed-responsive-16by9">
                     <?php
                     if ($item["videourl"] == null) {
                        ?>
                    <img src="<?php echo $item['image']; ?>" class="img-video-index" alt="<?php echo $item["title"];?>">
                    <?php    
                        }
                     echo show_video($item,"470","264");  ?>
                    <div class="ytplayer"></div>
                </div>
                <!--</a>-->  
            </div>
            <h4 class="media-heading-title">
                <a href="<?php echo $item['link']; ?>"><?php echo $item['title'] ?></a>
            </h4>
        </div>

        <div class="col-md-6 no-padding-right padding-mb-2">
            <?php if (isset($items) && $items): ?>
                <?php foreach ($items as $video): ?>
                    <div class="entry-recomment-item">
                        <div class="media">
                            <div class="media-left">
                                <a href="<?php echo $video['link']; ?>">
                                    <img class="media-object" src="<?php echo $video['image'] ?>" alt="<?php echo $video["title"];?>" width="150" height="80">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="<?php echo $video['link']; ?>" title="<?php echo $video['title'] ?>"><?php echo $video['title'] ?></a></h4>
                                Bởi: <a href="#">Nursery Rhymes TV</a>
                                <div class="entry-recomment-user">
                                    <div class="dan-index-v-like-index">
                                        <span class="entry-viewed">
                                            <span><img alt="<?php echo $video["title"];?>" 
                                                    src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/eye.png"><?php echo isset($video['viewed']) ? $video['viewed'] : 0 ?></span>
                                        </span>
                                        <span class="entry-like">
                                           <i class="fa fa-heart"></i> <span class="like-data"> <?php echo isset($video["like"]) ? $video["like"] : 0 ?></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div><!--end entry-content-->
</div>
    <?php
}//end funtion hiển thị video
?>
<?php function showplaylist($items, $title, $link = null){
    if(count($items) <=0) return false;
 ?>   
<?php foreach ($items as $key=>$item): ?>
    <div class="entry-container">
        <div class="entry-title col-md-12 ">
            <div class="col-md-10">
                <div class="entry-title-text-left">
                    <div class="entry-title-text-right">
                        <div class="entry-title-text-center">
                            <?php if($item['link'] != null) {
                               echo '<a href="'.$item['link'].'"><span>'.$item['title'].'</span></a>';
                               }else{echo '<span>'.$item['title'].'</span>';}
                           ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xem-them col-md-2"><a href="<?php echo $item['link'];?>">Xem Thêm <span class="caret"></span></a></div>
        </div>
<?php if(count($item['playlist']) <=0) return false;?>
    <div class="entry-content">
        <?php foreach ($item['playlist'] as $key=>$p): ?>
            <div class="<?php if($key%2==0){echo "col-md-6 col-sm-6 col-xs-6 no-padding-left";}else echo "col-md-6 col-sm-6 col-xs-6 no-padding-right";?>">
                <div class="embed-responsive embed-responsive-16by9">
                    <img src="<?php echo $p["thumbnail"]; ?>"  class="img-responsive" alt="<?php echo $p["name"];?>">
                    <a href=" <?php echo $p["link"]; ?>" class="entry-play-list-all">
                        <span><i class="fa fa-play"></i> Phát tất cả</span>
                    </a>
                    <a href="<?php echo $p["link"]; ?>" class="entry-play-list">
                        <span class="play-list-text">
                            <?php echo $p["count"]; ?><br>Video<br>
                            <i class="fa fa-th"></i>
                        </span>
                    </a>
                </div>
                <h4 class="media-heading-title"><a href="<?php echo $p["link"]; ?>"><?php echo $p["name"]; ?></a></h4>
            </div>         
        <?php endforeach; ?>
    </div><!--end entry-content-->
    </div><!--End entroy-containet-->
    <div class="clearfix"></div>  
<?php endforeach; ?>
<?php }  ?>
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
        <?php if (isset($items_videos) && $items_videos){
            showplaylist($items_videos,"Video_playlist");
        } ?>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div class="google-adwords" style="margin-top: 15px">
        <div class="text-center">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/addword2.png" alt="Google AdWords" class="img-responsives"/>
        </div>
    </div>
    <div class="clearfix"></div>

</div>