<!--cbv -->
<div class="entry-container">
    <div class="entry-title">
        <div class="entry-title-text-left">
            <div class="entry-title-text-right">
                    <div class="entry-title-text-center">
                        <a href=""><span><?php if(isset($item)) {echo $item->title;} ?></span></a>
                    </div>
            </div>
        </div>
    </div>

    <div class="entry-content">
        <div class="col-md-8 no-padding-left padding-mb-2">
                <div class="detail embed-responsive embed-responsive-16by9" >
                    <?php  if( $item->videocode!=null){
                            ?>
                        <img src="<?php echo $item->image; ?>" class="img-responsive" alt="<?php echo$item->title;?>">
                    <?php } if(isset($item))echo show_video($item,"632","355"); 
                    
                    ?>
                    <script>
                        var linkvdsvvb = "<?php echo $item->_link_view;?>";
                        var linkvdslvb = "<?php echo $item->_link_like;?>";
                    </script>
                </div>
                <div class="entry-caption">
                    <div class="entry-user">
                        <div class="fb-social pull-left">
                            <div class="fb-like" data-href="<?php echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                        </div>
                        <div class="pull-right" style="margin-right: 15px;">
                            <div class="entry-recomment-user">
                                <span class="entry-viewed">
                                    <img src="/images/app/eye.png">
                                    <span><?php echo isset($item->viewed) ? $item->viewed : 0 ?></span>
                                </span>
                                <span class="entry-like">
                                    <a href="javascript:void(0)" title="Thích" onclick="userLike(39)">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                    <span class="like-data"><?php echo isset($item->like) ? $item->like : 0 ?></span>
                                </span>
                            </div>

                        </div>
                    </div><br />
                    <h4>Danh sách PlayList: </h4>
                    <div class="ds_playlist_detail"><ul>
                        <?php foreach ($playlist as $list){
                                echo "<li><a href='".$list['link']."'><span>".$list['name']."</span></a> ".$list['count']." Video</li>";
                        }?>
                     </ul></div>
                    
                    <div class="clearfix"></div>
                  
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
                            <div class="clearfix"></div>
                            <div class="hidden-md hidden-sm hidden-sm hidden-xs">
                                <div class="fb-comments" data-href="<?php echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" data-width="620" data-numposts="3"></div>
                            </div>     
                            <div class="hidden-lg">
                                <div class="fb-comments" data-href="<?php echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" data-width="350" data-numposts="3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            
            <?php echo fnVDShowSideBar(); ?><!--show right cbv-->
    </div><!--e  content-->
</div>
