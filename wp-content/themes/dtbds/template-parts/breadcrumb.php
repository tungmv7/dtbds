<section class="post-wrapper-top dm-shadow clearfix">
    <div class="container">
        <div class="post-wrapper-top-shadow">
            <span class="s1"></span>
        </div>
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li><a href="<?= pll_home_url() ?>"><?= pll__("Home") ?></a></li>
                <?php
                    foreach($items as $item) {
                        if ($item['link'] === false) {
                            echo "<li>".$item['title']."</li>";
                        } else {
                            echo "<li><a href='".$item['url']."'>".$item['title']."</a></li>";
                        }
                    }
                ?>
            </ul>
            <?php
                if (count($items) > 0) {
                    echo "<h2>".$items[count($items) - 1]['title']."</h2>";
                }
            ?>
        </div>
    </div>
</section>