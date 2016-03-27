<div class="widget clearfix">
    <div class="search_widget">
        <div class="title"><h3><i class="fa fa-search"></i> <?= pll__("Search For Property")?></h3></div>
        <form action="<?= pll_home_url() . "tim-kiem" ?>" id="search_form">
            <input type="text" class="form-control" placeholder="<?= pll__("Search by property name") ?>..." name="q">
        </form><!-- end search form -->
    </div><!-- end search_widget -->
</div><!-- end widget -->