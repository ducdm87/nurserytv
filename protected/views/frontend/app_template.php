<?php $user_session = Yii::app()->session->get('user_data');  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo getSysConfig("seopage.title"); ?></title>
        <meta name="description" content="<?php echo getSysConfig("seopage.description"); ?>" />
        <meta name="keywords" content="<?php echo getSysConfig("seopage.keyword"); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/templates/dist/css/bootstrap.css" /> 
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/templates/dist/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/templates/dist/css/color.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/templates/dist/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/templates/dist/css/mobile.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/templates/dist/growl/jquery.growl.css" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/templates/dist/js/jquery-1.11.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/templates/dist/js/bootstrap.js"></script>

        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jwplayer/jwplayer.js"></script>
        <script type="text/javascript">jwplayer.key = "SjtqmP/7QZDt0Kb7ykYbu2MoBELtSImfkFCaQ/zvZ/MuQ4cz8fWyJQ==";</script>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/templates/dist/js/local-script.js"></script>


        <script src="<?php echo Yii::app()->request->baseUrl; ?>/templates/dist/js/jquery.growl.js"></script>
    
    <script>
            var BASE_URL = '<?php echo Yii::app()->request->baseUrl ?>';
    </script>
    <!--cbv load commentfacebook-->
        <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
    <!--E comment load face-->
</head>
<body id="index">
    <header>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="bg_header">
                        <div class="header-selction">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-mobile" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-list fa-2x"></i>
                                </button>
                                <a class="navbar-brand logo hidden-sm hidden-xs" href="<?php echo $this->createUrl('/app') ?>">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/avatar.png"/>
                                </a>
                            </div>
                            <!-- SEARCH MOBILE -->
                            <div class="hidden-lg hidden-md pull-right search-mb">
                                <div class="search">
                                    <form action="/videos/search" method="get">
                                        <input type="text" name="q" class="form-control input-sm input-search" maxlength="64" placeholder="Tìm kiếm..." value="<?php echo isset($_GET['q']) ? $_GET['q'] : '' ?>" />
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
                                    </form>

                                </div>
                            </div>
                            <!--/#end-->
                        </div>
                    </div>
                    <div class="container-nav">
                        <div class="menu-main ">
                            <div class="menu-container navbar-collapse collapse" id="navbar-collapse-mobile">
                                <ul class="nav navbar-nav ">
                                    <li class="<?php echo ($this->getUniqueId() == 'app') ? 'active' : '' ?>"><a href="<?php echo $this->createUrl('/app') ?>">Home <span class="sr-only">(current)</span></a></li>
                                    <li class="<?php echo ($this->getUniqueId() == 'playlist') ? 'active' : '' ?> drop-menu dropdown">
                                        <a href="<?php echo $this->createUrl('/playlist') ?>" >
                                            Play list <span class="caret"></span></a>
                                        <?php echo buildHtml::showSubmenu(); ?>
                                    </li>
                                    <li class="<?php echo ($this->getUniqueId() == 'videos') ? 'active' : '' ?>"><a  href="<?php echo $this->createUrl('/videos') ?>">Video</a></li>
                                    <li><a href="<?php echo $this->createUrl('/playlist') ?>">About</a></li>
                                </ul>
                                <div class="search hidden-sm hidden-xs">
                                    <form action="/videos/search" method="get">
                                        <input type="text" name="q" class="form-control input-sm input-search" maxlength="64" placeholder="Tìm kiếm..." value="<?php echo isset($_GET['q']) ? $_GET['q'] : '' ?>" />
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
                                    </form>                                    
                                    <div id="search-result">
                                        <div class="head">
                                            <div class="search-message col-xs-10"></div>
                                            <i class="fa fa-close fa-lg close-btn-search col-xs-2 text-right"></i>
                                        </div>
                                        <div class="inner"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="clearfix"></div>
    <div id="wrapper">
        <div class="section">
            <div class="container">
                <div class="row">
                    <?php echo buildHtml::SlideShow(); ?>
                    <div class="google-adwords">
                        <div class="content-center-pop">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/addword1.png" alt="Google AdWords" class="img-responsives"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php echo $content; //show content ?>
                    <div class="clearfix"></div>
                    <div class="google-adwords">
                        <div class="content-hoisach">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/app/content-hoisach.png" alt="Google AdWords" class="img-responsives"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php echo buildHtml::showPost(); ?>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container bg-footer">
            <div class="footer-bellow text-center">
                <span>Công ty cổ phần Bạch Minh (Vega Corporation)</span>
                <br/>
                <span>Phòng 804 tầng 8 Tòa nhà V.E.T số 98 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội</span>
                <br/>
                <span>DKKD số 0101380911 do SKHDT Hà Nội cấp 20/6/2003</span>
                <br/>
                <span>Email: info@vega.com.vn Tel: 04.37554190.</span>
                <br/>
                <span>Người chịu trách nhiệm nội dung: Bà Nguyễn Thu Dung</span>
            </div>
        </div>
    </footer>

</body>
</html>