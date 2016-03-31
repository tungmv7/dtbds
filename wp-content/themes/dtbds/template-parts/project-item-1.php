<?php
$prjData = getProjectData(get_post());
if ($prjData['thumbnail']):
    ?>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="boxes">
            <div class="boxes_img ImageWrapper">
                <a href="<?= the_permalink() ?>">
                    <img class="img-responsive" src="<?= $prjData['thumbnail'] ?>" alt="">
                    <div class="PStyleNe"></div>
                </a>
                <div class="box_type"><?= $prjData['price'] ?></div>
            </div>
            <h2 class="title"><a href="<?= the_permalink() ?>"
                                 title="<?= the_title_attribute() ?>"> <?= the_title() ?></a></h2>
            <div class="boxed_mini_details clearfix">
                <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> <?= $prjData['des']['garage'] ?></span>
                <span class="status"><strong>Baths</strong><i class="icon-bath"></i> <?= $prjData['des']['baths'] ?></span>
                <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> <?= $prjData['des']['beds'] ?></span>
            </div>
        </div>
    </div>
    <?php
endif;
?>