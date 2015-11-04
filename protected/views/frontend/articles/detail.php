
<div class="page-article-detail">        
    <div class="entry-container">
        <div class="entry-header">
            <div class="container-fluid">
                <div class="entry-title">
                    <div class="box-bg-left">
                        <div class="entry-title">
                            <div class="entry-title-text">
                                <a href="<?php echo $category['link']; ?>"><span><?php echo $category['title']; ?></span></a>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div> 
        </div> 
        <div class="entry-body">
            <div class="container">
                <h4 class="media-heading">
                    <a href="<?php echo $item['link']; ?>"><?php echo isset($item['title']) ? $item['title'] : ''; ?></a>
                </h4>
                <p>
                    <b><?php echo $item['introtext']; ?></b>
                </p>
                <div>
                    <?php echo $item['fulltext'];  ?>
                </div>
            </div>
        </div>
    </div>    
</div>

