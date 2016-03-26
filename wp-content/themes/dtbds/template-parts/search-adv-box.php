<form id="advanced_search_module" class="clearfix" action="single-agency.html#" name="advanced_search_module" method="post" style="margin: 0;">
    <div class="col-xs-12">
        <label for="location"><?= pll__("Keywords") ?></label>
        <input type="text" class="form-control" placeholder="Gõ tên dự án để tìm kiếm...">
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <label for="location"><?= pll__("Location") ?></label>
        <select id="advanced_search_module_location" class="form-control">
            <option value="miami">Miami</option>
            <option value="antalya">Antalya</option>
            <option value="bodrum">Bodrum</option>
            <option value="hanue">Hanue</option>
            <option value="aksa">Aksa</option>
            <option value="amsterdam">Amsterdam</option>
        </select>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <label for="status"><?= pll__("Status") ?></label>
        <select id="advanced_search_module_status" class="form-control">
            <option value="rent">On Rent</option>
            <option value="sale">On Sale</option>
        </select>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <label for="lptype"><?= pll__("Type") ?></label>
        <select id="lptype" class="form-control">
            <option value="apertment">Apertment</option>
            <option value="condo">Condo</option>
            <option value="villa">Villa</option>
            <option value="cottage">Cottage</option>
            <option value="house">House</option>
        </select>
    </div>
    <div class="clearfix"></div>
    <hr>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <p><?= pll__("For faster results, please use the advanced form above") ?>.<br> <a href="contact.html"><?= pll__("Get in touch with us") ?></a></p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <input type="submit" class="btn btn-primary btn-block" value="<?= pll__("Search") ?>">
    </div>
</form>