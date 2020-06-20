<?php

/**
 * Front page class
 *
 * @package Storefront
 */


use storefront\Blocks;

if ( ! class_exists( 'Class_FrontPage' ) ) {

	/**
	 * Controller for the single article template
	 *
	 * @package Storefront
	 */
	class Class_FrontPage extends \storefront\Page {

		/**
		 * Class variables
		 */
		public $questions;
		 

		/**
		 * Class variables
		 */

		/**
		 * Constructor
		 */
		public function __construct() {

			 
			$this->add_actions();
			$this->add_filters();
			// render page
			$this->render(); 
		}

		private function add_actions() {
		}

		private function add_filters() {
		}


		private function render() {
 

			get_header();
			$this->render_page();
			//$this->render_chat_window();
			get_footer();

		}

		/**
		 * runs block action is not in safe mode ( render() )
		 *
		 * @return html page
		 *
		 * @package Storefront
		 *
		 * ??? was this best way to deal with ? perhaps action should of been defined in the class and
		 *     block class redefined as admin class as rest of functionality related to admin control - speak to @ryan
		 */
		private function render_page() {

			Blocks::render_page_blocks( get_the_ID() );
 
		}

		function render_chat_window() {
			echo '<div class="chat-container">
<button class="chat-close" data-lp-event="close">close</button>
<span class="contact-title">Need help finding the right subscription</span>
<span class="contact-subtitle">Talk to us about becoming a subscriber</span>
<button data-lp-event="click">CHAT NOW</button>
	 </div>';
		}


	}
	new Class_FrontPage;
} // End if().

