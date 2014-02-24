<?php

class Tables extends CI_Controller {

	public function __construct()
   	{
        parent::__construct();

		$this->load->dbforge();
   	}	
	
	function _create_table($table) {
		if (!$this->db->table_exists($table)) 
		{
			$this->dbforge->add_field('id');
			$this->dbforge->create_table($table);
		}
		return "<h2>$table</h2>";	
	}

	function _create_field($table,$field,$params) {
		if (!$this->db->field_exists($field, $table)) {
			$this->dbforge->add_column($table, array($field => $params));	
		} 
		else
		{
			$params['name'] = $field;
			$this->dbforge->modify_column($table, array($field => $params));	
		} 
		
		return $field."<br>";	
	}
		
	function create_tables() {
		
		$d = "<h1>Creando tablas...</h1>";		
		
		/*$tabla = "users";
		$d .= $this->_create_table($tabla);
		$d .= $this->_create_field($tabla,'fullname',array('type'=>'VARCHAR','constraint'=>'50'));
		$d .= $this->_create_field($tabla,'username',array('type'=>'VARCHAR','constraint'=>'50'));
		$d .= $this->_create_field($tabla,'password',array('type'=>'VARCHAR','constraint'=>'50'));

		$tabla = "pages";
		$d .= $this->_create_table($tabla);
		$d .= $this->_create_field($tabla,'page',array('type'=>'VARCHAR','constraint'=>'150'));
		$d .= $this->_create_field($tabla,'page_content',array('type'=>'TEXT'));
		$d .= $this->_create_field($tabla,'url',array('type'=>'VARCHAR','constraint'=>'50'));

		$tabla = "posts";
		$d .= $this->_create_table($tabla);
		$d .= $this->_create_field($tabla,'post_title',array('type'=>'VARCHAR','constraint'=>'150'));
		$d .= $this->_create_field($tabla,'post_content',array('type'=>'TEXT'));
		$d .= $this->_create_field($tabla,'post_dt',array('type'=>'DATETIME'));
		
		$tabla = "log";
		$d .= $this->_create_table($tabla);
		$d .= $this->_create_field($tabla,'event_type',array('type'=>'VARCHAR','constraint'=>'50'));
		$d .= $this->_create_field($tabla,'event_dt',array('type'=>'DATETIME'));
		$d .= $this->_create_field($tabla,'event_author',array('type'=>'VARCHAR','constraint'=>'50'));
		
		$tabla = "products";
		$d .= $this->_create_table($tabla);
		$d .= $this->_create_field($tabla,'product',array('type'=>'VARCHAR','constraint'=>'150'));
		$d .= $this->_create_field($tabla,'summary',array('type'=>'TEXT'));
		$d .= $this->_create_field($tabla,'facebook',array('type'=>'TEXT'));
		$d .= $this->_create_field($tabla,'description',array('type'=>'TEXT'));
		$d .= $this->_create_field($tabla,'category_id',array('type'=>'INT','constraint'=>'5'));
		$d .= $this->_create_field($tabla,'price',array('type'=>'DECIMAL','constraint'=>'5,2'));
		$d .= $this->_create_field($tabla,'reference',array('type'=>'VARCHAR','constraint'=>'100'));
		$d .= $this->_create_field($tabla,'brand',array('type'=>'VARCHAR','constraint'=>'100'));
		$d .= $this->_create_field($tabla,'related',array('type'=>'VARCHAR','constraint'=>'100'));
		$d .= $this->_create_field($tabla,'featured',array('type'=>'CHAR','constraint'=>'1'));
		$d .= $this->_create_field($tabla,'position',array('type'=>'INT','constraint'=>'5'));

		$tabla = "categories";
		$d .= $this->_create_table($tabla);
		$d .= $this->_create_field($tabla,'category',array('type'=>'VARCHAR','constraint'=>'150'));
		$d .= $this->_create_field($tabla,'parent_id',array('type'=>'INT','constraint'=>'5'));
		$d .= $this->_create_field($tabla,'tree',array('type'=>'TEXT'));
		$d .= $this->_create_field($tabla,'stub',array('type'=>'TEXT'));
		$d .= $this->_create_field($tabla,'position',array('type'=>'INT','constraint'=>'5')); 

		$tabla = "participants";
		$d .= $this->_create_table($tabla);
		$d .= $this->_create_field($tabla,'Nombre',array('type'=>'VARCHAR','constraint'=>'50'));
		$d .= $this->_create_field($tabla,'Apellido',array('type'=>'VARCHAR','constraint'=>'50'));
		$d .= $this->_create_field($tabla,'Telefono',array('type'=>'VARCHAR','constraint'=>'50'));
		$d .= $this->_create_field($tabla,'Email',array('type'=>'VARCHAR','constraint'=>'250'));
		$d .= $this->_create_field($tabla,'coleccion',array('type'=>'VARCHAR','constraint'=>'50'));
		$d .= $this->_create_field($tabla,'estilo',array('type'=>'VARCHAR','constraint'=>'50'));

		*/
		
		$tabla = "posts";
		$d .= $this->_create_table($tabla);
		$d .= $this->_create_field($tabla,'category_id',array('type'=>'INT','constraint'=>'5'));

		return $d;
	}
	
	function index()
	{
		$d['result'] = $this->create_tables();
		$this->load->view('tables_view', $d);
	}
}

/* End of file */
