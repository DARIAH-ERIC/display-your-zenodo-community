<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and the hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 * Also includes
 * @link       https://www.dariah.eu
 * @since      1.0.0
 * @package    Display_Your_Zenodo_Community
 * @subpackage Display_Your_Zenodo_Community/public
 * @author     Yoann Moranville <yoann.moranville@dariah.eu>
 */
class Display_Your_Zenodo_Community_Public {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;
	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $plugin_name The name of the plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Display_Your_Zenodo_Community_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Display_Your_Zenodo_Community_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/display-your-zenodo-community-public.css', array(),
			$this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Display_Your_Zenodo_Community_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Display_Your_Zenodo_Community_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/display-your-zenodo-community-public.js', array( 'jquery' )
			, $this->version, false );
	}

	function zp_query_vars( $query_vars ){
		$query_vars[] = 'zenodo_page';
		return $query_vars;
	}

	/**
	 * Render the result page of Zenodo community
	 *
	 * @since    1.0.0
	 */
	public function display_zenodo_data() {
        $display_your_zenodo_community_options = get_option( $this->plugin_name );
        $number_publications = 10;
        if( array_key_exists( 'number_publications', $display_your_zenodo_community_options ) ) {
            $number_publications = $display_your_zenodo_community_options['number_publications'];
        }

		$page = 1;
		if( is_numeric( get_query_var( 'zenodo_page' ) ) ) {
			$page = get_query_var( 'zenodo_page' );
		}
		$html = "<div id=\"display-your-zenodo-community\">";
		$result_api = $this->zp_retrieve_json( $page, $display_your_zenodo_community_options );
		$nb_pages = 1;
		if( isset( $result_api->aggregations->access_right->buckets[0]->doc_count ) ) {
			$nb_pages = ceil( $result_api->aggregations->access_right->buckets[0]->doc_count / $number_publications );
			$html .= "<hr>";
			$html .= "<div class=\"counter-doc\">";
			$html .= "<span class=\"wphal-nbtot\">";
			$html .= $result_api->aggregations->access_right->buckets[0]->doc_count;
			$html .= "</span>" . " documents";
			$html .= "</div>";
		}
		$html .= "<ul>";
		foreach ( $result_api->hits->hits as $hit ) {
			$html .= "<li>";
			$creator_str = "";
			$i = 0;
			foreach( $hit->metadata->creators as $creator ) {
				$creator_str .= $creator->name;
				if( ++$i !== sizeof( $hit->metadata->creators ) ) {
					$creator_str .= ", ";
				}
			}
			$html .= $creator_str . ".";
			$html .= " (" . date( "F, Y", strtotime( $hit->metadata->publication_date ) ) . ").";
			if( isset( $hit->metadata->title ) ) {
				$html .= " " . $hit->metadata->title;
			}
			if( isset( $hit->metadata->version ) ) {
				$html .= " (Version " . $hit->metadata->version . ")";
			}
			$html .= ". Zenodo.";
			if( isset( $hit->links->doi ) ) {
				$html .= " <a href='" . $hit->links->doi . "'>" . $hit->links->doi . "</a>";
			} elseif( isset( $hit->links->latest_html ) ) {
				$html .= " <a href='" . $hit->links->latest_html . "'>" . $hit->links->latest_html . "</a>";
			}
			$html .= "</li>";
		}
		$html .= "</ul>";

		$html .= "<ul class='zenodo-pagination'>";
		//Taken away from HAL plugin to have the same usability!
		if( $page == 1 ) {
			$html .= '<li class="disabled"><a href="#">&laquo;</a></li>';
		} else {
			$html .= '<li><a href="?zenodo_page=' . ( $page - 1 ) . '">&laquo;</a></li>';
		}
		if( $nb_pages <= 6 ) {
			for( $i = 1; $i <= $nb_pages; $i++ ) {
				if( $i == $page ) {
					$html .= '<li class="active"><a href="#">' . $i . '</a></li>';
				} else {
					$html .= ' <li><a href="?zenodo_page=' . $i . '">' . $i . '</a></li> ';
				}
			}
		} elseif( $nb_pages >= 7 ) {
			if( $page <= 3 ) {
				for( $i = 1; $i <= 4; $i++ ) {
					if( $i == $page ) {
						$html .= '<li class="active"><a href="#">' . $i . '</a></li>';
					} else {
						$html .= '<li><a href="?zenodo_page=' . $i . '">' . $i . '</a></li>';
					}
				}
				$html .= '<li class="disabled"><a href="#">&hellip;</a></li>';
				$html .= '<li><a href="?zenodo_page=' . ( $nb_pages - 1 ) . '">' . ( $nb_pages - 1 ) . '</a></li>';
				$html .= '<li><a href="?zenodo_page=' . $nb_pages . '">' . $nb_pages . '</a></li>';
			}
			if( $page >= 4 && $page <= $nb_pages - 3 ) {
				$html .= '<li><a href="?zenodo_page=1">1</a></li>';
				$html .= '<li class="disabled"><a href="#">&hellip;</a></li>';
				$html .= '<li><a href="?zenodo_page=' . ( $page - 2 ) . '">' . ( $page - 2 ) . '</a></li>';
				$html .= '<li><a href="?zenodo_page=' . ( $page - 1 ) . '">' . ( $page - 1 ) . '</a></li>';
				$html .= '<li class="active"><a href="#">' . $page . '</a></li>';
				$html .= '<li><a href="?zenodo_page=' . ( $page + 1 ) . '">' . ( $page + 1 ) . '</a></li>';
				$html .= '<li><a href="?zenodo_page=' . ( $page + 2 ) . '">' . ( $page + 2 ) . '</a></li>';
				$html .= '<li class="disabled"><a href="#">&hellip;</a></li>';
				$html .= '<li><a href="?zenodo_page=' . $nb_pages . '">' . $nb_pages . '</a></li>';
			}
			if( $page >= $nb_pages - 2 ) {
				$html .= '<li><a href="?zenodo_page=1">1</a></li>';
				$html .= '<li><a href="?zenodo_page=2">2</a></li>';
				$html .= '<li class="disabled"><a href="#">&hellip;</a></li>';
				for ($i = $nb_pages - 3; $i <= $nb_pages; $i++) {
					if ($i == $page) {
						$html .= '<li class="active"><a href="#">' . $i . '</a></li>';
					} else {
						$html .= '<li><a href="?zenodo_page=' . $i . '">' . $i . '</a></li>';
					}
				}
			}
		}
		if( $page < $nb_pages ) {
			$html .= '<li><a href="?zenodo_page=' . ( $page + 1 ) . '">&raquo;</a></li>';
		} else {
			$html .= '<li class="disabled"><a href="#">&raquo;</a></li>';
		}
		$html .= "</ul>";
		//Stop code taken from HAL plugin

		$html .= "</div>";
		return $html;
	}

	/**
	 * Action to do when the page is created, so we can make a request to Zenodo and display the results.
	 *
	 * @param int $page Page of Zenodo data
	 *
	 * @return string The full JSON response from the query
	 * @since    1.0.0
	 */
	public function zp_retrieve_json( $page = 1, $display_your_zenodo_community_options ) {
        $choice = $id_community_orcid = $extra_keyword = "";
        $number_publications = 10;
        if( array_key_exists( 'choice', $display_your_zenodo_community_options ) ) {
            $choice = $display_your_zenodo_community_options['choice'];
        }
        if( array_key_exists( 'id_community_orcid', $display_your_zenodo_community_options ) ) {
            $id_community_orcid = $display_your_zenodo_community_options['id_community_orcid'];
        }
        if( array_key_exists( 'extra_keyword', $display_your_zenodo_community_options ) ) {
            $extra_keyword = $display_your_zenodo_community_options['extra_keyword'];
        }
        if( array_key_exists( 'number_publications', $display_your_zenodo_community_options ) ) {
            $number_publications = $display_your_zenodo_community_options['number_publications'];
        }

		$zenodo_api_url = "https://zenodo.org/api/records/?sort=mostrecent&size=" .$number_publications . "&page=" . $page . "&";
        $zenodo_api_query = "";
		if( $choice == 'community' ) {
			$zenodo_api_query = "communities=" . $id_community_orcid;
			if( $extra_keyword !== '' ) {
                $zenodo_api_query .= "&q=keywords:%22" . $extra_keyword . "%22";
            }
		} elseif ( $choice == 'orcid' ) {
			$zenodo_api_query = "q=(creators.orcid:%22" . $id_community_orcid . "%22";
            if( $extra_keyword !== '' ) {
                $zenodo_api_query .= " AND keywords:%22" . $extra_keyword . "%22)";
            } else {
                $zenodo_api_query .= ")";
            }
		}
        $zenodo_api_url .= $zenodo_api_query;
		if( $id_community_orcid !== '' && $zenodo_api_url !== '' ) {
			$request = wp_remote_get( $zenodo_api_url );
			if( is_wp_error( $request ) ) {
				return false;
			}
			$body = wp_remote_retrieve_body( $request );
			return json_decode( $body );
		} else {
			return false;
		}
	}
}
