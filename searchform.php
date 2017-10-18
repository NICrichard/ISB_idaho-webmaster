<?php
/**
 * The search form for our site.
 *
 * This is the template that displays the search form. Which is attached to search.usa.gov.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Idaho_Webmaster
 */

$label_id = rand(0, 1000);

?>

<form method="get" accept-charset="UTF-8" action="<?php bloginfo('url'); ?>/" role="search" class="">
  <div class="input-group">
    <label class="control-label sr-only" for="search-input-<?php echo $label_id; ?>">Search</label>
    <input type="text" class="form-control" placeholder="Search" title="Search for" name="s" id="search-input-<?php echo $label_id; ?>">
    <span class="input-group-btn">
      <button class="btn btn-search" type="submit"><span class="glyphicons glyphicons-search" aria-label="Search"></span></button>
    </span>
  </div>
</form>
