<!--chinhbv Đang làm detail cho video-->
<div class="clearfix"></div>
    <div class="detail-app">
        <div class="row-fuild">
            <div class="col-md-8">
                <div class="row">
                    <div class="entry-container">
                        <div class="entry-title">
                            <div class="entry-title-text">
                                <span><?php if(isset($category)) {echo $category["title"];} ?></span>
                            </div>
                        </div>
                        <?php //foreach ($items as $item): ?>
                        <div class="detail embed-responsive embed-responsive-16by9" >
                            <iframe class="embed-responsive-item" src="<?php if(isset($items)) {echo $items["videourl"];} ?>" allowfullscreen=""></iframe>
                        </div>
                        
                        <div class="entry-caption">
                            <a href=""><h4><?php if(isset($items)) {echo $items["title"];} ?></h4></a>
                            <div class="entry-user">
                                <div class="fb-social pull-left">
                                    <div class="fb-like" data-href="<?php if(isset($items)) {echo $items["videourl"];} ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                                </div>
                                <div class="pull-right" style="margin-right: 15px;">
                                    <div class="entry-recomment-user">
                                        <span class="entry-viewed">
                                            <span><img src="/images/app/eye.png">28</span>
                                        </span>
                                        <span class="entry-like">
                                            <a href="javascript:void(0)" title="Thích" onclick="userLike(39)"><i class="fa fa-heart"></i></a><span class="like-data"> 0</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="entry-desc">
                                <p>asdasdasdas</p>
                            </div>
                        </div>
                        <?php //endforeach;?>
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
                                            <i class="fa fa-warning"></i> <a class="btn-err" data-toggle="collapse" href="#collapseForm" aria-expanded="true" aria-controls="collapseForm" style="color: #ff0000">Báo lỗi VIDEO</a>
                                        </h5>
                                    </div>
                                    <div id="collapseForm" class="form-err collapse in" style="margin-bottom: 20px;" aria-expanded="true">
                                        <form action="" method="post" id="formErr">
                                            <input type="hidden" name="vid" value="40">
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
                                        <div class="fb-comments" data-href="http://192.168.1.12:83/playlist/detail?pid=5&amp;pslug=&amp;vid=40&amp;vslug=animals-in-the-ocean-nursery-rhymes-tv.-toddler-kindergarten-preschool-baby-songs." data-version="v2.3" data-width="100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo buildHtml::showSideBar(); ?><!--show right-->
        </div>
    </div>
    <div class="clearfix"></div>
    <input type="hidden" value="0" name="boxchecked">
    <input type="hidden" value="" name="filter_order">
    <input type="hidden" value="5" name="limitstart" >
    <input type="hidden" value="" name="filter_order_Dir">
    <input type="hidden" value="" name="task" />
