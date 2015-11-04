<form name="adminForm" method="get" action="">
    <div class="detail-app" style="margin-bottom: 30px;">
        <div class="row-fuild">
            <div class="col-md-8">
                <div class="row">
                    <div class="entry-container">
                        <div class="entry-title">
                            <div class="entry-title-text">
                                <span><?php echo isset($_GET['q']) ? 'Từ khóa ' . $_GET['q'] : 'Danh sách video' ?></span>
                            </div>
                        </div>
                        <div class="entry-content">
                            <?php if (isset($videos) && $videos): ?>
                                <?php foreach ($videos as $video):  ?>
                                    <div class="entry-recomment-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="<?php echo $url= Yii::app()->createUrl("videos/detail/", array("id"=>$video['id'],"alias"=>$video['alias']));?>">
                                                    <img class="media-object" src="<?php echo $video['image'] ?>" alt="<?php echo $video['title'] ?>" width="150" height="80">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <a href="<?php echo  $url= Yii::app()->createUrl("videos/detail/", array("id"=>$video['id'],"alias"=>$video['alias'])); ?>"><h4 class="media-heading"><?php echo $video['title'] ?></h4></a>
                                                <div class="entry-recomment">
                                                    bởi <a href="#">Nursery Rhymes TV</a>
                                                    <div class="entry-recomment-user">
                                                        <span class="entry-viewed">
                                                            <span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/eye.png"><?php echo isset($video['viewed']) ? $video['viewed'] : 0 ?></span>
                                                        </span>
                                                        <span class="entry-like">
                                                            <span><i class="fa fa-heart"></i> <?php echo isset($video['like']) ? $video['like'] : 0 ?></span>
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
                    <div class="text-center">
                        <div class="pull-right-">
                            <?php echo buildHtml::pagination($total, isset($_GET['limitstart']) ? $_GET['limitstart'] : 0) ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo buildHtml::showSideBar(); ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <input type="hidden" value="0" name="boxchecked">
    <input type="hidden" value="" name="filter_order">
    <input type="hidden" value="5" name="limitstart" >
    <input type="hidden" value="" name="filter_order_Dir">
    <input type="hidden" value="" name="task" />
</form>