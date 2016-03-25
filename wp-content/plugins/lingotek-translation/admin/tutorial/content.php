<style>
	.tutorial-photo-right {
		width: 50%;
		height: auto;
		float: right;
		padding-left: 3px;
	}

	.img-caption {
		font-size:  8px;
		color: #999;
		font-style: italic;
		padding-left: 20px;
	}

	th {
		text-align: left;
		padding-left: 10px;
	}
</style>

<p><?php _e('', 'lingotek-translation') ?></p>

<div>
	<h4><?php _e('1. Create content', 'lingotek-translation') ?></h4>
	<p><?php _e('Whether you write a blog post, create a page for your site, or have existing posts and pages, any of your Wordpress content can be uploaded to <i>Lingotek</i>.', 'lingotek-translation') ?>
	<?php _e('The examples shown below are for Pages but translation for other content types works the same way!', 'lingotek-translation') ?></p>
	<img class="lingotek-bordered" src="<?php echo LINGOTEK_URL . '/admin/tutorial/img/add-page.png'; ?>">
	<p class="img-caption"><?php _e('Create a new page for translation.', 'lingotek-translation') ?></p>
</div>
<div>
	<h4><?php _e('2. Upload content to Lingotek', 'lingotek-translation') ?></h4>
	<p><?php _e('Your Wordpress content can be uploaded to <i>Lingotek</i> with the simple push of a button.', 'lingotek-translation') ?></p>
	<img class="lingotek-bordered" src="<?php echo LINGOTEK_URL . '/admin/tutorial/img/ready-to-upload.png'; ?>">
	<p class="img-caption"><?php _e('Content has been created and is ready for upload to Lingotek.', 'lingotek-translation') ?></p>
</div>
<div>
	<h4><?php _e('3. Request translations for target languages', 'lingotek-translation') ?></h4>
	<p><?php _e('Request translation for a specific language by clicking on the orange plus icon, for all languages at once, or in bulk by using the <i>Bulk Actions</i> dropdown.', 'lingotek-translation') ?></p>
		<img class="lingotek-bordered" src="<?php echo LINGOTEK_URL . '/admin/tutorial/img/request-translations.png'; ?>">
	<p class="img-caption"><?php _e('The source content is uploaded and ready for target languages.', 'lingotek-translation') ?></p>
</div>
<div>
	<h4><?php _e('4. Translate your content', 'lingotek-translation') ?></h4>
	<p><?php _e('Your content will now be translated into your selected target languages by free machine translation or, if you contract with <i>Lingotek</i>, professional translation services.', 'lingotek-translation') ?></p>
	<img class="lingotek-bordered" src="<?php echo LINGOTEK_URL . '/admin/tutorial/img/translations-underway.png'; ?>">
	<p class="img-caption"><?php _e('Your translations are underway.', 'lingotek-translation') ?></p>
</div>
<div>
	<h4><?php _e('5. Download translations', 'lingotek-translation') ?></h4>
	<p><?php _e('Once your translations are complete they will be marked ready for download. You can download translations for all languages, each language individually, or in bulk (using the <i>Bulk Actions</i> dropdown).', 'lingotek-translation') ?></p>
	<img class="lingotek-bordered" src="<?php echo LINGOTEK_URL . '/admin/tutorial/img/translations-ready-for-download.png'; ?>">
	<p class="img-caption"><?php _e('Your translations are ready for download.', 'lingotek-translation') ?></p>
</div>
<div>
	<h4><?php _e('6. Your content is translated!', 'lingotek-translation') ?></h4>
	<p><?php _e('The orange pencil icons indicate that your translations are finished, downloaded, and current within your Wordpress site. Clicking on any one of the pencils will direct you to the Lingotek Workbench for that specific language. Here you can make updates and changes to your translations if necessary.', 'lingotek-translation') ?></p>
	<img class="lingotek-bordered" src="<?php echo LINGOTEK_URL . '/admin/tutorial/img/translations-downloaded.png'; ?>">
	<p class="img-caption"><?php _e('Your content has been translated.', 'lingotek-translation') ?></p>
</div>

<h2><?php _e('What do all the icons mean?', 'lingotek-translation') ?></h2>

<table>
	<tr>
		<td><span class="lingotek-color dashicons dashicons-upload"></span></td>
		<th><?php _e('Upload Source', 'lingotek-translation') ?></th>
		<td><?php _e('There is content ready to be uploaded to Lingotek.', 'lingotek-translation') ?></td>
	</tr>
	<tr>
		<td><span class="lingotek-color dashicons dashicons-clock"></span></td>
		<th><?php _e('In Progress', 'lingotek-translation') ?></th>
		<td><?php _e('Content is importing to Lingotek or a target language is being added to source content.', 'lingotek-translation') ?></td>
	</tr>
	<tr>
		<td><span class="lingotek-color dashicons dashicons-yes"></span></td>
		<th><?php _e('Source Uploaded', 'lingotek-translation') ?></th>
		<td><?php _e('The source content has been uploaded to Lingotek.', 'lingotek-translation') ?></td>
	</tr>
	<tr>
		<td><span class="lingotek-color dashicons dashicons-plus"></span></td>
		<th><?php _e('Request Translation', 'lingotek-translation') ?></th>
		<td><?php _e('Request a translation of the source content. (Add a target language)', 'lingotek-translation') ?></td>
	</tr>
	<tr>
		<td><span class="lingotek-color dashicons dashicons-download"></span></td>
		<th><?php _e('Download Translation', 'lingotek-translation') ?></th>
		<td><?php _e('Download the translated content to Wordpress.', 'lingotek-translation') ?></td>
	</tr>
	<tr>
		<td><span class="lingotek-color dashicons dashicons-edit"></span></td>
		<th><?php _e('Translation Current', 'lingotek-translation') ?></th>
		<td><?php _e('The translation is complete. (Clicking on this icon will allow you to edit translations in the Lingotek Workbench)', 'lingotek-translation') ?></td>
	</tr>
</table>