=== Ustream Status ===
Contributors: katz515
Plugin Name: Ustream Status
Plugin URI: http://katzueno.com/wordpress/ustream-status/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=R8S6WTYMY9SXG
Author: Katz Ueno
Author URI: http://katzueno.com/
Tags: livecasting, status, ustream, live cast
License: GPL2
Requires at least: 2.8.0
Tested up to: 4.6.0
Stable tag: 3.0.0

Display the online/offline status of a Ustream channel

== Description ==

"Ustream Status" is a widget and shortcode plug-in to display the live/offline status of a Ustream channel, using the desired images.

Enter a Ustream channel, and it will fetch the online/offline status. Then it will display the online/offline status image of your choice.

Ustream is one of the major live casting service providers that anybody can start a live cast for free or even make money.

At this point, this Ustream Status only supports one channel per blog. (You can place multiple widgets of one channel.)

You want me to be able to add more? Then I'll wait for your feedback.

SAMPLE SITE (although you only see it when I'm live)
http://katzueno.com/

I'm looking for your feedback! Please contact me via my website
or @katz515 on twitter.

Fork me on GitHub. Pull Requests are always welcome!
https://github.com/katzueno/UstreamStatus-WordPress

Plug-in Support Page
http://katzueno.com/wordpress/ustream-status/

Also check out my other WordPress plugins
http://katzueno.com/wordpress/


== Installation ==

How to install and use it

= Installation =

1. Upload `ustream-status` folder to the `/wp-content/plugins/` directory or you can install from admin panel directly.
1. Activate the plugin through the 'Plugins' menu in WordPress

= Preparation =

1. Create Ustream account (if you haven't done so)
1. Upload two (2) images which indicates online and offline status, and obtain URL

= Create a widget =

1. Go to `Appearance` - `Widget` and set up your Ustream channel and enter the image URLs
1. Save

This plugin uses cache. You may have to wait for 60 seconds until you see the channel becomes live or offline. Please be patient!

= Insert a shortcode =

Enter the shortcode as following format

[ustream-status channel="Channel Name" online="Online Image URL" offline="Offline Image URL"]

- Channel Name: Enter the channel name (Or you can enter the full URL of a Ustream channel)
- Online Image URL: Enter the full path to the online image.
- Offline Image URL: Enter the full path to the online image.

Shortcode Example:

[ustream-status channel="nasahdtv" online="http://example.com/nasa_online.gif" offline="http://example.com/nasa_offline.gif"]

This plugin uses cache. You may have to wait for 60 seconds until you see the channel becomes live or offline. Please be patient!

= When You Cleaning-up and/or When you uninstall This plugin =

When you constantly adding and deleting channel, or when you want to uninstall this plug-in, you may want to consider using one of the following plug-in since this plug-in uses transient as part of cache.

https://wordpress.org/plugins/delete-expired-transients/
https://wordpress.org/plugins/artiss-transient-cleaner/


== Frequently Asked Questions ==

= What do I need? =

In addition to WordPress site, you need to sign-up at Ustream.tv and start live casting.

= How do I sign up for Ustream? =

Click sgn-up icon from Ustream.tv

= I don't have any images for offline/online images =

You need to make your own images. I may make preset later if you ask me so.

= I'm live. But my status won't change. =

First, wait for 60 seconds. Ustream Status uses cache. It only check the live/offline status once every 120 seconds.

If you don't see the change os status after 120 seconds you become live, you may have misspelled your Ustream ID, your WordPress site may be having hard time reaching Ustream Server, or your IP may be blocked from Ustream Server.

= How can I check if Ustream server is working or not? =

If you're still having problem getting the status, you can think of the following situation

- You mistyped your Ustream channel
- You mistyped the wrong URL of images
- Ustream Server may be having some problem.
- Your WordPress server may be blocked from Ustream Server



== Screenshots ==

1. Setting menu at the widget

1. Ustream Status in action

== Changelog ==

= 3.0.0 =

* Switch to support new Ustream API.
* You don't notice the difference but I completely changed the way the plugin fetch the online status.

= 2.0.3 =

* Ustream API no longer accepts http request but https.

= 2.0.2 =

* Fix shortcode output.

= 2.0.1 =

* Fix the `Warning: file_get_contents(http://api.ustream.tv/php/channel/wotstv/getValueOf/status) [function.file-get-contents]: failed to open stream: no suitable wrapper could be found in /path/to/wordpress/wp-content/plugins/ustream-status/ustreamstatus.php on line 96.` error

= 2.0.0 =

* Support multiple channel.
* Support shortcode.
* Reduced the cache time to 60 sec from 120 sec

= 1.0.0 =

* The initial version. This version should work ok.

== Upgrade Notice ==

= 2.0.1 =

* Fix the `Warning: file_get_contents(http://api.ustream.tv/php/channel/wotstv/getValueOf/status) [function.file-get-contents]: failed to open stream: no suitable wrapper could be found in /path/to/wordpress/wp-content/plugins/ustream-status/ustreamstatus.php on line 96.` error

= 2.0.0 =

* Support multiple channel.
* Support shortcode.

= 1.0.0 =

This is initial version.
