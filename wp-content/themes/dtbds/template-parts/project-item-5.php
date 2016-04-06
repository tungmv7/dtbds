<?php
$prjData = getProjectData(get_post());
if (isset($prjData['thumbnail'])):
?>
    <li>
        <img class="img-thumbnail" src="<?= $prjData['thumbnail'] ?>">
    </li>
<?php
endif;
?>