<?php
/*
 * Template Name: Search Page
 */
?>
<form class="d-flex" action="<?php home_url('/'); ?>">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="s"
           value="<?= get_search_query(); ?>">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>

