<!--cbv-->
<div class="entry-container">
    <div class="entry-title">
        <div class="entry-title-text-left">
            <div class="entry-title-text-right">
                <div class="entry-title-text-center">
                    <span><?php
                        if (isset($getPlaylist)) {
                            echo $getPlaylist["name"];
                        }
                        ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="entry-content">
        <?php if (isset($items) && isset($stt)) showVideos($stt, $items, $category,$getPlaylist); //hien thi video run playlist   ?>
        <div class="col-md-4 no-padding">
            <div class="detail-video" >
                <div class="detail-title">
                    <h4><?php
                        if (isset($getPlaylist)) {
                            echo $getPlaylist["name"] . " " . $items[0]["dem_video"] . " Video";
                        }
                        ?></h4>
                </div>
                <div id="box" class="box pl-list-video">

                    <?php
                    $i = 0;
                    foreach ($items as $item):
                        ?>
                        <div class=" entry-recomment-item-playlist <?php if ($stt == $i) echo "stt_active"; ?>">
                            <a href="<?php echo Yii::app()->createUrl("playlist/detail/", array("id" => $item['id_list'], "alias" => $item['alias_list'], "stt" => $i)); ?>">
                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>">
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading-title-playlist"><?php echo $item['title']; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                        $i++;
                    endforeach;
                    ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div><!--end col danh sach playlist-->
        <div class="entry-title hidden-lg">
                <div class="entry-title-text-left">
                    <div class="entry-title-text-right">
                        <div class="entry-title-text-center">
                            <span>Bình luận</span>
                        </div>
                    </div>
                </div>
            </div>
        <div class="hidden-lg">
            <div class="fb-comments" data-href="<?php echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" data-width="350"  data-numposts="1"></div>
        </div>
        <?php echo fnVDShowSideBar_detail_Playlist(); ?><!--show right cbv-->
    </div><!--e entry-content-->
</div><!--E entry container-->
<?php
function showVideos($stt = "0", $items = null, $category,$getPlaylist) { //ham hien thi video trong list 
    $i = 0;
    foreach ($items as $key => $item):
    if ($key == $stt):
        ?>
    <div class="col-md-8 no-padding-left padding-mb-2">
        <div class="detail embed-responsive embed-responsive-16by9">
    <?php echo $c = show_video_playlist($items, $stt); ?>
             <script>
                var linkvdsvvb = "<?php echo Yii::app()->createUrl("videos/setview", array("id"=>$item["id"]));?>";
                var linkvdslvb = "<?php echo Yii::app()->createUrl("videos/likevideo", array("id"=>$item["id"])); ?>";
            </script>
        </div>
        <div class="entry-caption">
                <h4 class="can_title_playlist_detail">
                    <a href="<?php echo $item["link"]; ?>">
                        <?php echo $item["title"];  ?>
                    </a>
                </h4>
            <div class="ds_playlist_detail">
                <div class="entry-user">
                    <div class="fb-social pull-left">
                        <div class="fb-like" data-href="<?php if(isset($item["videourl"])) {echo $item["videourl"] ;} ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                    </div>
                    <div class="pull-right">
                        <div class="entry-recomment-user">
                            <span class="entry-viewed">
                                <img src="/images/app/eye.png">
                                <span><?php echo isset($item["viewed"]) ? $item["viewed"] : 0 ?></span>
                            </span>
                            <span class="entry-like">
                                <a href="javascript:void(0)" title="Thích">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <span class="like-data"><?php echo isset($item["like"]) ? $item["like"] : 0 ?></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div><br />
                <h4>Chuyên mục:</h4>
                <ol class="breadcrumb">
                    <?php
                    foreach ($category as &$list) {
                        echo "<li><a href='" . $list['link_cat'] . "'><span>" . $list['title'] . "</span></a> " . $list['dem_playlist'] . " Playlist</li>";
                    }
                    ?>
                </ol>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="entry-container">
            <div class="entry-title hidden-md hidden-sm hidden-xs">
                <div class="entry-title-text-left">
                    <div class="entry-title-text-right">
                        <div class="entry-title-text-center">
                            <span>Bình luận</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="entry-content">
                
                    <div class="pull-right">
                        <h5 style="color: #ff0000; font-weight: bold;">
                            <i class="fa fa-warning"></i> <a class="btn-err" data-toggle="collapse" href="#collapseForm" aria-expanded="true" aria-controls="collapseForm" style="color: #ff0000">Báo lỗi VIDEO</a>
                        </h5>
                    </div>
                    <div id="collapseForm" class="form-err collapse" aria-expanded="false">
                        <form action="" method="post" id="formErr">
                            <input type="hidden" name="vid" value="42">
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
                    <div class="hidden-md hidden-sm hidden-sm hidden-xs">
                        <div class="fb-comments" data-href="<?php echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" data-width="620" data-numposts="5"></div>
                    </div>
                    
            </div>
        </div>
    </div>
<?php
        endif;
endforeach;
}
?>
