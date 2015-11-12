<div class="entry-container">
    <div class="entry-title">
        <div class="entry-title-text-left">
            <div class="entry-title-text-right">
                    <div class="entry-title-text-center">
                        <a href="<?php echo $item = Yii::app()->createUrl("playlist"); ?>"><span>Danh sách Playlist</span></a>
                    </div>
            </div>
        </div>
    </div>
    <?php if(count($allPlaylist)<=0) return false;?>
    <div class="entry-content">
        <div class="col-md-8 no-padding-left-playlist padding-mb-2 hidden-md hidden-sm hidden-xs">
        <?php foreach ($allPlaylist as $key=>$p): ?>
            <div class="col-md-4 play-list-item no-padding-left " >
                <div class="embed-responsive embed-responsive-16by9">
                    <img src="<?php echo $p["thumbnail"]; ?>" class="img-responsive" alt="<?php echo $p["name"];?>">
                    <a href="<?php echo $item_link = Yii::app()->createUrl("playlist/detail/", array("id"=>$p['id'],"alias"=>$p['alias'])); ?>" class="entry-play-list-all">
                        <span><i class="fa fa-play" ></i> Phát tất cả</span>
                    </a>
                    <a href="<?php echo $item_link;?>" class="entry-play-list">
                        <span class="play-list-text">
                            <?php echo $p["status"]; ?><br>Video<br>
                            <i class="fa fa-th"></i>
                        </span>
                    </a>
                </div>
                <h4 class="media-heading-title">
                    <a href="<?php echo $item = Yii::app()->createUrl("playlist/detail/", array("id"=>$p['id'],"alias"=>$p['alias'])); ?>"><?php echo $p["name"]; ?></a>
                </h4>
            </div>
                    
        <?php  endforeach; ?>
            <div class="clearfix"></div>
            <div class="text-center">
                    <div class="pull-right-">
                        <?php if(isset($_GET['q'])) {$q=$_GET['q'];}  else {$q=NULL;}
                        echo buildHtml::pagination($total, isset($_GET['limitstart']) ? $_GET['limitstart'] : 0,5,$q) ?>
                    </div>
            </div>
        </div>
        <div class="col-md-12 no-padding-left padding-mb-2 hidden-lg">
            <?php foreach ($allPlaylist as $key=>$p): ?>
                <div class="<?php if($key%2==0){echo "col-md-6 col-sm-6 col-xs-6 play-list-item no-padding-left-home";}else echo "col-md-6 col-sm-6 play-list-item col-xs-6 no-padding-right";?>">
                    <div class="embed-responsive embed-responsive-16by9">
                        <img src="<?php echo $p["thumbnail"]; ?>"  class="img-responsive" alt="<?php echo $p["name"];?>">
                        <a href=" <?php echo $item_link = Yii::app()->createUrl("playlist/detail/", array("id"=>$p['id'],"alias"=>$p['alias'])); ?>" class="entry-play-list-all">
                            <span><i class="fa fa-play"></i> Phát tất cả</span>
                        </a>
                        <a href="<?php echo $item_link; ?>" class="entry-play-list">
                            <span class="play-list-text">
                                <?php echo  $p["status"]; ?><br>Video<br>
                                <i class="fa fa-th"></i>
                            </span>
                        </a>
                    </div>
                    <h4 class="media-heading-title">
                        <a href="<?php echo $item = Yii::app()->createUrl("playlist/detail/", array("id"=>$p['id'],"alias"=>$p['alias'])); ?>">
                            <?php echo $p["name"]; ?>
                        </a>
                    </h4>
                </div>  
            <?php endforeach; ?>
            <div class="clearfix"></div>
            <div class="text-center">
                    <div class="pull-right-">
                        <?php if(isset($_GET['q'])) {$q=$_GET['q'];}  else {$q=NULL;}
                        echo buildHtml::pagination($total, isset($_GET['limitstart']) ? $_GET['limitstart'] : 0,5,$q) ?>
                    </div>
            </div>
        </div>
        
        <?php echo fnVDShowSideBar(); ?><!--show right cbv-->
    </div><!--end entry-content-->   
            
</div><!--End entroy-containet-->

       


