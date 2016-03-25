<?php
$statuses = get_terms("project-status");
$types = get_terms("project-type");
?>
<?php
if (!empty($statuses)):
    foreach($statuses as $k => $status):
        $icon = $k == 1 ? "icon-sale" : "icon-rent";
        ?>
        <div class="widget cats_widget clearfix">
            <div class="title"><h3><i class="<?= $icon ?>"></i> <?= $status->name ?></h3></div>
            <ul class="real-estate-cats-widget">
                <li><a href="<?= pll_home_url() . $status->slug ?>"><?= pll__("All") ?></a>
                    <?php if (!empty($types)): ?>
                        <ul>
                            <?php
                            foreach($types as $type) {
                                echo "<li><a href='".pll_home_url() . $status->slug."-".$type->slug."'>".$type->name."</a></li>";
                            }
                            ?>
                        </ul>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <?php
    endforeach;
endif;
?>