<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_product_record_model extends MY_Model {

	protected $belongs_to = array(
								'product'
							);
	
}
