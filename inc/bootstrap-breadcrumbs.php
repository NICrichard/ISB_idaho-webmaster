<?php
/**
 * Bootstrap Breadcrumbs
 * Format wordpress breadcrumbs properly for bootstrap compatibility.
 *
 * @package Idaho_Webmaster
 */

/** Function time. */
function bootstrap_breadcrumbs() {
    $showOnHome  = 0;
    $delimiter   = '';
    $home        = esc_html__( 'Home', 'idaho-webmaster' );
    $showCurrent = 1;
    $before      = '<li class="active"><span class="current">';
    $after       = '</span></li>';
    $output      = '';

    global $post;
    $homeLink = home_url();

    if ( is_home() || is_front_page() ) {

        if ( 1 === $showOnHome ) {

            $output .= sprintf(
              esc_html_x( '<ol class="breadcrumb"><li><a href="%1$s">%2$s</a></li></ol>', 'breadcrumb home link', 'idaho-webmaster' ),
                $homeLink, $home
            );
        }
    } else {

        $output .= sprintf(
          '<ol class="breadcrumb"><li><a href="%1$s">%2$s</a></li>',
            $homeLink, $home
        );

        if ( is_category() ) {
            $thisCat = get_category( get_query_var( 'cat' ), false );

            if ( 0 !== $thisCat->parent ) {
                $output .= esc_html( get_category_parents( $thisCat->parent, true, false ) );
            }

            $output .= sprintf(
              '%1$s%2$s%3$s',
                $before, esc_html( single_cat_title( '', false ) ), $after
            );

        } elseif ( is_search() ) {
            $output .= sprintf(
              esc_html_x( '%1$s Search results for "%2$s" %3$s', 'breadcrumbs search results', 'idaho-webmaster' ),
                $before, esc_html( get_search_query() ), $after
            );

				} elseif ( is_day() ) {
            $output .= sprintf(
              '<li><a href="%1$s">%2$s</a></li>',
                esc_html( get_year_link( get_the_time( 'Y' ) ) ), esc_html( get_the_time( 'Y' ) )
            );

            $output .= sprintf(
              '<li><a href="%1$s">%2$s</a></li>',
                esc_html( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ), esc_html( get_the_time( 'F' ) )
            );

            $output .= sprintf(
              '%1$s%2$s%3$s',
                $before, esc_html( get_the_time( 'd' ) ), $after
            );

        } elseif ( is_month() ) {

            $output .= sprintf(
              '<li><a href="%1$s">%2$s</a></li>',
                esc_html( get_year_link( get_the_time( 'Y' ) ) ), esc_html( get_the_time( 'Y' ) )
            );

            $output .= sprintf(
              '%1$s%2$s%3$s',
                $before, esc_html( get_the_time( 'F' ) ), $after
            );

        } elseif ( is_year() ) {

            $output .= sprintf(
              '%1$s%2$s%3$s',
                $before, esc_html( get_the_time( 'Y' ) ), $after
            );

        } elseif ( is_single() && ! is_attachment() ) {
            if ( 'post' !== get_post_type() ) {

                $post_type = get_post_type_object( get_post_type() );
                $slug = $post_type->rewrite;

                $output .= sprintf(
                  '<li><a href="%1$s/%2$s/">%3$s</a>',
                    esc_html( $homeLink ), esc_html( $slug['slug'] ), esc_html( $post_type->labels->singular_name )
                );

                if ( 1 === $showCurrent ) {
                    $output .= sprintf(
                      '</li> %1$s%2$s%3$s',
                        $before, esc_html( get_the_title() ), $after
                    );
                }
            } else {

                $cat = get_the_category();
								if ( $cat ) {
									$cat = $cat[0];
								}

                $cats = get_category_parents( $cat, true, '</li> ' );

                if ( 0 === $showCurrent ) {
                    $cats = preg_replace( "#^(.+)\s$delimiter\s$#", '$1', $cats );
                }

                $output .= '<li>' . $cats ;

                if ( 1 === $showCurrent ) {
                    $output .= sprintf(
                      '%1$s%2$s%3$s',
                        $before, esc_html( get_the_title() ), $after
                    );
                }
            }
        } elseif ( ! is_single() && ! is_page() && 'post' !== get_post_type() && ! is_404() ) {
            $post_type = get_post_type_object( get_post_type() );
            $output .= sprintf(
              '%1$s%2$s%3$s',
                $before, esc_html( $post_type->labels->singular_name ), $after
            );

        } elseif ( is_attachment() ) {
            $parent = get_post( $post->post_parent );
            $cat = get_the_category( $parent->ID );
						if ( $cat ) {
							$cat = $cat[0];
						}
            $output .= esc_html( get_category_parents( $cat, true, '</li>' ) );

            $output .= sprintf(
              '<li><a href="%1$s">%2$s</a>',
                esc_html( get_permalink( $parent ) ), esc_html( $parent->post_title )
            );

            if ( 1 === $showCurrent ) {
                $output .= sprintf(
                  '</li>%1$s%2$s%3$s',
                    $before, esc_html( get_the_title() ), $after
                );
            }
        } elseif ( is_page() && ! $post->post_parent ) {
            if ( 1 === $showCurrent ) {
                $output .= sprintf(
                  '%1$s%2$s%3$s',
                    $before, esc_html( get_the_title() ), $after
                );
            }
        } elseif ( is_page() && $post->post_parent ) {

            $breadcrumbs = array();
            $parent_id   = $post->post_parent;

            while ( $parent_id ) {
                $page = get_page( $parent_id );
                $breadcrumbs[] = sprintf(
                  '<li><a href="%1$s">%2$s</a>',
                    esc_html( get_permalink( $page->ID ) ), esc_html( get_the_title( $page->ID ) )
                );
                $parent_id = $page->post_parent;
            }

            $breadcrumbs = array_reverse( $breadcrumbs );

            for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
                $output .= $breadcrumbs[ $i ];

                if ( count( $breadcrumbs ) - 1 !== $i ) {
                    $output .= '</li>';
                }
            }

            if ( 1 === $showCurrent ) {
                $output .= sprintf(
                  '</li>%1$s%2$s%3$s',
                    $before, esc_html( get_the_title() ), $after
                );
            }
        } elseif ( is_tag() ) {
            $output .= sprintf(
              esc_html_x( '%1$s Posts tagged "%2$s" %3$s', 'breadcrumbs posts tagged', 'idaho-webmaster' ),
                $before, esc_html( single_tag_title( '', false ) ), $after
            );

        } elseif ( is_author() ) {

            global $author;
            $userdata = get_userdata( $author );
            $output .= sprintf(
              esc_html_x( '%1$s Articles posted by "%2$s" %3$s', 'breadcrumbs articles posted by', 'idaho-webmaster' ),
                $before, esc_html( $userdata->display_name ), $after
            );

        } elseif ( is_404() ) {
            $output .= sprintf(
              '%1$s%2$s%3$s',
                $before, esc_html( 'Error 404' ), $after
            );
        }

        if ( get_query_var( 'paged' ) ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
                $output .= ' (';
            }
            $output .= 'Page' . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
                $output .= ')';
            }
        }

        $output .= '</ol>';

        echo $output;

    }
}

?>
