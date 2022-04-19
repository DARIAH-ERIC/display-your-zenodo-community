# Display your Zenodo Publications

This WordPress plugin allows users to display content of their [Zenodo](https://zenodo.org/) Community or the publications of an author using an ORCID on Wordpress pages, for instance, if they wish to integrate a dynamic bibliography of their work with their blog or website.
To do so, access to the [Zenodo REST API](https://developers.zenodo.org/) is required, without it, the
plugin will not work. When using this plugin, you will also need to accept the Zenodo’s [Privacy Policy](https://about.zenodo.org/privacy-policy/) and its [Terms of Use](https://about.zenodo.org/terms/).
Originally, the plugin has been created for and by [DARIAH-EU](https://www.dariah.eu). You can find it implemented here: [https://www.dariah.eu/about/publications/](https://www.dariah.eu/about/publications/).

---

# Install (via WordPress plugins)
1. Install via [WordPress plugins](https://www.wordpress.org/plugins/display-your-zenodo-community)
1. Activate the plugin through the 'Plugins' menu in WordPress

# Install (manually)
1. Upload directory `display-your-zenodo-community` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

A very simple administration page (in Settings -> Zenodo) to choose your Zenodo community (e.g. `dariah` or `operaseu
`) or choose your personal ORCID. For administrators, possibility as well to search for a subset (with keywords) of
 the publications, as well as possibility to choose the number of publication shown per page. 
On the page you want to present the Zenodo data, add the shortcode `[display-your-zenodo-community]` to see the publications.

A new option is possible: by entering a parameter `keyword` directly in your shortcode (e.g. `[display-your-zenodo-community keyword='DMP']`), you would only retrieve the records of your community (or ORCID user) that have this specific tag/keyword. That's to be able to provide different lists of records on different pages of the same website (we could also add the possibility for different communities/orcid as well if anyone needs it).\
**Note:** It will favour/prefer the keyword parameter over the admin option extra_keyword (if it was entered), so the admin option would be overwritten by this keyword parameter.

# How does it work?
With API request directly to Zenodo, with your community identifier or your ORCID added in the admin page, you can
 retrieve some information of disseminated data on Zenodo and print them on your Wordpress website.
