<?php 

	function fastnet_custom_field(){
		$fastnet_cmb = new_cmb2_box([
			'title' => 'Page title',
			'id' => 'page-title',
			'object_types' => ['page']
		]);

		$fastnet_cmb -> add_field([
			'name' => 'Page title name',
			'type' => 'text',
			'id' => 'page-title-name',
			'default' => 'Page title here'
		]);

		$fastnet_cmb -> add_field([
			'name' => 'Page title background',
			'type' => 'file',
			'id' => 'page-title-image',
			'default' => get_template_directory_uri().'/assets/img/hero/hero2.png'
		]);
	}

	add_action('cmb2_init', 'fastnet_custom_field');

 ?>