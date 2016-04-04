<div class="widget clearfix contact-box">
    <div class="title"><h3><i class="fa fa-user"></i><?= pll__("Contact Details") ?></h3></div>
    <div>
        <div class="ImageWrapper boxes_img">
            <?php
            $contactData = wp_cache_get('contact-data');
            if (!empty($contactData['thumbnail'])){
                echo "<img src=\"".$contactData['thumbnail']['sizes']['featured-project-image']."\" class=\"img-responsive\" alt=\"\">";
            }
            ?>
        </div>

        <ul>
            <li><i class="fa fa-envelope"></i> <?= $contactData['email']?></li>
            <li><i class="fa fa-phone-square"></i> <?= $contactData['phone'] ?></li>
            <li><i class="fa fa-facebook-square"></i> <?= $contactData['facebook'] ?></li>
            <li><i class="fa fa-share-square"></i> <?= $contactData['address'] ?></li>
        </ul>
    </div>
</div>