<?php
/**
 * Main template file
 *
 * @package WordPress
 * @subpackage Party_Summoner
 * @since Party Summoner 1.0
 */

get_header(); ?>

<div class="advert columns is-vcentered has-text-centered">
  <div class="column is-half">
  <img src="<?php echo get_template_directory_uri() .'/images/dice-ii-1414435.png'; ?>"><br/>
    Our RPG party matching portal is coming soon
  </div> 
</div>

<?php

the_content();