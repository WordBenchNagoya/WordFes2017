=== BxSlider WP ===
Contributors: kosinix
Donate link: http://www.codefleet.net/donate/
Tags: bxslider, multilingual, rtl, ltr, wordpress, slider, slideshow, carousel, jquery, responsive, custom post
Requires at least: 3.5
Tested up to: 4.8
Stable tag: trunk
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

An easy-to-use WordPress slider plugin for bxSlider.

== Description ==

Provides an easy-to-use interface for building responsive sliders and tickers with built-in touch support.

= Features: =
* Very easy-to-use interface! Blends seamlessly with your WordPress workflow.
* Fully responsive - will adapt to any device.
* Horizontal, vertical, and fade modes.
* Slides can contain images, video, or HTML content.
* Advanced touch / swipe support built-in.
* Uses CSS transitions for slide animation (native hardware acceleration!).
* Small file size, fully themed, simple to implement.
* Browser support: Firefox, Chrome, Safari, iOS, Android, IE7+
* Ability to add links to images.
* Add multiple images at once.
* Tons of configuration options. Checkout the screenshots.
* It's FREE!

= More Info =
Learn more about [BxSlider WP](https://www.codefleet.net/bxslider-wp/). 

= Premium Version =
BxSlider WP Pro is the premium version of BxSlider WP which allows more configuration options. Checkout the [comparison table](http://www.codefleet.net/bxslider-wp/#comparison).

= Examples =
Check out what you can do with these [examples](https://www.codefleet.net/bxslider-wp/examples/).

= Credits =
BxSlider WP was based on [bxSlider](http://bxslider.com/) script by [Steven Wanderski](http://stevenwanderski.com/).

== Installation ==

= Install via WordPress Admin =
1. Ready the zip file of the plugin
1. Go to Admin > Plugins > Add New
1. On the upper portion click the Upload link
1. Using the file upload field, upload the plugin zip file here and activate the plugin

= Install via FTP =
1. First unzip the plugin file
1. Using FTP go to your server's wp-content/plugins directory
1. Upload the unzipped plugin here
1. Once finished login into your WP Admin and go to Admin > Plugins
1. Look for "BxSlider WP" and activate it

= Usage =
1. Start adding sliders in 'BxSlider' menu in WordPress
1. You can then use a shortcode to display your slider. Example: `[bxslider id="slider-1"]`
1. Function do_shortcode can be used inside template files. Example: `<?php echo do_shortcode('[bxslider id="slider-1"]'); ?>`


== Frequently Asked Questions ==

= How to display it in post/page? =
Use the shortcode `[bxslider id="slider-1"]`. Make sure to change "slider-1" to the ID of your slider.

= How to display it inside template files (header.php, index.php, page.php, etc.)? =
Use `<?php echo do_shortcode('[bxslider id="slider-1"]'); ?>`


== Screenshots ==

1. All slider Screen
2. Slider Editing Screen
3. Slider in Action

== Changelog ==

= 2.0.0 - 2017-06-10 =
* Major refactoring. Now shares the same codebase with pro.
* Fix language files not loading.
* Tested with latest WordPress version.
* More RTL support in the GUI.

= 1.5.2 - 2015-01-06 =
* Merge with changes from pro.
* Change codebase to use dependency injection container, autoloader and improved template view class.

= 1.4.1 - 2014-09-02 =
* Fix. Regression bug where function bxslider() does not work anymore.

= 1.4.0 - 2014-08-30 =
* Major code refactoring and clean-up for future updates. Plugin now easily overridable. 
* Activating free and pro at the same time will not trigger an error. Pro will just override it. Both versions should be 1.4.0 or greater for this to work.
* Updated bxslider scripts to 4.1.2.
* Fix bug when using horizontal mode when using CSS transitions ("Use CSS" checked in settings). 

= 1.3.3 - 2013-08-14 =
* Added metabox to easily grab slider codes.
* Added function bxslider to display slider in template files.
* Fix readme grammar.

= 1.3.2 - 2013-08-09 =
* Normalized css for twentytwelve and twentythirteen themes.
* Added styles to prevent FOUC (flash of unstyled content).
* Caption option now defaults to true.
* Add function check to prevent "function already exists" conflict with premium version.
* Fix for WPMU by loading language in plugins_loaded hook.
* Check for ABSPATH in template views.
* Allowed slider script and view path to be easily overridden in functions.php.

= 1.3.1 - 2013-07-19 =
* Added ability to add multiple images at once.
* Fix slider on RTL themes.
* Added Hebrew language files and translations.

= 1.0.0 - 2013-07-11 =
* Added ability to add links to images; and option to open a link in the same window or new tab.
* Added ability to easily select and copy the shortcode.
* Only load jquery easing and fitvid scripts when needed.
* Added minified version of initialization script.
* Updated language files.
* Code enhancements and updated strings.

= 0.0.9 - 2013-07-05 =
* Initial release.


== Upgrade Notice ==

See changelog
