<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fnVDShowSideBar() {//sitebar-for-playlist-default

    function db_video_right($dieukien,$limit) {
        global $mainframe, $db;
        $query = "SELECT * FROM {{videos}} WHERE " . $dieukien . " ORDER BY viewed DESC LIMIT ".$limit." ";
        $query_command = $db->createCommand($query);
        $items = $query_command->queryAll();
        if (count($items)) {
            foreach ($items as &$item) {
                $item['link'] = Yii::app()->createUrl("videos/detail", array("id" => $item['id'], "alias" => $item['alias']));
            }
        }
        return $items;
    }

    function show_video_right($bien_video, $title_video_right) {
        if (isset($bien_video) && $bien_video) {
            ?>
            <div class="entry-container">
                <?php if(count($bien_video)>1){?>
                <div class="google-adwords hidden-md hidden-sm hidden-xs">
                        <div class="qc-bar-right">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/qc-bar-playlist.png" alt="Google AdWords" class="img-responsives"/>
                        </div>
                </div>
                 <?php }?>
                <div class="tit-bar">
                    <div class="entry-title">

                        <div class="entry-title-text-left-bar">
                            <div class="entry-title-text-right-bar">
                                <div class="entry-title-text-center-bar">
                                    <span><?php echo $title_video_right; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="entry-content hot-video">    
                    
                    <?php
                    $index = 0;
                    foreach ($bien_video as $video){
                        if ($index == 0) {?>   
                            <div class="embed-responsive embed-responsive-16by9">
                                <div class="fix-video-side-bar">
                                <?php echo show_video($video, "308", "210"); ?>
                                </div>
                            </div>
                        <?php }
                        if(count($bien_video)>1){
                        ?>
                        <div class="item">
                            <div class="caption entry-recomment-item-site-bar">
                                <a href="<?php echo $video['link']; ?>"><h4><?php echo $video['title']; ?></h4></a>
                            </div>
                            <a href="#" class="content-author-bar-right">Bởi: Nursery Rhymes TV</a>
                            <div class="entry-recomment-user">
                                <span class="entry-viewed">
                                    <span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/eye.png" alt="<?php echo $video['title']; ?>"><?php echo isset($video['viewed']) ? $video['viewed'] : 0 ?></span>
                                </span>
                                <span class="entry-like">
                                    <span><i class="fa fa-heart"></i> <?php echo isset($video['like']) ? $video['like'] : 0 ?></span>
                                </span>
                            </div>
                        </div>
                        <?php $index ++; 
                        }
                        ?>
                <?php }; ?>
                </div>
            </div>
            <?php
        }
    }
    ?>
<?php function Show_video_hot($video_hots,$title){?>
    <div class="entry-container">
        <div class="tit-bar">
        <div class="entry-title">
            <div class="entry-title-text-left-bar">
                <div class="entry-title-text-right-bar">
                    <div class="entry-title-text-center-bar">
                        <span><?php echo $title; ?></span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="entry-content hot-video">
            <div class="embed-responsive embed-responsive-16by9">
                <div class="fix-video-side-bar">
                <?php  echo show_video($video_hots, "308", "210"); ?>
                </div>
            </div>
        </div>
    </div>
<?php }?>
    <div class="col-md-4 no-padding-right sidebar padding-mb-2">
        <div class="row-fuild"><!--show sitebar-->
            <?php
            $video_week = db_video_right("hotweek=1",$limit=3);
            show_video_right($video_week, "Video Hot");
            
            function db_video_rightb($dieukien,$limit) {
                global $mainframe, $db;
                $query = "SELECT * FROM {{videos}} WHERE " . $dieukien . " LIMIT ".$limit." ";
                $query_command = $db->createCommand($query);
                $items = $query_command->queryRow();
                $items['link'] = Yii::app()->createUrl("videos/detail", array("id" => $items['id'], "alias" => $items['alias']));
                return $items;
            }
            $video_hots = db_video_rightb("feature=1",$limit=1);
            Show_video_hot($video_hots,"Video Mới"); 
            ?>
            <div class="clearfix"></div>
        </div><!--end row fuit-->
    </div><!--end main container-->
            
    <?php
            
}
function fnVDShowSideBar_detail_Playlist() {//show-site-bar-for-playlist-detail

    function db_video_right_2($dieukien,$limit) {
        global $mainframe, $db;
        $query = "SELECT * FROM {{videos}} WHERE " . $dieukien . " ORDER BY viewed DESC LIMIT ".$limit." ";
        $query_command = $db->createCommand($query);
        $items = $query_command->queryAll();
        if (count($items)) {
            foreach ($items as &$item) {
                $item['link'] = Yii::app()->createUrl("videos/detail", array("id" => $item['id'], "alias" => $item['alias']));
            }
        }
        return $items;
    }
    function show_video_right_2($bien_video, $title_video_right) {
            if (isset($bien_video) && $bien_video) {
                ?>
                <div class="entry-container">
                    <div class="tit-bar">
                    <div class="entry-title">
                        <div class="entry-title-text-left-bar">
                            <div class="entry-title-text-right-bar">
                                <div class="entry-title-text-center-bar">
                                    <span><?php echo $title_video_right; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="entry-content hot-video">    

                        <?php
                        $index = 0;
                        foreach ($bien_video as $video){
                            if ($index == 0) {?>   
                                <div class="embed-responsive embed-responsive-16by9">
                                    <div class="fix-video-side-bar">
                                        <?php echo show_video($video, "308", "210"); ?>
                                    </div>
                                </div>
                            <?php }
                            if(count($bien_video)>1){
                            ?>
                            <div class="item">
                                <div class="caption entry-recomment-item-site-bar">
                                    <a href="<?php echo $video['link']; ?>"><h4><?php echo $video['title']; ?></h4></a>
                                </div>
                                <a href="#" class="content-author-bar-right">Bởi: Nursery Rhymes TV</a>
                                <div class="entry-recomment-user">
                                    <span class="entry-viewed">
                                        <span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/eye.png" alt="<?php echo $video['title']; ?>"><?php echo isset($video['viewed']) ? $video['viewed'] : 0 ?></span>
                                    </span>
                                    <span class="entry-like">
                                        <span><i class="fa fa-heart"></i> <?php echo isset($video['like']) ? $video['like'] : 0 ?></span>
                                    </span>
                                </div>
                            </div>
                            <?php $index ++; 
                            }
                            ?>
                    <?php }; ?>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    <?php function Show_video_hot_2($video_hots,$title){?>
        <div class="entry-container">
            <div class="tit-bar">
            <div class="entry-title">
                <div class="entry-title-text-left-bar">
                    <div class="entry-title-text-right-bar">
                        <div class="entry-title-text-center-bar">
                            <span><?php echo $title; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="entry-content hot-video">
                <div class="embed-responsive embed-responsive-16by9">
                    <div class="fix-video-side-bar">
                        <?php  echo show_video($video_hots, "308", "210"); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
    <?php function Show_playlist_hot_2($playlist_hots,$title){?>
        <div class="entry-container">
            <div class="tit-bar">
            <div class="entry-title">
                <div class="entry-title-text-left-bar">
                    <div class="entry-title-text-right-bar">
                        <div class="entry-title-text-center-bar">
                            <span><?php echo $title; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="entry-content hot-video">
                <div class="embed-responsive embed-responsive-16by9">
                    <img src="<?php echo $playlist_hots["thumbnail"]; ?>" class="img-responsive" alt="<?php echo $playlist_hots["name"];?>">
                    <a href="<?php echo $item_link = Yii::app()->createUrl("playlist/detail/", array("id"=>$playlist_hots['id'],"alias"=>$playlist_hots['alias'])); ?>" class="entry-play-list-all">
                        <span><i class="fa fa-play" ></i> Phát tất cả</span>
                    </a>
                    <a href="<?php echo $item_link;?>" class="entry-play-list">
                        <span class="play-list-text">
                            <?php echo $playlist_hots["dem_video"]; ?><br>Video<br>
                            <i class="fa fa-th"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    <?php }?>
    <div class="col-md-4 no-padding-right sidebar padding-mb-2">
        <div class="row-fuild">
            <?php
            //show video hotweek
            $video_week = db_video_right_2("hotweek=1",$limit=3);
            show_video_right_2($video_week, "Video Hot Trong Tuần");
            
            //show playlist new
           function getItems_playlist_new()
                {
               $command = Yii::app()->db->createCommand();
               $item_p = $command->select('*')->from(TBL_PLAYLIST)
                ->order("id DESC")
                ->limit("1")
                ->queryRow();
               $id=$item_p['id'];
                $command = Yii::app()->db->createCommand();
                    $item = $command->select('a.*')
                        ->from(TBL_VIDEOS ." a")                
                        ->leftjoin(TBL_PLAYLIST_XREF ." b", 'a.id=b.videoID')
                        ->leftjoin(TBL_PLAYLIST ." c", 'c.id=b.playlistID')
                        ->where("b.playlistID=$id")
                        ->queryAll();
                 $item_p['dem_video']=count($item);    
                        return $item_p;
                }
            $item_playlist_new=  getItems_playlist_new();
            Show_playlist_hot_2($item_playlist_new,"Playlist Mới"); 
            //end show playlist moi
            function db_video_rightb_2($dieukien,$limit) {
                global $mainframe, $db;
                $query = "SELECT * FROM {{videos}} WHERE " . $dieukien . " LIMIT ".$limit." ";
                $query_command = $db->createCommand($query);
                $items = $query_command->queryRow();
                $items['link'] = Yii::app()->createUrl("videos/detail", array("id" => $items['id'], "alias" => $items['alias']));
                return $items;
            }
            
            //show video moi
            $video_hots = db_video_rightb_2("feature=1",$limit=1);
            Show_video_hot_2($video_hots,"Video Mới"); 
            
            ?>
            <div class="clearfix"></div>
        </div><!--end row fuit-->
    </div><!--end main container-->
            
    <?php
            
}
