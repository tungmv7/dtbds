<?php
$prjData = getProjectData(get_post());
if ($prjData['featured_project_image']):
    ?>
    <li>
        <div class="desc">
            <div class="ps-desc">
                <h3><a href="<?= the_permalink() ?>" title="<?= the_title_attribute() ?>"><?= the_title() ?></a></h3>
                <p><?= wp_trim_words($prjData['gerenal_information'], 30) ?> <a href="<?= the_permalink() ?>"><?= pll__("read more") ?></a></p>
                <span class="type"><?= $prjData['type'] ?></span>
                <span class="price"><?= $prjData['price'] ?></span>
                <a href="<?= the_permalink() ?>" class="status" title="<?= the_title_attribute() ?>"><?= $prjData['status'] ?></a>
            </div>
        </div>
        <a href="<?= the_permalink() ?>"><img src="<?= $prjData['featured_project_image'] ?>" alt=""></a>
    </li>
    <?php
endif;
?>