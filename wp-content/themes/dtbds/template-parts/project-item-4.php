<?php
$prjData = getProjectData(get_post());
if (isset($prjData['thumbnail'])):
?>
    <li>
        <div class="ps-mini-desc">
            <span class="type"><?= $prjData['type'] ?></span>
            <span class="price"><?= $prjData['price'] ?></span>
            <a href="javascript:;" class="status"><?= $prjData['status'] ?></a>
        </div>
        <a href="<?= get_permalink() ?>"><img class="img-thumbnail" src="<?= $prjData['thumbnail'] ?>"></a>
    </li>
<?php
endif;
?>