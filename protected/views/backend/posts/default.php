<div class="page-header">
    <h1><span class="text-left-sm">Posts</h1>
</div>
<div class="clearfix"></div>
<div class="module row">
    <div class="panel panel-primary">
        <div class="panel panel-heading">
            <span><i class="fa fa-bars"></i> List media</span>
        </div>
        <div class="panel-body">
            <div class="">
                <!--<a href="" class="btn btn-primary" data-toggle="modal" data-target="#uploadExtention"><i class="fa fa-cog"></i> Upload</a>-->
                <a href="<?php echo $this->createUrl('posts/create') ?>" class="btn btn-danger pull-right btn-sm"><i class="fa fa-plus"></i> Create a Media</a>
            </div>
            <br/>
            <div class="table-resposive" style="margin-top: 20px;">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date Create</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($posts) && $posts): ?>
                            <?php $i = 1; ?>
                            <?php foreach ($posts as $post): ?>
                                <tr class="<?php echo ($i % 2) ? 'info' : 'active' ?>">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $post['title']; ?></td>
                                    <td><?php echo $post['introtext']; ?></td>
                                    <td>
                                        <?php echo date('F j, Y', strtotime($post['created'])); ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo $this->createUrl('/posts/create?id=' . $post['id']) ?>" role="edit"><i class="fa fa-edit"> Sửa</i></a>
                                        ||
                                        <a href="<?php echo $this->createUrl('/posts?delete=' . $post['id']) ?>"><i class="fa fa-times"></i> Xóa</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>