<form action="" method="post">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel panel-heading">
                    <span>Thêm mới quyền</span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Tên(*)</label>
                        <div>
                            <input type="text" name="name" value="" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Vị trí(*)</label>
                        <div>
                            <input type="text" name="position" value="" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Quyền Cha(*)</label>
                        <div>
                            <select class="form-control" name="parent">
                                <?php
                                foreach ($arr_group as $gid => $group) {
                                    $str = $group[3] == 0 ? "" : '';
                                    $str .= str_repeat('&nbsp;&nbsp', $group[2]) . "-";
                                    ?>
                                    <option  value="<?php echo $gid; ?>"><?php echo $str; ?><?php echo $group[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i> Làm mới</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i><?php echo isset($item['id']) ? 'Thay đổi' : 'Thêm'; ?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel panel-heading">
                    <span><i class="fa fa-bars"></i>  Danh sách</span>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</form>