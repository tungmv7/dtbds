<?php
$baseUri = basename(get_page_link());
$baseTerms = ['mua-ban', 'cho-thue', 'for-sale', 'for-rent'];
$terms = [];
foreach($baseTerms as $base) {
    if (strpos($baseUri, $base) === 0) {
        $terms[] = get_term_by('slug', $base, 'project-status');
        if (strlen($base) !== strlen($baseUri)) {
            $projectType = str_replace($base . "-", "", $baseUri);
            $terms[] = get_term_by('slug', $projectType, 'project-type');
        }

        break;
    }
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
                    $currentLabel = '';
                    $count = 0;
                    foreach($terms as $term) {
                        $count++;
                        if ($count == count($terms)) {
                            $currentLabel .= $term->name;
                            echo "<li>".$term->name."</li>";
                        } else {
                            $currentLabel .= $term->name . " ";
                            echo "<li><a href='".pll_home_url().$term->slug."'>".$term->name."</a></li>";
                        }
                    }
                ?>
            </ul>
            <h2><?= $currentLabel ?></h2>
        </div>
    </div>
</section>