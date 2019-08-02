<?php 

/*
 * This class extends TimberMenu allowing us to write custom markup for our menus
 */

class CustomMenu extends \TimberMenu {
	//public $MenuItemClass = '\CustomMenuItem';

	public function get_links() {
		
		if ( is_array( $this->items ) ) {
			$links = array();
			foreach($this->items as $link){
				
				$simpleLink = array(
					"text" => $link->title, 
					"link" => $link->link
				);
				array_push($links, $simpleLink);
			}

			return $links;
		}
		return array();
	}

	public function get_listings() {
		
		if ( is_array( $this->items ) ) {
			$links = array();
			foreach($this->items as $link){
				
				$simpleLink = array(
					"link" => $link->link,
					"title" => $link->title	
				);
				array_push($links, $simpleLink);
			}

			return $links;
		}
		return array();
	}
}