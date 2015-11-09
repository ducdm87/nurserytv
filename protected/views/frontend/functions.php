<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fnVDShowSideBar() {

    function db_video_right($dieukien) {
        global $mainframe, $db;
        $query = "SELECT * FROM {{videos}} WHERE " . $dieukien . " ORDER BY viewed DESC LIMIT 3 ";
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
                <div class="entry-title">
                    <div class="entry-title-text-left">
                        <div class="entry-title-text-right">
                            <div class="entry-title-text-center">
                                <span><?php echo $title_video_right; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="entry-content hot-video" style="position: relative">                     
                    <?php
                    $index = 0;
                    foreach ($bien_video as $video):
                        if ($index == 0) {?>   
                            <div class="embed-responsive embed-responsive-16by9">
                                <?php if ($video['videocode'] != null) { ?>
                                    <img src="<?php echo $video["image"]; ?>" class="img-responsive" alt="<?php echo $video["title"]; ?>">
                            <?php } echo show_video($video, "304", "200"); ?>
                            </div>
                        <?php } ?>
                        <div class="item">
                            <div class="caption entry-recomment-item">
                                <a href="<?php echo $video['link']; ?>"><h4><?php echo $video['title']; ?></h4></a>
                            </div>
                            <div class="entry-recomment-user">
                                <a href="<?php echo $video['link']; ?>"><img src="<?php echo $video['image']; ?>" class="img-right_small" alt="<?php echo $video['title']; ?>"></a>
                                <span class="entry-viewed">
                                    <span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/eye.png" alt="<?php echo $video['title']; ?>"><?php echo isset($video['viewed']) ? $video['viewed'] : 0 ?></span>
                                </span>
                                <span class="entry-like">
                                    <span><i class="fa fa-heart"></i> <?php echo isset($video['like']) ? $video['like'] : 0 ?></span>
                                </span>
                            </div>
                        </div>
                        <?php $index ++; ?>
            <?php endforeach; ?>
                </div>
            </div>
            <?php
        }
    }
    ?>
    <div class="col-md-4 no-padding-right sidebar padding-mb-2">
        <div class="row-fuild">
            <?php
            $video_hots = db_video_right("feature=1");
            $video_week = db_video_right("hotweek=1");
            ?>
            <?php
            //show_video_right($video_hots,"Video Nổi Bật"); 
            show_video_right($video_week, "Video Hot Trong Tuần");
            ?>
        </div><!--end row fuit-->
    </div><!--end main container-->
    <?php
}
