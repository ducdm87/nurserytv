<div class="">
    <form action="<?php echo $this->createUrl('extentions/dopost') ?>" method="post">
        <div class="panel panel-primary">
            <div class="panel panel-heading">
                <span>Add Extention</span>
            </div>
            <div class="panel-body">
                <input type="hidden" name="id"  value=""/>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">Tên</label>
                        <div>
                            <input type="text" name="name" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alias</label>
                        <div>
                            <input type="text" name="alias" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tên thư mục</label>
                        <div>
                            <input type="text" name="folder" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tên hiển thị</label>
                        <div>
                            <input type="text" name="showtitle" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Param</label>
                        <div>
                            <input type="text" name="param" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Kiểu</label>
                        <div>
                            <input type="text" name="type" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Sắp xếp</label>
                        <div>
                            <input type="text" name="order" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Vị Trí</label>
                        <div>
                            <input type="text" name="position" class="form-control" value="">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label">Trạng thái</label>
                        <div>
                            <input type="text" name="status" class="form-control" value="">
                        </div>
                    </div> 
                </div>

            </div>
            <div class="panel-footer">
                <button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i> Làm mới </button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm </button>
            </div>
        </div>
    </form>
</div>