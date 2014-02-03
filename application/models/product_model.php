<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends MY_Model {

	
	public $before_create = array( 'create_key' );

    protected function create_key($data)
    {
        $data['product_key'] = uniqid();
        return $data;
    }
	
}
