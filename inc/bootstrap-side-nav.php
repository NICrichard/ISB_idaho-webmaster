<?php
/**
 * Idaho Webmaster Side Navigation.
 *
 * @package Idaho_Webmaster
 */

if ( ! function_exists( 'idaho_webmaster_get_children_ids' ) ) {
	/**
	 * Filter out pages not children of the former menu.
	 * @param  string $id    ID of parent.
	 * @param  array  $items Found pages of nav.
	 * @return array         List of IDs.
	 */
	function idaho_webmaster_get_children_ids( $id, $items ) {

		$ids = wp_filter_object_list( $items, array( 'menu_item_parent' => $id ), 'and', 'ID' );

		foreach ( $ids as $id ) {
			$ids = array_merge( $ids, idaho_webmaster_get_children_ids( $id, $items ) );
		}

		return $ids;
	}
}

if ( ! function_exists( 'idaho_webmaster_submenu_limit' ) ) {
	/**
	 * Finds submenu pages when the option is enabled.
	 * @param  array $items Pages array.
	 * @param  array $args  Options for menu.
	 * @return array        Modified pages containing only sub pages array.
	 */
	function idaho_webmaster_submenu_limit( $items, $args ) {

		if ( empty( $args->submenu ) ) {
			return $items;
		}

		$ids       = wp_filter_object_list( $items, array( 'title' => $args->submenu ), 'and', 'ID' );
		$parent_id = array_pop( $ids );
		$children  = idaho_webmaster_get_children_ids( $parent_id, $items );

		foreach ( $items as $key => $item ) {
			if ( ! in_array( $item->ID, $children ) ) {
				unset( $items[ $key ] );
			}
		}

		return $items;
	}

	add_filter( 'wp_nav_menu_objects', 'idaho_webmaster_submenu_limit', 10, 2 );
}

/**
 * Create Bootstrap Side Nav Widget.
 */
class Bootstrap_Side_Nav_Widget extends WP_Widget {

	/**
	 * Construct call for the class.
	 */
	function __construct() {
		parent::__construct(
			/** Widget ID */
			'bootstrap_side_nav_widget',
			/** Widget name for widget UI */
			__( 'Bootstrap Navigation', 'idaho-webmaster' ),
			/** Description of the widget. */
			array( 'description' => __( 'Navigation for the sidebar and Footer. Can be primary or submenu.', 'idaho-webmaster' ) )
		);
	}

	/**
	 * Creates front end of the widget.
	 * @param  array $args     	Information from WordPress widget renderer.
	 * @param  array $instance 	Parameters from the dashboard form.
	 */
	public function widget( $args, $instance ) {

		$primary_nav = get_theme_mod( 'use_header_nav', true );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$title_link = ( isset( $instance['title_link'] ) && '' !== $instance['title_link'] ) ? esc_url( $instance['title_link'] ) : false;

		/** Hide the primary navigation on hidden. To allow the header navigation to be used. */
		if ( ! $primary_nav ) {
			echo '<div class="hidden-xs">';
		}

		/** Variables before_widget and after_widget are defined by the theme */
		echo $args['before_widget'];

		if ( $title_link ) {
			$args['before_title'] .= '<a href="'.$title_link.'">';
			$args['after_title'] = '</a>' . $args['after_title'];
		}

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}

		$menu_args = array(
			'menu'              => $instance['nav_menu'],
			'depth'             => 0,
			'container'         => 'div',
			'container_class'   => 'sidebar-menu',
			'container_id'      => false,
			'menu_class'        => 'nav nav-stacked',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker'            => new wp_bootstrap_navwalker(),
		);

		if ( array_key_exists( 'sub_menu', $instance ) && $instance['sub_menu'] ) {
			$menu_args['submenu'] = get_the_title( wp_get_post_parent_id( get_the_ID() ) );
		}

		if ( array_key_exists( 'include_links', $instance ) && $instance['include_links'] ) {
			$menu_args['include_links'] = true;
		}

    wp_nav_menu($menu_args);

		echo $args['after_widget'];

		if ( ! $primary_nav ) {
			echo '</div>';
		}
	}

	/**
	 * Displays the form for widget editor.
	 * @param  array $instance data from widget settings.
	 */
	public function form( $instance ) {

		$title 				 = ( isset( $instance['title'] ) ) ? $instance['title'] : __( 'New title', 'idaho-webmaster' );
		$title_link		 = ( isset( $instance['title_link'] ) ) ? $instance['title_link'] : '';
		$nav_menu 		 = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
		$sub_menu 		 = isset( $instance['sub_menu'] ) ? $instance['sub_menu'] : '';
		$include_links = isset( $instance['include_links'] ) ? $instance['include_links'] : '';
		$get_nav_menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

		/** Admin Form */
		?>

		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'idaho-webmaster' ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'title_link' ) ); ?>"><?php echo esc_html__( 'Title Link:', 'idaho-webmaster' ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title_link' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title_link' ) ); ?>" type="text" value="<?php echo esc_attr( $title_link ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'nav_menu' ) ); ?>"><?php echo esc_html_e( 'Select Menu:', 'idaho-webmaster' ); ?></label>
			<select id="<?php echo esc_html( $this->get_field_id( 'nav_menu' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'nav_menu' ) ); ?>">

			<?php
			foreach ( $get_nav_menus as $menu ) {
				echo '<option value="' . esc_attr( $menu->term_id ) . '"' . selected( $nav_menu, $menu->term_id, false ) . '>'. esc_attr( $menu->name ) . '</option>';
			}
			?>
	    </select>
	  </p>
	  <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'sub_menu' ) ); ?>"><?php esc_html_e( 'Sub Menu:', 'idaho-webmaster' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sub_menu' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sub_menu' ) ); ?>" type="checkbox" <?php checked( $sub_menu, 'on' ); ?> />
	  </p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'include_links' ) ); ?>"><?php esc_html_e( 'Include Security &amp; Privacy:', 'idaho-webmaster' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'include_links' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'include_links' ) ); ?>" type="checkbox" <?php checked( $include_links, 'on' ); ?> />
	  </p>
		<?php
	}

	/**
	 * Saves the inputs from the form.
	 * @param  array $new_instance The new instance variables.
	 * @param  array $old_instance Old instance variables.
	 * @return array               Updated information.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['title_link'] = ( ! empty( $new_instance['title_link'] ) ) ? strip_tags( $new_instance['title_link'] ) : '';
		$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		$instance['sub_menu'] = $new_instance['sub_menu'];
		$instance['include_links'] = $new_instance['include_links'];

		return $instance;
	}
}

if ( ! function_exists( 'bootstrap_side_nav_widget_load_widget' ) ) {
	/**
	 * Function that loads the widget.
	 */
	function bootstrap_side_nav_widget_load_widget() {
		register_widget( 'bootstrap_side_nav_widget' );
	}

	add_action( 'widgets_init', 'bootstrap_side_nav_widget_load_widget' );
}
