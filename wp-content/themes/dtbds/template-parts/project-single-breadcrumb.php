<?php
$baseBreadcrumbUrl = pll_home_url();
$terms = [];
if (isset(wp_get_post_terms(get_the_ID(), 'project-status')[0])) {
    $terms[] = wp_get_post_terms(get_the_ID(), 'project-status')[0];
}
if (isset(wp_get_post_terms(get_the_ID(), 'project-type')[0])) {
    $temp = wp_get_post_terms(get_the_ID(), 'project-type')[0];
    $temp->slug = isset($terms[0]->slug) ? $terms[0]->slug . "-" . $temp->slug : $temp->slug;
    $terms[]= $temp;
}
?>
<section class="post-wrapper-top dm-shadow clearfix">
    <div class="container">
        <div class="post-wrapper-top-shadow">
            <span class="s1"></span>
        </div>
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li><a href="<?= pll_home_url() ?>"><?= pll__("Home")?></a></li>
                <?php
                    foreach($terms as $term) {
                        echo "<li><a href='".pll_home_url().$term->slug."'>".$term->name."</a></li>";
                    }
                ?>
                <li><?= get_the_title() ?></li>
            </ul>
            <h2><?= get_the_title() ?></h2>
        </div>
    </div>
</section>