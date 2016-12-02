<?php

/**
 * @file
 * islandora-basic-collection.tpl.php
 *
 * @TODO: needs documentation about file and variables
 */
?>

<div class="islandora islandora-basic-collection">
  <div class="islandora-basic-collection-grid clearfix flex-boxes">
  <?php foreach($associated_objects_array as $key => $value): ?>
    <dl class="flex-box islandora-basic-collection-object <?php print $value['class']; ?>">
        <dt class="islandora-basic-collection-thumb"><?php print $value['thumb_link']; ?></dt>
        <dd class="flex-title islandora-basic-collection-caption"><?php print filter_xss($value['title_link']); ?></dd>
    </dl>
  <?php endforeach; ?>
</div>
</div>
