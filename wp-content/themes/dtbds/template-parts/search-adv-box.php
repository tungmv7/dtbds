<form id="advanced_search_module"
      class="clearfix" action="<?= pll_home_url() . "tim-kiem" ?>" name="advanced_search_module" method="get" style="margin: 0;">
    <div class="col-xs-12">
        <label for="location"><?= pll__("Keywords") ?></label>
        <input type="text" class="form-control" placeholder="Gõ tên dự án để tìm kiếm..." name="q" value="<?= $formAttributes['q'] ?>">
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <label for="location"><?= pll__("Location") ?></label>
        <select id="advanced_search_module_location" class="form-control" name="location">
            <option value="all"><?= pll__("All") ?></option>
            <?php
                foreach(get_terms("project-area", "order=DESC") as $location) {
                    $selected = $formAttributes['location'] == $location->slug ? "selected" : "";
                    echo "<option value='".$location->slug."' $selected>".$location->name."</option>";
                }
            ?>
        </select>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <label for="status"><?= pll__("Status") ?></label>
        <select id="advanced_search_module_status" class="form-control" name="status">
            <option value="all"><?= pll__("All") ?></option>
            <?php
            foreach(get_terms("project-status", "order=DESC") as $status) {
                $selected = $formAttributes['status'] == $status->slug ? "selected" : "";
                echo "<option value='".$status->slug."' $selected>".$status->name."</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <label for="lptype"><?= pll__("Type") ?></label>
        <select id="lptype" class="form-control" name="type">
            <option value="all"><?= pll__("All") ?></option>
            <?php
            foreach(get_terms("project-type", "order=DESC") as $type) {
                $selected = $formAttributes['type'] == $type->slug ? "selected" : "";
                echo "<option value='".$type->slug."' $selected>".$type->name."</option>";
            }
            ?>
        </select>
    </div>
    <div class="clearfix"></div>
    <hr>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <p><?= pll__("For faster results, please use the advanced form above") ?>.<br> <a href="/lien-he"><?= pll__("Get in touch with us") ?></a></p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <input type="submit" class="btn btn-primary btn-block" value="<?= pll__("Search") ?>">
    </div>
</form>