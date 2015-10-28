<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/backend/"><?php echo CHtml::encode(Yii::app()->name); ?></a>
    </div>
    <?php $controll = Yii::app()->controller->id; ?>
    <?php $action = Yii::app()->controller->action->id; ?>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <?php
        if (getSysConfig("sidebar.display", 1) == 1) {
            ?>
            <ul class="nav navbar-nav side-nav">
                <li class="<?php if ($controll == "" OR $controll == "cpanel") echo "active current"; ?>">
                    <a href="/backend/"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>

                <li class="dropdown <?php if ($controll == "system") echo "active current"; ?>"">
                    <a href="#" class="dropdown-toggle parent" data-toggle="dropdown">
                        <i class="fa fa-caret-square-o-down"></i> System <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="<?php if ($controll == "system" AND $action == "config") echo "active"; ?>"><a href="<?php echo $this->createUrl('system/config'); ?>">Config</a></li>                    
                        <li><a href="#">Info</a></li>                
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle parent" data-toggle="dropdown">
                        <i class="fa fa-film"></i> Media 
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="<?php if ($controll == "videos") echo "active"; ?>">
                            <a href="<?php echo $this->createUrl('videos/'); ?>">Videos</a>
                        </li>
                        <li class="<?php if ($controll == "playlist") echo "active"; ?>">
                            <a href="<?php echo $this->createUrl('playlists/'); ?>">Danh sách phát</a>
                        </li>
                        <li class="<?php if ($controll == "caetgories") echo "active"; ?>">
                            <a href="<?php echo $this->createUrl('categories/'); ?>">Danh mục</a>
                        </li>
                        <li class="<?php if ($controll == "tags") echo "active"; ?>">
                            <a href="<?php echo $this->createUrl('tags/'); ?>">Tags</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown <?php if ($controll == "posts") echo "active current"; ?>">
                    <a href="#" class="dropdown-toggle parent" data-toggle="dropdown">
                        <i class="fa fa-caret-square-o-down"></i> Tin Tức
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu"> 
                        <li class="<?php if ($controll == "users" AND $action == "groups") echo "active"; ?>">
                            <a href="<?php echo $this->createUrl('posts/'); ?>">Dánh sách tin tức</a>
                        </li>
                        <li class="<?php if ($controll == "users" AND $action == "display") echo "active"; ?>">
                            <a href="<?php echo $this->createUrl('posts/create'); ?>">Thêm tin tức</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown <?php if ($controll == "users") echo "active current"; ?>">
                    <a href="<?php echo $this->createUrl('users/'); ?>" class="dropdown-toggle parent" data-toggle="dropdown">
                        <i class="fa fa-caret-square-o-down"></i> Users
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu"> 
                        <li class="<?php if ($controll == "users" AND $action == "groups") echo "active"; ?>">
                            <a href="<?php echo $this->createUrl('users/groups'); ?>">Groups</a>
                        </li>
                        <li class="<?php if ($controll == "users" AND $action == "display") echo "active"; ?>">
                            <a href="<?php echo $this->createUrl('users/'); ?>">Users</a>
                        </li>
                    </ul>
                </li>


            </ul>
        <?php } ?>

        <ul class="nav navbar-nav navbar-right navbar-user">
            <li>
                <a href="/" class="dropdown-toggle" target="_blank"> Visit site</a>
            </li>
            <li class="dropdown messages-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">7</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-header">7 New Messages</li>
                    <li class="message-preview">
                        <a href="#">
                            <span class="avatar"><img src="/images/avatar/50x50"></span>
                            <span class="name">John Smith:</span>
                            <span class="message">Hey there, I wanted to ask you something...</span>
                            <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                        </a>
                    </li>                               
                    <li class="divider"></li>
                    <li><a href="#">View Inbox <span class="badge">7</span></a></li>
                </ul>                
            </li>
            <?php global $mainframe; ?>
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $mainframe->getUserUsername(); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>                
                    <li class="divider"></li>
                    <li><a href="/backend/user/logout"> <i class="fa fa-power-off"></i> Logout</a></li>                
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>