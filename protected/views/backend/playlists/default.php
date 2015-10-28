<?php
$_categories = array();
if (isset($item['categories']) && $item['categories']) {
    if (isset($item['categories']) && $item['categories']) {
        foreach ($item['categories'] as $val) {
            $_categories[] = $val['cat_id'];
        }
    }
}
?>

<div class="row">
    <div class="col-md-12"><h1>Danh sách Phát</h1></div>
    <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12">
        <div class="panel panel-primary">
            <div class="panel panel-heading">
                <span>Biểu mẫu</span>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->createUrl('playlists/add'); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo isset($item['id']) ? $item['id'] : '' ?>"/>
                    <div class="form-group">
                        <label class="control-label">Tên (*)</label>
                        <div >
                            <input type="text" name="name" class="form-control title-generate" value="<?php echo isset($item['name']) ? $item['name'] : '' ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"> Alias (*)</label>
                        <div >
                            <input type="text" name="alias" class="form-control alias-generate" value="<?php echo isset($item['alias']) ? $item['alias'] : '' ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"> Danh mục (*)</label>
                        <div >
                            <select class="category-select2" name="categories[]" multiple="" style="width: 100%;">
                                <?php if (isset($categories) && $categories): ?>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Trạng thái (*)</label>
                        <div >
                            <select name="status" class="form-control">
                                <option value="1" <?php echo isset($item['status']) && ($item['status'] == 1) ? 'selected' : '' ?>>Đăng</option>
                                <option value="0" <?php echo isset($item['status']) && ($item['status'] == 0) ? 'selected' : '' ?>>Đóng</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"> Metakey</label>
                        <div>
                            <input type="text" name="metakey" class="form-control" value="<?php echo isset($item['metakey']) ? $item['metakey'] : '' ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"> Meta Description</label>
                        <div>
                            <textarea name="metadesc" class="form-control" rows="3"><?php echo isset($item['metadesc']) ? $item['metadesc'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="active" value="1" <?php echo isset($item['metadesc']) ? 'checked' : '' ?>>Hiển Thị Menu
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i>  Làm mới</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>  <?php echo isset($item['id']) ? 'Publish' : 'Publish'; ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <form name="adminForm" method="post" action="">
        <div class="col-lg-8 col-md-6 col-xs-12 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel panel-heading">
                    <span><i class="fa fa-bars"></i>Danh sách nhóm</span>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="width: 40%">Tên</th>
                                <th>Hiển thị menu</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($playlists) && $playlists): ?>
                                <?php $i = 1; ?>
                                <?php foreach ($playlists as $item): ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><a href="<?php echo $this->createUrl('../playlist?pid='.$item['id'].'&pslug='.$item['alias']) ?>" target="_blank"><?php echo $item['name']; ?></a></td>
                                        <td><a href="?active=<?php echo ($item['active']==1)?'2':'1' ?>&id=<?php echo $item['id'] ?>"><?php echo ($item['active']==1)?'Hiển thị':'Không' ?></a></td>
                                        <td>
                                            <a href="<?php echo $this->createUrl('/playlists?id=' . $item['id']) ?>" role="edit"><i class="fa fa-edit"> Sửa</i></a>
                                            ||
                                            <a href="<?php echo $this->createUrl('/playlists/delete?id=' . $item['id']) ?>"><i class="fa fa-times"></i> Xóa</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3">
                                        <h3 class="text-center">Chưa có dữ liệu</h3>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                    <tfoot>
                        <?php //echo buildHtml::pagination($total, isset($_GET['limitstart']) ? $_GET['limitstart'] : 0)  ?>
                    </tfoot>
                </div>
            </div>
        </div>
        <input type="hidden" value="0" name="boxchecked">
        <input type="hidden" value="" name="filter_order">
        <input type="hidden" value="5" name="limitstart" >
        <input type="hidden" value="" name="filter_order_Dir">
        <input type="hidden" value="" name="task" />

    </form>
</div>


<script src="<?php echo Yii::app()->request->baseUrl; ?>/admin/templates/standard/assets/js/select2.js"></script>
<script type="text/javascript">
    $(function () {
        $(".category-select2").select2({
            theme: "bootstrap",
        }).select2('val',<?php echo json_encode($_categories); ?>);
    });

</script>