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
`) or choose your personal ORCID. Possibility as well to search for a subset (with keywords) of the publications.
On the page you want to present the Zenodo data, add the shortcode `[display-your-zenodo-community]` to see the publications.
# How does it work?
With API request directly to Zenodo, with your community identifier or your ORCID added in the admin page, you can
 retrieve some information of disseminated data on Zenodo.
