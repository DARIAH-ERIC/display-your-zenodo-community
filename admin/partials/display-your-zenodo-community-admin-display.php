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

	<h2 class="nav-tab-wrapper">Zenodo Settings</h2>
    <p>Please select in the dropdown list either "Community" or "ORCID" and enter the value corresponding.</p>
    <p>If you select "Community", please enter a value such as "dariah" so a query on
        https://zenodo.org/api/records/?communities=dariah returns results.</p>
    <p>If you select "ORCID", please enter a value such as "0000-0002-5350-067X" so a query on
        https://zenodo.org/api/records/?q=creators.orcid:"0000-0002-5350-067X" returns results.</p>

    <form method="post" name="display_your_zenodo_community_options" action="options.php">

		<?php
		//Grab all options
        $display_your_zenodo_community_options = get_option( $this->plugin_name );
        $choice = $display_your_zenodo_community_options['choice'];
        $id_community_orcid = $display_your_zenodo_community_options['id_community_orcid'];

        $html = "<tr>
                    <th scope=\"row\">
                        <label for=\"" . $this->plugin_name . "-choice\">" . translate('Choice of community or orcid',
				$this->plugin_name) . "</label>
                    </th>
                    <td>
                        <select name=\"" . $this->plugin_name . "[choice]\" id=\"" . $this->plugin_name . "-choice\">
                            <option value=\"community\"" . (($choice=='community')?" selected=\"selected\"":"") . ">Community</option>
                            <option value=\"orcid\"" . (($choice=='orcid')?" selected=\"selected\"":"") . ">ORCID</option>
                        </select>
                    </td>
                </tr>";
        $html .= "<tr>
                    <th scope=\"row\">
                        <label for=\"" . $this->plugin_name . "-id-community-orcid\">" . translate('Value (e.g. dariah or 0000-0002-5350-067X)',
		        $this->plugin_name) . "</label>
                    </th>
                    <td>
                        <input name=\"" . $this->plugin_name . "[id_community_orcid]\" id=\"" . $this->plugin_name
                        . "-id-community-orcid\" value=\"" . $id_community_orcid . "\" type=\"text\">
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
