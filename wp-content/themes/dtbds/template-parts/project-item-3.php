<?php
$prjData = getProjectData(get_post());
if ($prjData['thumbnail']):
    ?>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="boxes first effect-slide-bottom in" data-effect="slide-bottom" style="transition: all 0.7s ease-in-out;">
            <div class="ImageWrapper boxes_img">
                <img class="img-responsive" src="<?= $prjData['thumbnail'] ?>">
                <div class="ImageOverlayH"></div>
                <div class="Buttons StyleMg">
                    <span class="WhiteSquare"><a class="fancybox" href="<?= $prjData['image'] ?>"><i class="fa fa-search"></i></a></span>
                    <span class="WhiteSquare"><a href="<?= get_permalink() ?>"><i class="fa fa-link"></i></a></span>
                </div>
                <div class="box_type"><?= $prjData['price'] ?></div>
                <div class="status_type"><?= $prjData['status'] ?></div>
            </div>
            <h2 class="title"><a href="<?= the_permalink() ?>" title="<?= the_title_attribute() ?>"> <?= the_title() ?></a>
                <small class="small_title"><?= $prjData['type'] ?></small>
            </h2>
            <div class="boxed_mini_details1 clearfix">
                <span class="garage first"><strong><?= pll__("Garage") ?></strong><i class="icon-garage"></i> <?= $prjData['des']['garage'] ?></span>
                <span class="bedrooms"><strong><?= pll__("Baths") ?></strong><i class="icon-bed"></i> <?= $prjData['des']['baths'] ?></span>
                <span class="status"><strong><?= pll__("Beds") ?></strong><i class="icon-bath"></i> <?= $prjData['des']['beds'] ?></span>
                <span class="sqft last"><strong><?= pll__("Area") ?></strong><i class="icon-sqft"></i> <?= $prjData['des']['area'] ?></span>
            </div>
        </div><!-- end boxes -->
    </div>
<?php endif; ?>