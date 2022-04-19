=== Display your Zenodo Publications ===
Contributors: yoannspace
Donate link:
Tags: zenodo, dariah, operas, community, api
Requires at least: 4.9.1
Tested up to: 5.9
Requires PHP: 5.6.35
Stable tag: 1.2.1
License: Apache License - 2.0
License URI: http://www.apache.org/licenses/LICENSE-2.0

This WordPress plugin allows users to see their Zenodo publications (either from a Community or related to their ORCID).

== Description ==

This WordPress plugin allows users to display content of their [Zenodo](https://zenodo.org/) Community or the publications of an author using an ORCID on Wordpress pages, for instance, if they wish to integrate a dynamic bibliography of their work with their blog or website.
To do so, access to the [Zenodo REST API](https://developers.zenodo.org/) is required, without it, the plugin will not work. When using this plugin, you will also need to accept the Zenodo’s [Privacy Policy](https://about.zenodo.org/privacy-policy/) and its [Terms of Use](https://about.zenodo.org/terms/).
Originally, the plugin has been created for and by [DARIAH-EU](https://www.dariah.eu). You can find it implemented here: [https://www.dariah.eu/about/publications/](https://www.dariah.eu/about/publications/).

== Installation ==

Via WordPress plugins
1. Install via [WordPress plugins](https://www.wordpress.org/plugins/display-your-zenodo-community)
1. Activate the plugin through the 'Plugins' menu in WordPress

Manually
1. Upload directory `display-your-zenodo-community` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

A very simple administration page (in Settings -> Zenodo) to choose your Zenodo community (e.g. `dariah` or `operaseu`).
For administrators, possibility as well to search for a subset (with keywords) of the publications, as well as possibility to choose the number of publication shown per page.
On the page you want to present the Zenodo data, add the shortcode `[display-your-zenodo-community]` to see the publications.

A new option is possible: by entering a parameter `keyword` directly in your shortcode (e.g. `[display-your-zenodo-community keyword='DMP']`), you would only retrieve the records of your community (or ORCID user) that have this specific tag/keyword. That's to be able to provide different lists of records on different pages of the same website (we could also add the possibility for different communities/orcid as well if anyone needs it).
Note: It will favour/prefer the keyword parameter over the admin option extra_keyword (if it was entered), so the admin option would be overwritten by this keyword parameter.

== Frequently Asked Questions ==

= I don't have an ORCID, can I still use the plugin to display my publications with my name? =
Unfortunately, no. The reason being that queries to the Zenodo API do not work well with names since they can't
differentiate authors.

== Screenshots ==

1. Display of the Zenodo Community data on the DARIAH-EU website
2. Very simple administration page to choose your Zenodo community
3. Very simple administration page to choose your ORCID

== Changelog ==

= 1.2.1 =
* Shortcodes can now take a keyword attribute - it will bypass the admin `extra keyword` option and search only for the records with this keyword/tag in Zenodo.

= 1.2.0 =
* Administrators can add a keyword for limiting the results. This is for example to select a subset of the publication for a certain project within an institution.
* Administrators can choose the number of publications shown per page (default is 10)
* Fixed a bug that would make the plugin query Zenodo at the init stage of all pages

= 1.1.0 =
* The plugin now allows users to retrieve their publications with their ORCID and not only Community publications
* Change name of plugin (old `Display your Zenodo Community`)
* Screenshots have been updated

= 1.0.3 =
* Bump the version on WordPress website

= 1.0.2 =
* Add description in order to add a shortcode to the page

= 1.0.1 =
* Added 2 screenshots for WordPress
* Modification of description
* Modification of plugin author

= 1.0.0 =
* First skeleton of the plugin
* Addition of document counter
* Fix page counter

== Upgrade Notice ==

No upgrade notice for now
