
<div class="page-header">
    <h1><span class="text-left-sm">Video / </span><small>Tạo mới</small></h1>
    <small><a href="<?php echo $this->createUrl('videos/create') ?>">Tạo mới</a></small>
    <small><a href="javascript:void(0)" class="label label-success btn-upload">Upload</a></small>
    <div class="pull-right" style="margin-top: 35px;">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" class="btn-youtube" aria-controls="home" role="tab" data-toggle="tab">Youtube</a></li>
            <!--<li role="presentation"><a href="#upload" aria-controls="profile" class="btn-upload" role="tab" data-toggle="tab">Upload</a></li>-->
        </ul>
    </div>
</div>
<div class="clearfix"></div>
<div class="module row">
    <form action="" method="post" class="form-youtube">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading image">
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-10">
                            <input type="text" name="query" placeholder="Enter a youtube link" class="form-control fakelink" value="<?php echo isset($_GET['query']) ? $_GET['query'] : false ?><?php echo isset($item['fecth_link']) ? $item['fecth_link'] : false; ?>" />
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success btn-sm btn-getinfo"><i class="fa fa-refresh"></i> Get info</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php //if (isset($item) && $item): ?>
    <form action="<?php echo $this->createUrl('videos/addmedia') ?>" method="post">

        <input type="hidden" name="id" value="<?php echo isset($item['id']) ? $item['id'] : '' ?>"/>
        <input type="hidden" name="fecth_link" value="<?php echo isset($_GET['query']) ? $_GET['query'] : '' ?><?php echo isset($item['fecth_link']) ? $item['fecth_link'] : ''; ?>" class="txt-fecth_link"/>
        <input type="hidden" name="origin_link" value=""/>
        <input type="hidden" name="server" value="<?php echo isset($_GET['query']) ? 0 : 1 && isset($item['server']) && ($item['server'] == 0) ? 0 : 1; ?>"/>
        <div class="col-md-8">

            <div class="panel">
                <div class="panel-heading">
                    <span>Thông tin video</span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Tiêu đề</label>
                        <div>
                            <input type="text" class="input-sm form-control title-generate" name="title" value="<?php echo isset($item['title']) ? $item['title'] : '' ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Đường dẫn</label>
                        <div>
                            <input type="text" class="input-sm form-control alias-generate" name="alias" value="<?php echo isset($item['alias']) ? $item['alias'] : '' ?>"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group control-desc">
                        <label class="control-label">Mô tả</label>
                        <div>
                            <textarea name="info" rows="3" class="form-control txt-desc"><?php echo isset($item['info']) ? $item['info'] : '' ?></textarea>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <?php //if (isset($_GET['query']) && $_GET['query'] || isset($item['iframe']) && $item['iframe']): ?>
                        <div class="form-group control-iframe">
                            <label class="control-label">Iframe</label>
                            <div class="iframe-container">
                                <textarea name="iframe" rows="5" class="form-control txt-iframe"><iframe width="560" height="315" src="<?php echo isset($item['iframe']) ? $item['iframe'] : '' ?><?php echo isset($_GET['query']) ? $_GET['query'] : '' ?>" frameborder="0" allowfullscreen></iframe></textarea>
                            </div>
                        </div>
                    <?php //endif; ?>
                </div>
            </div>
            <div class="pannel pannel-upload" style="margin-bottom: 20px;">
                <div class="panel-heading " >
                    <span>Upload Video</span>
                    <div class="caption pull-right">
                        <a href="javascript:void(0)" class="label label-primary" role="button" onclick="BrowseServerVideo();">Upload video</a>
                    </div>
                </div>
                <div class="panel-body">
                    <input type="hidden" id="video_hiden" value="<?php echo isset($item['episode_url']) ? $item['episode_url'] : '' ?>"/>
                    <input type="text" name="origin_link" class="form-control" id="video-src" value="<?php echo isset($item['origin_link']) ? $item['origin_link'] : '' ?>" placeholder="Nhập đường dẫn hoặc đường dẫn tương đối">
                    <div class="pull-right" style="padding: 10px;">
                        <a href="" data-toggle="modal" data-target="#modalPreview" id="preview">Xem</a>
                    </div>
                </div>

            </div>
            <div class="panel">
                <div class="panel-heading">
                    <span>Set Meta</span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Meta key</label>
                        <div>
                            <input type="text" class="input-sm form-control" name="metakey" value="<?php echo isset($item['metakey']) ? $item['metakey'] : '' ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Meta Description</label>
                        <div>
                            <textarea class="form-control" name="metadesc" rows="3"><?php echo isset($item['metadesc']) ? $item['metadesc'] : '' ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <!--<button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i> Làm mới </button>-->
                        <button type="submit" class="btn btn-danger"><i class="fa fa-plus"></i><?php echo isset($item['id']) ? 'Thay đổi' : 'Thêm' ?>  </button>
                        <button type="submit" name="save_close" value="close" class="btn btn-success"><i class="fa fa-save"></i><?php echo isset($item['id']) ? 'Lưu & Thoát' : 'Thêm & Thoát' ?>  </button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group ">
                        <label class="control-label">Danh sách phát</label>
                        <div>
                            <select class="form-control" name="playlist">
                                <?php if (isset($playlists) && $playlists): ?>
                                    <option value="">Chọn Danh sách phát</option>
                                    <?php foreach ($playlists as $playlist): ?>
                                        <option value="<?php echo $playlist['id'] ?>" <?php echo isset($item['play_id']) && ($item['play_id'] == $playlist['id']) ? 'selected' : '' ?>><?php echo $playlist['name'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group catalog">
                        <label class="control-label">Danh mục</label>
                        <div>
                            <select class="category-select2" multiple="multiple" name="categories[]" style="width: 100%">
                                <?php if (isset($categories) && $categories): ?>

                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id'] ?>" <?php echo isset($item['play_id']) && ($item['play_id'] == $category['id']) ? 'selected' : '' ?>><?php echo $category['title'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-lable">Tags</label>
                        <div class="select2-primary">
                            <select class="tag-select2" name="tags[]" multiple="multiple" style="width: 100%">
                                <?php if (isset($tags) && $tags): ?>
                                    <?php foreach ($tags as $tag): ?>
                                        <option value="<?php echo $tag['id'] ?>"><?php echo $tag['name'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label">Trạng thái</label>
                        <div>
                            <select name="status" class="form-control">
                                <option value="1">Hiển thị</option>
                                <option value="0">Không hiển thị</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label">Tùy chọn cài đặt</label>
                        <div class="checkbox">
                            <label>
                                <input type="radio" name="auto" value="1"> Tự động phát
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="radio" name="auto" value="0"> Không phát tự động
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="panel panel-image">
                <div class="panel-heading image">
                    <span>Image</span>
                    <div class="caption pull-right">
                        <a href="javascript:void(0)" class="label label-primary" role="button" onclick="BrowseServer();">Thêm hình ảnh</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">

                        <input type="hidden" name="image" id="image_hiden" value="<?php echo isset($item['image']) ? $item['image'] : '' ?>"/>

                        <div class="drapzon">
                            <div class="col-md-12 container-thumbnail">
                                <div class="thumbnail">
                                    <img src="<?php echo isset($item['image']) ? $item['image'] : '' ?>" alt="" id="image_src" style="height:190px;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($item['fecth_link']) && $item['fecth_link']): ?>
                <div class="panel panel-image">
                    <div class="panel-heading image">
                        <span>Priview</span>

                    </div>
                    <div class="panel-body">
                        <div class="form-group">

                            <div class="drapzon">
                                <div class="col-md-12 container-thumbnail">
                                    <iframe width="420" height="315" src="<?php echo $item['fecth_link'] ?>" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="clearfix"></div>
    </form>
    <?php // endif; ?>
</div>
<?php
$_tags = array();
if (isset($item) && $item) {
    if (isset($item['tags']) && $item['tags']) {
        foreach ($item['tags'] as $val) {
            $_tags[] = $val['id'];
        }
    }
}
$_categories = array();
if (isset($item) && $item) {
    if (isset($item['categories']) && $item['categories']) {
        foreach ($item['categories'] as $val) {
            $_categories[] = $val['id'];
        }
    }
}
?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/admin/templates/standard/assets/js/select2.js"></script>
<script type="text/javascript">
                            $(function () {
                                $(".tag-select2").select2({
                                    theme: "bootstrap",
                                }).select2('val',<?php echo json_encode($_tags); ?>);
                                $(".category-select2").select2({
                                    theme: "bootstrap",
                                }).select2('val',<?php echo json_encode($_categories); ?>);
                            });

</script>

<!-- Modal -->
<div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" aria-labelledby="modalPreview" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Xem nhanh</h4>
            </div>
            <div class="modal-body">
                <div id="player">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Xem xong</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jwplayer/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key = "Il334Pdk5OF2EBrjO5LrSA/ZK7qdYC/nL80QExPiIxoQ96iqPROaAEye70E=";</script>
<script type="text/javascript">
    $(function () {
        $('#preview').click(function () {
            var url = $('#video-src').val();

            jwplayer("player").setup({
                width: "100%",
                height: "350px",
                aspectratio: "12:7",
                file: url
            });
        });

    });
</script>