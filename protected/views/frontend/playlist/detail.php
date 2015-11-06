<!--cbv-->
<div class="entry-container">
    <div class="entry-title">
        <div class="entry-title-text-left">
                <div class="entry-title-text-right">
                        <div class="entry-title-text-center">
                            <span><?php if(isset($items)) {echo $items[0]["name_list"];} ?></span>
                        </div>
                </div>
        </div>
    </div>
    <div class="entry-content">
        <?php if(isset($items) && isset($stt)) showVideos($stt,$items,$category); //hien thi video run playlist ?>
        
        <div class="hidden-sm hidden-xs><div class="clearfix"></div>
            <div class="col-md-4 no-padding">
            <div class="detail-video" id="scollbar">
                <div class="detail-title">
                    <h4>
                        <?php  if(isset($items)) {echo $items[0]["name_list"]." ".$items[0]["dem_video"]." Video";}
                        
                        ?>
                    </h4>
                </div>
                <div id="box" class="box">
                            <?php $i=0;  foreach ($items as $item): ?>
                            <div class="entry-recomment-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="<?php echo  Yii::app()->createUrl("playlist/detail/", array("id"=>$item['id_list'],"alias"=>$item['alias_list'],"stt"=>$i)); ?>">
                                        <img class="media-object" src="<?php echo $item['image'];?>" alt="<?php echo $item['title'];?>" width="150" height="80">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $item['title'];?></h4>
                                    <div class="entry-recomment-user hidden-lg hidden-md">
                                        <span class="entry-viewed">
                                            <span><img src="/images/app/eye.png"><?php echo $item['viewed'] ;?></span>
                                        </span>
                                        <span class="entry-like">
                                            <span><i class="fa fa-heart"></i> <?php echo isset($item['like']) ? $item['like'] : 0 ?></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <?php $i++; endforeach;?>
                </div>
            </div>
                    <div class="clearfix"></div>
        </div><!--lay list E hiden p-->

        <?php echo buildHtml::showSideBar(); ?><!--show right cbv-->
    </div><!--e entry-content-->
</div><!--E entry container-->


<?php function showVideos ($stt="0",$items=null,$category){ //ham hien thi video trong list 
  $i=0;  foreach ($items as $key=> $item):
  if($key == $stt): 
?>
<div class="col-md-8 no-padding-left padding-mb-2">
        <div class="detail embed-responsive embed-responsive-16by9">
            <?php  echo $c = show_video_playlist($items,$stt);?>
        </div>
        <div class="entry-caption">
            <a href="<?php echo $item["link"]; ?>"><h4 class="can_title_playlist_detail"><center><?php if(isset($item)) {echo $item["title"];} ?></center></h4></a>
            <div class="ds_playlist_detail">
                <h4>Category: 
                <div class="entry-user">
                    <div class="fb-social pull-left">
                        <div class="fb-like" data-href="<?php if(isset($item)) {echo $item["videourl"];} ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                    </div>
                    <div class="pull-right" style="margin-right: 15px;">
                        <div class="entry-recomment-user">
                            <span class="entry-viewed">
                                <span><img src="/images/app/eye.png"><?php echo isset($item['viewed']) ? $item['viewed'] : 0 ?></span>
                            </span>
                            <span class="entry-like">
                                <a href="javascript:void(0)" title="Thích" onclick="userLike(39)"><i class="fa fa-heart"></i></a><span class="like-data"><?php echo isset($item['like']) ? $item['like'] : 0 ?></span>
                            </span>
                        </div>    
                    </div>
                </div>
                </h4>
                        <ul>
                        <?php                           
                            foreach ($category as &$list){
                                echo "<li><a href='".$list['link_cat']."'><span>".$list['title']."</span></a> ".$list['dem_playlist']." Playlist</li>";
                            }
                        ?>
                        </ul>
            </div>
            
            <div class="clearfix"></div>
            <div class="entry-desc"> <p>Comment</p></div>
        </div>
        <div class="entry-container">
            <div class="entry-title">
                <div class="entry-title-text-left">
                    <div class="entry-title-text-right">
                            <div class="entry-title-text-center">
                                <span>Bình luận</span>
                            </div>
                    </div>
                </div>
            </div>
            <div class="entry-content">
                <div class="">
                    <div class="pull-right">
                        <h5 style="color: #ff0000; font-weight: bold;">
                            <i class="fa fa-warning"></i> <a class="btn-err" data-toggle="collapse" href="#collapseForm" aria-expanded="true" aria-controls="collapseForm" style="color: #ff0000">Báo lỗi VIDEO</a>
                        </h5>
                    </div>
                    <div id="collapseForm" class="form-err collapse" style="margin-bottom: 20px; height: 0px;" aria-expanded="false">
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
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>

        </div>

<?php endif; endforeach; }?>
