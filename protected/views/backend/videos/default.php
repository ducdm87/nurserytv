<form name="adminForm" method="get" action="">
    <div class="row">
        <h1 class="page-header">Videos</h1>

        <div class="panel panel-primary">
            <div class="panel panel-heading">
                <span><i class="fa fa-bars"></i> Danh sách video</span>
            </div>
            <div class="panel-body">
                <div class="">
                    <!--<a href="" class="btn btn-primary" data-toggle="modal" data-target="#uploadExtention"><i class="fa fa-cog"></i> Upload</a>-->
                    <a href="<?php echo $this->createUrl('videos/create') ?>" class="btn btn-danger pull-right btn-sm"><i class="fa fa-plus"></i>Thêm mới</a>
                </div>
                <br/>
                <div class="table-resposive" style="margin-top: 20px;">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tiêu Đề</th>
                                <th>Mô tả</th>
                                <th>Nhóm</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($films) && $films): ?>
                                <?php $i = 1; ?>
                                <?php foreach ($films as $film): ?>
                                    <tr class="<?php echo ($i % 2) ? 'info' : 'active' ?>">
                                        <td><?php echo $i; ?></td>
                                        <td><a href="<?php  echo $this->createUrl('../xem-video?pid='.$film['play_id'].'&pslug=&vid='.$film['id'].'&vslug='.$film['alias']) ?>" target="blank"><?php echo $film['title']; ?></a></td>
                                        <td><?php echo $film['info']; ?></td>
                                        <td><a href="#<?php echo $film['calias'] ?>" target="blank"><?php echo $film['ctitle']; ?></a></td>
                                        <td>
                                            <?php echo date('F j, Y', strtotime($film['cdate'])); ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo $this->createUrl('/videos/create?id=' . $film['id']) ?>" role="edit"><i class="fa fa-edit"> Sửa</i></a>
                                            ||
                                            <a href="<?php echo $this->createUrl('/videos?delete=' . $film['id']) ?>"><i class="fa fa-times"></i> Xóa</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <tfoot>
                    <div class="pull-right">
                        <?php echo buildHtml::pagination($total, isset($_GET['limitstart']) ? $_GET['limitstart'] : 0) ?>
                    </div>
                    </tfoot>
                </div>

            </div>
        </div>
    </div>
    <input type="hidden" value="0" name="boxchecked">
    <input type="hidden" value="" name="filter_order">
    <input type="hidden" value="5" name="limitstart" >
    <input type="hidden" value="" name="filter_order_Dir">
    <input type="hidden" value="" name="task" />
</form>