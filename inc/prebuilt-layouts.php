<?php
/**
 * This defines prebuild layouts for the site origin editor.
 *
 * @package Idaho_Webmaster
 */

if ( ! function_exists( 'idaho_webmaster_prebuilt_layouts' ) ) :
	/**
	 * Defines prebuilt layouts for SiteOrigin Builder.
	 * @param  array $layouts Current layouts defined for the build.
	 * @return array          Additional of theme specific layouts.
	 */
	function idaho_webmaster_prebuilt_layouts( $layouts ) {
		$layouts['about-us'] = array(
			'name' => __( 'About', 'idaho-webmaster' ),
			'description' => __( 'A simple about page.', 'idaho-webmaster' ),
			'widgets' => array(
		    array(
		      'title' => '',
		      'text' => '<blockquote><p>This area is used as a brief description of the agency. Think about it as an elevator pitch, keep it short and to the point.</p></blockquote><h3>HISTORY</h3><p>Our agency was founding in the year by this initiative. This section can be replaced by another title as well.</p><h3>NEXT BOARD MEETING</h3><p>January 1, 1970<br /> 1:00 p.m. – 1:30 p.m.<br />A Location</p><h3>More about us?</h3><p>Add more information to the right aside here. Any additional information can be placed here under new headings.</p>',
		      'text_selected_editor' => 'tmce',
		      'autop' => true,
		      '_sow_form_id' => '56b925e25e15e',
		      'panels_info' => array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'grid' => 0,
		        'cell' => 0,
		        'id' => 0,
		      ),
		    ),
		    array(
		      'name' => 'Name Of Board Member',
		      'image' => 0,
		      'align' => 'left',
		      'style' => 'rounded',
		      'text' => '<p>In this area you put the members profile information. Typically some past achievements that are relevant to the their position on your board. And of course include their current projects and works. This description should hopefully be a 3-5 sentence paragraph. Going to long will cause a loss of interest in the reader. Keep things brief while getting all the necessary information in.</p><p>In usu impedit insolens, no dicunt possim sit. Per ad velit concludaturque. Purto inani et vix, persius voluptatum est et. Dicit prompta eam ut, facilisi gubergren has at, eu decore principes aliquando ius. Nonumes disputando sea eu, sumo suavitate accommodare ne per, per eu lobortis inciderint.</p>',
		      'text_selected_editor' => 'tmce',
		      'autop' => true,
		      '_sow_form_id' => '56b927c776db0',
		      'panels_info' => array(
		        'class' => 'Bootstrap_Widget_Biography_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 1,
		        'id' => 1,
		      ),
		    ),
		    array(
		      'name' => 'Name Of Board Member',
		      'image' => 0,
		      'align' => 'right',
		      'style' => 'rounded',
		      'text' => '<p>In this area you put the members profile information. Typically some past achievements that are relevant to the their position on your board. And of course include their current projects and works. This description should hopefully be a 3-5 sentence paragraph. Going to long will cause a loss of interest in the reader. Keep things brief while getting all the necessary information in.</p><p>In usu impedit insolens, no dicunt possim sit. Per ad velit concludaturque. Purto inani et vix, persius voluptatum est et. Dicit prompta eam ut, facilisi gubergren has at, eu decore principes aliquando ius. Nonumes disputando sea eu, sumo suavitate accommodare ne per, per eu lobortis inciderint.</p>',
		      'text_selected_editor' => 'tmce',
		      'autop' => true,
		      '_sow_form_id' => '56b929d339fd6',
		      'panels_info' => array(
		        'class' => 'Bootstrap_Widget_Biography_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 1,
		        'id' => 2,
		      ),
		    ),
		    array(
		      'name' => 'Name Of Board Member',
		      'image' => 0,
		      'align' => 'left',
		      'style' => 'rounded',
		      'text' => '<p>In this area you put the members profile information. Typically some past achievements that are relevant to the their position on your board. And of course include their current projects and works. This description should hopefully be a 3-5 sentence paragraph. Going to long will cause a loss of interest in the reader. Keep things brief while getting all the necessary information in.</p><p>In usu impedit insolens, no dicunt possim sit. Per ad velit concludaturque. Purto inani et vix, persius voluptatum est et. Dicit prompta eam ut, facilisi gubergren has at, eu decore principes aliquando ius. Nonumes disputando sea eu, sumo suavitate accommodare ne per, per eu lobortis inciderint.</p>',
		      'text_selected_editor' => 'tmce',
		      'autop' => true,
		      '_sow_form_id' => '56b929d988c69',
		      'panels_info' => array(
		        'class' => 'Bootstrap_Widget_Biography_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 1,
		        'id' => 3,
		      ),
		    ),
			),
			'grids' => array(
		    array(
		      'cells' => 2,
					'style' => array(),
		  	),
			),
			'grid_cells' => array(
		    array(
		      'grid' => 0,
		      'weight' => 0.334737617611999993538773878754000179469585418701171875,
		    ),
		    array(
		      'grid' => 0,
		      'weight' => 0.6652623823879999509500748899881727993488311767578125,
		    ),
			),
		);

		$layouts['contact-us'] = array(
			'name' => __( 'Contact', 'idaho-webmaster' ),
			'description' => __( 'A simple contact page.', 'idaho-webmaster' ),
	  	'widgets' =>
			array(
		    array(
		      'title' => '',
		      'text' => '<h3>Our Office</h3><p><strong>STEM Action Center</strong><br /> Address: 700 West Jefferson Street<br /> Boise, Idaho, 83720</p><h3>CONTACT OUR STAFF</h3><p><strong>Contact #1</strong><br /><button class="btn btn-default" type="button">208 332-1302</button></p><p><strong>Contact #2</strong><br /><button class="btn btn-default" type="button">208 332-1302</button></p><h3> </h3>',
		      'text_selected_editor' => 'tmce',
		      'autop' => true,
		      '_sow_form_id' => '56b925e25e15e',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 0,
		        'id' => 0,
		      ),
		    ),
		    array(
		      'title' => '',
		      '_sow_form_id' => '56ba126b129c1',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_CF7_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 0,
		        'id' => 1,
		      ),
		    ),
		    array(
		      'name' => 'Name Of Staff Member',
		      'image' => 0,
		      'align' => 'left',
		      'style' => 'rounded',
		      'text' => '<p>In this area you put the members profile information. Typically some past achievements that are relevant to the their position on your board. And of course include their current projects and works. This description should hopefully be a 3-5 sentence paragraph. Going to long will cause a loss of interest in the reader. Keep things brief while getting all the necessary information in.</p><p>In usu impedit insolens, no dicunt possim sit. Per ad velit concludaturque. Purto inani et vix, persius voluptatum est et. Dicit prompta eam ut, facilisi gubergren has at, eu decore principes aliquando ius. Nonumes disputando sea eu, sumo suavitate accommodare ne per, per eu lobortis inciderint.</p>',
		      'text_selected_editor' => 'tmce',
		      'autop' => true,
		      '_sow_form_id' => '56b927c776db0',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Biography_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 1,
		        'id' => 2,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'name' => 'Name Of Staff Member',
		      'image' => 0,
		      'align' => 'right',
		      'style' => 'rounded',
		      'text' => '<p>In this area you put the members profile information. Typically some past achievements that are relevant to the their position on your board. And of course include their current projects and works. This description should hopefully be a 3-5 sentence paragraph. Going to long will cause a loss of interest in the reader. Keep things brief while getting all the necessary information in.</p><p>In usu impedit insolens, no dicunt possim sit. Per ad velit concludaturque. Purto inani et vix, persius voluptatum est et. Dicit prompta eam ut, facilisi gubergren has at, eu decore principes aliquando ius. Nonumes disputando sea eu, sumo suavitate accommodare ne per, per eu lobortis inciderint.</p>',
		      'text_selected_editor' => 'tmce',
		      'autop' => true,
		      '_sow_form_id' => '56b929d339fd6',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Biography_Widget',
		        'grid' => 0,
		        'cell' => 1,
		        'id' => 3,
		        'style' =>
		        array(),
		      ),
		    ),
			),
			'grids' =>
			array(
		    array(
		      'cells' => 2,
		      'style' =>
		      array(),
		    ),
			),
			'grid_cells' =>
			array(
		    array(
		      'grid' => 0,
		      'weight' => 0.334737617611999993538773878754000179469585418701171875,
		    ),
		    array(
		      'grid' => 0,
		      'weight' => 0.6652623823879999509500748899881727993488311767578125,
		    ),
			),
		);

		$layouts['three-column'] = array(
			'name' => __( 'Three Column', 'idaho-webmaster' ),
	    'description' => __( 'A three column layout.', 'idaho-webmaster' ),
	  	'widgets' =>
		  array(
		    array(
		      'title' => '',
		      'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed vehicula leo, vel elementum mi. Suspendisse tempor tellus congue convallis sagittis. Cras aliquet vitae odio eget elementum. Quisque porttitor orci in tortor tristique, sit amet iaculis tortor varius. Donec facilisis urna lorem, eget consequat ante placerat sit amet. Aenean orci orci, tempor non massa quis, lacinia egestas lectus. Pellentesque eget vestibulum arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque in rhoncus tellus. Ut semper sapien eget condimentum tempus.</p><p>In risus nulla, lobortis eget nunc a, pharetra suscipit lectus. Curabitur lacus urna, consequat quis sem a, pharetra porttitor lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce in faucibus nibh, porttitor sodales leo. Nullam mattis augue sed ipsum cursus, quis ultrices justo lacinia. Etiam tempus mi nisl, a placerat ligula consectetur non. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque et hendrerit arcu.</p>',
		      'text_selected_editor' => 'tinymce',
		      'autop' => true,
		      '_sow_form_id' => '56ba4e2af10be',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 0,
		        'id' => 0,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => '',
		      'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed vehicula leo, vel elementum mi. Suspendisse tempor tellus congue convallis sagittis. Cras aliquet vitae odio eget elementum. Quisque porttitor orci in tortor tristique, sit amet iaculis tortor varius. Donec facilisis urna lorem, eget consequat ante placerat sit amet. Aenean orci orci, tempor non massa quis, lacinia egestas lectus. Pellentesque eget vestibulum arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque in rhoncus tellus. Ut semper sapien eget condimentum tempus.</p><p>In risus nulla, lobortis eget nunc a, pharetra suscipit lectus. Curabitur lacus urna, consequat quis sem a, pharetra porttitor lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce in faucibus nibh, porttitor sodales leo. Nullam mattis augue sed ipsum cursus, quis ultrices justo lacinia. Etiam tempus mi nisl, a placerat ligula consectetur non. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque et hendrerit arcu.</p>',
		      'text_selected_editor' => 'tinymce',
		      'autop' => true,
		      '_sow_form_id' => '56ba4e613da0a',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 1,
		        'id' => 1,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => '',
		      'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed vehicula leo, vel elementum mi. Suspendisse tempor tellus congue convallis sagittis. Cras aliquet vitae odio eget elementum. Quisque porttitor orci in tortor tristique, sit amet iaculis tortor varius. Donec facilisis urna lorem, eget consequat ante placerat sit amet. Aenean orci orci, tempor non massa quis, lacinia egestas lectus. Pellentesque eget vestibulum arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque in rhoncus tellus. Ut semper sapien eget condimentum tempus.</p><p>In risus nulla, lobortis eget nunc a, pharetra suscipit lectus. Curabitur lacus urna, consequat quis sem a, pharetra porttitor lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce in faucibus nibh, porttitor sodales leo. Nullam mattis augue sed ipsum cursus, quis ultrices justo lacinia. Etiam tempus mi nisl, a placerat ligula consectetur non. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque et hendrerit arcu.</p>',
		      'text_selected_editor' => 'tinymce',
		      'autop' => true,
		      '_sow_form_id' => '56ba4e69e0d70',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 2,
		        'id' => 2,
		        'style' =>
		        array(),
		      ),
		    ),
		  ),
		  'grids' =>
		  array(
		    array(
		      'cells' => 3,
		      'style' =>
		      array(),
		    ),
		  ),
		  'grid_cells' =>
		  array(
		    array(
		      'grid' => 0,
		      'weight' => 0.333333333333333314829616256247390992939472198486328125,
		    ),
		    array(
		      'grid' => 0,
		      'weight' => 0.333333333333333314829616256247390992939472198486328125,
		    ),
		    array(
		      'grid' => 0,
		      'weight' => 0.333333333333333314829616256247390992939472198486328125,
		    ),
		  ),
		);

		$layouts['two-column'] = array(
			'name' => __( 'Two Column', 'idaho-webmaster' ),
			'description' => __( 'A two column layout.', 'idaho-webmaster' ),
			'widgets' =>
		  array(
		    array(
		      'title' => '',
		      'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed vehicula leo, vel elementum mi. Suspendisse tempor tellus congue convallis sagittis. Cras aliquet vitae odio eget elementum. Quisque porttitor orci in tortor tristique, sit amet iaculis tortor varius. Donec facilisis urna lorem, eget consequat ante placerat sit amet. Aenean orci orci, tempor non massa quis, lacinia egestas lectus. Pellentesque eget vestibulum arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque in rhoncus tellus. Ut semper sapien eget condimentum tempus.</p><p>In risus nulla, lobortis eget nunc a, pharetra suscipit lectus. Curabitur lacus urna, consequat quis sem a, pharetra porttitor lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce in faucibus nibh, porttitor sodales leo. Nullam mattis augue sed ipsum cursus, quis ultrices justo lacinia. Etiam tempus mi nisl, a placerat ligula consectetur non. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque et hendrerit arcu.</p>',
		      'text_selected_editor' => 'tinymce',
		      'autop' => true,
		      '_sow_form_id' => '56ba4e2af10be',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 0,
		        'id' => 0,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => '',
		      'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed vehicula leo, vel elementum mi. Suspendisse tempor tellus congue convallis sagittis. Cras aliquet vitae odio eget elementum. Quisque porttitor orci in tortor tristique, sit amet iaculis tortor varius. Donec facilisis urna lorem, eget consequat ante placerat sit amet. Aenean orci orci, tempor non massa quis, lacinia egestas lectus. Pellentesque eget vestibulum arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque in rhoncus tellus. Ut semper sapien eget condimentum tempus.</p><p>In risus nulla, lobortis eget nunc a, pharetra suscipit lectus. Curabitur lacus urna, consequat quis sem a, pharetra porttitor lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce in faucibus nibh, porttitor sodales leo. Nullam mattis augue sed ipsum cursus, quis ultrices justo lacinia. Etiam tempus mi nisl, a placerat ligula consectetur non. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque et hendrerit arcu.</p>',
		      'text_selected_editor' => 'tinymce',
		      'autop' => true,
		      '_sow_form_id' => '56ba4e613da0a',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 1,
		        'id' => 1,
		        'style' =>
		        array(),
		      ),
		    ),
		  ),
		  'grids' =>
		  array(
		    array(
		      'cells' => 2,
		      'style' =>
		      array(),
		    ),
		  ),
		  'grid_cells' =>
		  array(
		    array(
		      'grid' => 0,
		      'weight' => 0.5,
		    ),
		    array(
		      'grid' => 0,
		      'weight' => 0.5,
		    ),
		  ),
		);

		$layouts['one-column'] = array(
			'name' => __( 'One Column', 'idaho-webmaster' ),
			'description' => __( 'A one column layout.', 'idaho-webmaster' ),
	  	'widgets' =>
		  array(
		    array(
		      'title' => '',
		      'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed vehicula leo, vel elementum mi. Suspendisse tempor tellus congue convallis sagittis. Cras aliquet vitae odio eget elementum. Quisque porttitor orci in tortor tristique, sit amet iaculis tortor varius. Donec facilisis urna lorem, eget consequat ante placerat sit amet. Aenean orci orci, tempor non massa quis, lacinia egestas lectus. Pellentesque eget vestibulum arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque in rhoncus tellus. Ut semper sapien eget condimentum tempus.</p><p>In risus nulla, lobortis eget nunc a, pharetra suscipit lectus. Curabitur lacus urna, consequat quis sem a, pharetra porttitor lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce in faucibus nibh, porttitor sodales leo. Nullam mattis augue sed ipsum cursus, quis ultrices justo lacinia. Etiam tempus mi nisl, a placerat ligula consectetur non. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque et hendrerit arcu.</p>',
		      'text_selected_editor' => 'tinymce',
		      'autop' => true,
		      '_sow_form_id' => '56ba4e2af10be',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 0,
		        'id' => 0,
		        'style' =>
		        array(
		          'background_display' => 'tile',
		        ),
		      ),
		    ),
		  ),
		  'grids' =>
		  array(
		    array(
		      'cells' => 1,
		      'style' =>
		      array(),
		    ),
		  ),
		  'grid_cells' =>
		  array(
		    array(
		      'grid' => 0,
		      'weight' => 1,
		    ),
		  ),
		);

		$layouts['home-page'] = array(
			'name' => __( 'Home Page', 'idaho-webmaster' ),
			'description' => __( 'A three column homepage layout.', 'idaho-webmaster' ),
			'widgets' =>
		  array(
		    array(
		      'title' => 'Panel Heading',
		      'style' => 'default',
		      'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed vehicula leo, vel elementum mi. Suspendisse tempor tellus congue convallis sagittis. Cras aliquet vitae odio eget elementum. Quisque porttitor orci in tortor tristique, sit amet iaculis tortor varius. Donec facilisis urna lorem, eget consequat ante placerat sit amet. Aenean orci orci, tempor non massa quis, lacinia egestas lectus. Pellentesque eget vestibulum arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque in rhoncus tellus. Ut semper sapien eget condimentum tempus.</p><p>In risus nulla, lobortis eget nunc a, pharetra suscipit lectus. Curabitur lacus urna, consequat quis sem a, pharetra porttitor lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce in faucibus nibh, porttitor sodales leo. Nullam mattis augue sed ipsum cursus, quis ultrices justo lacinia. Etiam tempus mi nisl, a placerat ligula consectetur non. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque et hendrerit arcu.</p>',
		      'text_selected_editor' => 'tinymce',
		      'autop' => true,
		      '_sow_form_id' => '56ba51504cecb',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Panel_Widget',
		        'grid' => 0,
		        'cell' => 0,
		        'id' => 0,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => 'Panel Heading',
		      'style' => 'default',
		      'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed vehicula leo, vel elementum mi. Suspendisse tempor tellus congue convallis sagittis. Cras aliquet vitae odio eget elementum. Quisque porttitor orci in tortor tristique, sit amet iaculis tortor varius. Donec facilisis urna lorem, eget consequat ante placerat sit amet. Aenean orci orci, tempor non massa quis, lacinia egestas lectus. Pellentesque eget vestibulum arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque in rhoncus tellus. Ut semper sapien eget condimentum tempus.</p><p>In risus nulla, lobortis eget nunc a, pharetra suscipit lectus. Curabitur lacus urna, consequat quis sem a, pharetra porttitor lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce in faucibus nibh, porttitor sodales leo. Nullam mattis augue sed ipsum cursus, quis ultrices justo lacinia. Etiam tempus mi nisl, a placerat ligula consectetur non. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque et hendrerit arcu.</p>',
		      'text_selected_editor' => 'tinymce',
		      'autop' => true,
		      '_sow_form_id' => '56ba516d8f895',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Panel_Widget',
		        'grid' => 0,
		        'cell' => 1,
		        'id' => 1,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => 'Panel Heading',
		      'style' => 'default',
		      'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed vehicula leo, vel elementum mi. Suspendisse tempor tellus congue convallis sagittis. Cras aliquet vitae odio eget elementum. Quisque porttitor orci in tortor tristique, sit amet iaculis tortor varius. Donec facilisis urna lorem, eget consequat ante placerat sit amet. Aenean orci orci, tempor non massa quis, lacinia egestas lectus. Pellentesque eget vestibulum arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque in rhoncus tellus. Ut semper sapien eget condimentum tempus.</p><p>In risus nulla, lobortis eget nunc a, pharetra suscipit lectus. Curabitur lacus urna, consequat quis sem a, pharetra porttitor lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce in faucibus nibh, porttitor sodales leo. Nullam mattis augue sed ipsum cursus, quis ultrices justo lacinia. Etiam tempus mi nisl, a placerat ligula consectetur non. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque et hendrerit arcu.</p>',
		      'text_selected_editor' => 'tinymce',
		      'autop' => true,
		      '_sow_form_id' => '56ba517022c43',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Panel_Widget',
		        'grid' => 0,
		        'cell' => 2,
		        'id' => 2,
		        'style' =>
		        array(),
		      ),
		    ),
		  ),
		  'grids' =>
		  array(
		    array(
		      'cells' => 3,
		      'style' =>
		      array(),
		    ),
		  ),
		  'grid_cells' =>
		  array(
		    array(
		      'grid' => 0,
		      'weight' => 0.333333333333333314829616256247390992939472198486328125,
		    ),
		    array(
		      'grid' => 0,
		      'weight' => 0.333333333333333314829616256247390992939472198486328125,
		    ),
		    array(
		      'grid' => 0,
		      'weight' => 0.333333333333333314829616256247390992939472198486328125,
		    ),
		  ),
		);

		$layouts['home-page-3'] = array(
			'name' => __( 'Three Column Home Page', 'idaho-webmaster' ),
	    'description' => __( 'A three column homepage layout using visual editors for content.', 'idaho-webmaster' ),
	  	'widgets' =>
		  array(
		    array(
		      'image' => 0,
		      'style' => 'none',
		      'margin' => 'default',
		      '_sow_form_id' => '56be5f45b8a80',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widgets_Image_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 0,
		        'id' => 0,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => '',
		      'text' => '<h1>Agency Heading</h1><p>This is a template that is great for small agencies. It doesn\'t have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p><p><a class="btn btn-primary btn-lg" href="#">Call To Action!</a></p>',
		      'text_selected_editor' => 'tmce',
		      'autop' => true,
		      '_sow_form_id' => '56be5f4fde46a',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'grid' => 0,
		        'cell' => 1,
		        'id' => 1,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => '',
		      'text' => '<hr />',
		      'text_selected_editor' => 'html',
		      '_sow_form_id' => '56be637d6f354',
		      'autop' => false,
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'raw' => false,
		        'grid' => 1,
		        'cell' => 0,
		        'id' => 2,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => '',
		      'text' => '<h3>Heading 1</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p><p><a class="btn btn-info" href="#">Find out more about us.</a></p>',
		      'text_selected_editor' => 'tinymce',
		      'autop' => true,
		      '_sow_form_id' => '56c35226ec15d',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'raw' => false,
		        'grid' => 2,
		        'cell' => 0,
		        'id' => 3,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => '',
		      'text' => '<h3>Heading 2</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p><p><a class="btn btn-info" href="#">Find out more about us.</a></p>',
		      'text_selected_editor' => 'tinymce',
		      'autop' => true,
		      '_sow_form_id' => '56c3526d93f12',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'raw' => false,
		        'grid' => 2,
		        'cell' => 1,
		        'id' => 4,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => '',
		      'text' => '<h3>Heading 3</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p><p><a class="btn btn-info" href="#">Find out more about us.</a></p>',
		      'text_selected_editor' => 'tinymce',
		      'autop' => true,
		      '_sow_form_id' => '56c35270a18ea',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'raw' => false,
		        'grid' => 2,
		        'cell' => 2,
		        'id' => 5,
		        'style' =>
		        array(),
		      ),
		    ),
		  ),
		  'grids' =>
		  array(
		    array(
		      'cells' => 2,
		      'style' =>
		      array(),
		    ),
		    array(
		      'cells' => 1,
		      'style' =>
		      array(),
		    ),
		    array(
		      'cells' => 3,
		      'style' =>
		      array(),
		    ),
		  ),
		  'grid_cells' =>
		  array(
		    array(
		      'grid' => 0,
		      'weight' => 0.58289855852000005409507821241277270019054412841796875,
		    ),
		    array(
		      'grid' => 0,
		      'weight' => 0.417101441480000001416073018845054320991039276123046875,
		    ),
		    array(
		      'grid' => 1,
		      'weight' => 1,
		    ),
		    array(
		      'grid' => 2,
		      'weight' => 0.333333333333333314829616256247390992939472198486328125,
		    ),
		    array(
		      'grid' => 2,
		      'weight' => 0.333333333333333314829616256247390992939472198486328125,
		    ),
		    array(
		      'grid' => 2,
		      'weight' => 0.333333333333333314829616256247390992939472198486328125,
		    ),
		  ),
		);

		$layouts['home-page-4'] = array(
			'name' => __( 'Four Column Home Page', 'idaho-webmaster' ),
	    'description' => __( 'A four column homepage layout using panels.', 'idaho-webmaster' ),
	  	'widgets' =>
		  array(
		    array(
		      'title' => '',
		      'text' => '<h1>Agency&nbsp;Heading</h1><p>This is a template that is great for small agencies. It doesn\'t have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p><p><a class="btn btn-primary btn-lg" href="#">Call To Action!</a></p>',
		      'text_selected_editor' => 'tmce',
		      'autop' => true,
		      '_sow_form_id' => '56be5f4fde46a',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 0,
		        'id' => 0,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'image' => 0,
		      'style' => 'none',
		      'margin' => 'default',
		      '_sow_form_id' => '56be5f45b8a80',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widgets_Image_Widget',
		        'raw' => false,
		        'grid' => 0,
		        'cell' => 1,
		        'id' => 1,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => '',
		      'text' => '<hr />',
		      'text_selected_editor' => 'html',
		      '_sow_form_id' => '56be637d6f354',
		      'autop' => false,
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Editor_Widget',
		        'raw' => false,
		        'grid' => 1,
		        'cell' => 0,
		        'id' => 2,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => '',
		      'style' => 'default',
		      'image' => 0,
		      'text' => '<h3>Heading 1</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.<br /><br /></p><p><a class="btn btn-primary" href="#">To more information</a></p>',
		      'text_selected_editor' => 'tmce',
		      'autop' => true,
		      '_sow_form_id' => '56c366c60569f',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Panel_Widget',
		        'raw' => false,
		        'grid' => 2,
		        'cell' => 0,
		        'id' => 3,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => '',
		      'style' => 'default',
		      'image' => 0,
		      'text' => '<h3>Heading&nbsp;2</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.<br /><br /></p><p><a class="btn btn-primary" href="#">To more information</a></p>',
		      'text_selected_editor' => 'tmce',
		      'autop' => true,
		      '_sow_form_id' => '56c366f43c8d1',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Panel_Widget',
		        'raw' => false,
		        'grid' => 2,
		        'cell' => 1,
		        'id' => 4,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => '',
		      'style' => 'default',
		      'image' => 0,
		      'text' => '<h3>Heading&nbsp;3</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.<br /><br /></p><p><a class="btn btn-primary" href="#">To more information</a></p>',
		      'text_selected_editor' => 'tmce',
		      'autop' => true,
		      '_sow_form_id' => '56c366f6a4953',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Panel_Widget',
		        'raw' => false,
		        'grid' => 2,
		        'cell' => 2,
		        'id' => 5,
		        'style' =>
		        array(),
		      ),
		    ),
		    array(
		      'title' => '',
		      'style' => 'default',
		      'image' => 0,
		      'text' => '<h3>Heading&nbsp;4</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.<br /><br /></p><p><a class="btn btn-primary" href="#">To more information</a></p>',
		      'text_selected_editor' => 'tmce',
		      'autop' => true,
		      '_sow_form_id' => '56c366f91c6e6',
		      'panels_info' =>
		      array(
		        'class' => 'Bootstrap_Widget_Panel_Widget',
		        'raw' => false,
		        'grid' => 2,
		        'cell' => 3,
		        'id' => 6,
		        'style' =>
		        array(),
		      ),
		    ),
		  ),
		  'grids' =>
		  array(
		    array(
		      'cells' => 2,
		      'style' =>
		      array(),
		    ),
		    array(
		      'cells' => 1,
		      'style' =>
		      array(),
		    ),
		    array(
		      'cells' => 4,
		      'style' =>
		      array(),
		    ),
		  ),
		  'grid_cells' =>
		  array(
		    array(
		      'grid' => 0,
		      'weight' => 0.417282695947000015213035339911584742367267608642578125,
		    ),
		    array(
		      'grid' => 0,
		      'weight' => 0.5827173040530000402981158913462422788143157958984375,
		    ),
		    array(
		      'grid' => 1,
		      'weight' => 1,
		    ),
		    array(
		      'grid' => 2,
		      'weight' => 0.25,
		    ),
		    array(
		      'grid' => 2,
		      'weight' => 0.25,
		    ),
		    array(
		      'grid' => 2,
		      'weight' => 0.25,
		    ),
		    array(
		      'grid' => 2,
		      'weight' => 0.25,
		    ),
		  ),
		);

		return $layouts;

	}
endif;

add_filter( 'siteorigin_panels_prebuilt_layouts', 'idaho_webmaster_prebuilt_layouts' );

