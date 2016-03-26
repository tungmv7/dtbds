<div class="widget clearfix">
    <div class="agents_widget">
        <div class="title"><h3><i class="fa fa-users"></i> <?= pll__("Our Agencies") ?></h3></div>
        <?php
        $agencies = getAgencies(2);
        while ($agencies->have_posts()) {
            $agencies->the_post();
            get_template_part('template-parts/agency', 'item-2');
        }
        ?>
    </div>
</div>