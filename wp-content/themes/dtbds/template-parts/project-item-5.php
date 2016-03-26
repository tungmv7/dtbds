<?php
$prjData = getProjectData(get_post());
if ($prjData['thumbnail']):
?>
    <li>
        <img class="img-thumbnail" src="<?= $prjData['thumbnail'] ?>">
    </li>
<?php
endif;
?>