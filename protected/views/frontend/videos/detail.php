<!--cbv -->
<div class="entry-container">
    <div class="entry-title">
        <div class="entry-title-text-left">
            <div class="entry-title-text-right">
                    <div class="entry-title-text-center">
                        <a href=""><span><?php if(isset($items)) {echo $items["title"];} ?></span></a>
                    </div>
            </div>
        </div>
    </div>

    <div class="entry-content">
        <div class="col-md-8 no-padding-left padding-mb-2" style="margin-top: 12px;">
                <div class="detail embed-responsive embed-responsive-16by9" >
                    <img src="<?php echo $items['image']; ?>" style="width: 100%;" alt="<?php echo $items["title"];?>">
                    <?php echo show_video($items);  ?>
                </div>
                <div class="entry-caption">
                    <div class="entry-user">
                        <div class="fb-social pull-left">
                            <div class="fb-like" data-href="<?php if(isset($items)) {echo $items["videourl"];} ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                        </div>
                        <div class="pull-right" style="margin-right: 15px;">
                            <div class="entry-recomment-user">
                                <span class="entry-viewed">
                                    <span><img src="/images/app/eye.png"><?php echo isset($items['viewed']) ? $items['viewed'] : 0 ?></span>
                                </span>
                                <span class="entry-like">
                                    <a href="javascript:void(0)" title="Thích" onclick="userLike(39)"><i class="fa fa-heart"></i></a><span class="like-data"><?php echo isset($items['like']) ? $items['like'] : 0 ?></span>
                                </span>
                            </div>

                        </div>
                    </div>
                    <h4>Danh sách PlayList: </h4>
                    <div class="ds_playlist_detail"><ul>
                        <?php foreach ($playlist as $list){
                                echo "<li><a href='".$list['link']."'><span>".$list['name']."</span></a> ".$list['count']." Video</li>";
                        }?>
                     </ul></div>
                    
                    <div class="clearfix"></div>
                    <div class="entry-desc">
                        <p>Comment</p>
                    </div>
                </div>
                <div class="entry-container">
                    <div class="entry-title">
                        <div class="entry-title-text-left">
                            <div class="entry-title-text-right">
                                    <div class="entry-title-text-center"><span>Bình luận</span></div>
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
            
            <?php echo buildHtml::showSideBar(); ?><!--show right cbv-->
    </div><!--e  content-->
</div>
