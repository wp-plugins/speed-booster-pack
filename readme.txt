=== Speed Booster Pack ===
Contributors: tiguan
Tags: speed, optimization, performance, speed booster, scripts to the footer, Google Libraries, CDN, defer parsing of javascript, remove query strings, GTmetrix, Google PageSpeed, YSlow
Requires at least: 3.6
Tested up to: 3.9.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Features options to improve your website performance and get a higher score on the major speed testing services.

== Description ==

Speed Booster Pack allows you to improve your page loading speed and get a higher score on the major speed testing services such as [GTmetrix](http://gtmetrix.com/), [Google PageSpeed](http://developers.google.com/speed/pagespeed/insights/), *YSlow* or other speed testing tools.

= Speed Booster Pack Features =

* **Moves scripts to the footer** to improve page loading speed, while keeping stylesheets in the header.
* **Loads javascript files from Google Libraries** rather than serving them from your WordPress install directly, to reduce latency, increase parallelism and improve caching.
* **Defers parsing of javascript files** to reduce the initial load time of your page.
* **Removes query strings from static resources** to improve your speed scores.
* **Removes junk header tags** to clean up your WordPress Header.
* **Page Load Stats** - is a brief statistic that displays your homepage loading speed (in seconds) and number of processed queries.

**Page loading time** – the progress bar color will be:

* *green* if the page load takes less than a second
* *orange* when loading the page takes between 1 and 2 seconds
* *red* if the page loading takes longer than 2 seconds

**Number of executed queries** – the progress bar color will be:

* *green* if there were less than 100 queries
* *orange* if there were between 100 and 200 queries
* *red* if the page required more than 200 queries

For complete usage instructions visit [Plugin Documentation](http://tiguandesign.com/docs/speed-booster/)

== Installation ==

1. Download the plugin (.zip file) on your hard drive.
2. Unzip the zip file contents.
3. Upload the `speed-booster-pack` folder to the `/wp-content/plugins/` directory of your site.
4. Activate the plugin through the 'Plugins' menu in WordPress.
5. A new sub menu item `Speed Booster Pack` will appear in your main Settings menu.