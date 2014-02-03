<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends MY_Model {

	public $has_many = array(
							  'order_product_records'
						  );

	
	public $before_create = array( 'create_key' );

    protected function create_key($data)
    {
        $data['order_key'] = uniqid();
        return $data;
    }
	
}
