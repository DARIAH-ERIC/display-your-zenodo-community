# Changelog
All notable changes to the Zenodo plugin will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [1.2.1] - 2022-04-19
### Added
- Shortcodes can now take a keyword attribute - it will bypass the admin `extra keyword` option and search only for the records with this keyword/tag in Zenodo.

## [1.2.0] - 2021-01-03
### Added
- Administrators can add a keyword for limiting the results. This is for example to select a subset of the publication for a certain project within an institution.
- Administrators can choose the number of publications shown per page (default is 10)
### Changed
- Fixed a bug that would make the plugin query Zenodo at the init stage of all pages

## [1.1.0] - 2020-07-01
### Added
- The plugin now allows users to retrieve their publications with their ORCID and not only Community publications
### Changed
- Change name of plugin (old `Display your Zenodo Community`)
- Screenshots have been updated

## [1.0.3] - 2020-05-19
### Changed
- Bump the version on WordPress website

## [1.0.2] - 2020-05-19
### Added
- Add description in order to add a shortcode to the page

## [1.0.1] - 2020-05-15
### Added
- Added 2 screenshots for WordPress
### Changed
- Modification of description
- Modification of plugin author

## [1.0.0] - 2020-05-07
### Added
- First skeleton of the plugin
- Addition of document counter

### Changed
- Fix page counter