<div class="agent boxes clearfix">
    <div class="image">
        <a href="<?= get_permalink() ?>">
        <img class="img-circle img-responsive img-thumbnail" src="<?= get_the_post_thumbnail_url() ?>" alt="">
        </a>
    </div><!-- image -->
    <div class="agent_desc small-desc">
        <h3 class="title"><a href="<?= get_permalink() ?>"><?= get_the_title() ?></a></h3>
        <p><span><i class="fa fa-envelope"></i> <?= get_field("agency_email") ?></span></p>
        <p><span><i class="fa fa-phone-square"></i> <?= get_field("agency_phone") ?></span></p>
    </div><!-- agento desc -->
</div>
