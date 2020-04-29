<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.dariah.eu
 * @since      1.0.0
 *
 * @package    Display_Your_Zenodo_Community
 * @subpackage Display_Your_Zenodo_Community/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

	<h2 class="nav-tab-wrapper">RDFa Settings</h2>

    <form method="post" name="display_your_zenodo_community_options" action="options.php">

		<?php
		//Grab all options
        $display_your_zenodo_community_options = get_option( $this->plugin_name );
        $id_community = $display_your_zenodo_community_options['id_community'];

        $html = "<tr>
                    <th scope=\"row\">
                        <label for=\"" . $this->plugin_name . "-id-community\">" . translate('Name of community (e.g. dariah)',
		        $this->plugin_name) . "</label>
                    </th>
                    <td>
                        <input name=\"" . $this->plugin_name . "[id_community]\" id=\"" . $this->plugin_name
                        . "-id-community\" value=\"" . $id_community . "\" type=\"text\">
                    </td>
                </tr>";

		settings_fields( $this->plugin_name );
		do_settings_sections( $this->plugin_name );
		?>

        <table class="form-table">
            <tbody>
                <?php echo $html; ?>
            </tbody>
        </table>

		<?php submit_button( __( 'Save all changes', $this->plugin_name ), 'primary','submit', TRUE ); ?>
	</form>

</div>
