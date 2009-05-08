=== Plugin Name ===
Contributors: clifgriffin
Donate link: http://clifgriffin.com/code/donate/
Tags: recent, categories, featured, display posts from category
Requires at least: 2.3.0
Tested up to: 2.7.1
Stable tag: 1.0.2.1

Displays recent posts from a specified category in a customizable box on the home page of the blog.

== Description ==
Featured Category allows you to display recent posts from the category of your choosing at the top of your home page before "The Loop". You are able to customize the number of posts, the style they are displayed in, and the heading used to describe. It is perfect for displaying recent news, projects, and other things you may wish to stand out in your blog.

This is not a sidebar widget. It is a home page addition. See the provided screenshots to understand how it might look on your site.

= Version History =
**1.0.2.1**

* Fixed security issue. Now only administrators can modify admin settings.
* Deleted trailing spaces at the end of the main plugin file. This was somehow causing conflicts with WP Super Cache plugin. Bizzarre, I know.

= Version History =
**1.0.2**

* Fixed path name. (Wordpress renamed the installation folder.)

**1.0.1**

* Settings page now sets the category drop down box selection when you return to the page.
* It shouldn't run in sidebar widgets anymore. (Assuming the content portion loads before sidebar...I may need to tweak this in the future.)

**1.0**

* Original release.

= Background = 

About a month ago I began searching for a plugin I just knew existed.  I needed a plugin that would allow me to select a category, a number of posts, and display a neatly formatted list of the applicable posts from that category.

For the site in question, I needed to list recent posts from a "Projects" category. I imagined that there would be at minimum a plugin for posting news items that I could modify. I settled with using The_Loop. At the time I made a mental note "I need to turn this into a plugin."

Which brings us to Featured Category, my first Wordpress Plugin. (Be gentle!)

I tried to follow the Wordpress API as closely as possible. 

Once you activate the plugin, simply load its settings page and choose the category, the title or "heading" and the number of posts you wish to display. 

If the style is not to your liking, modify featcat_style.css in the plugin directory. I have included entries for implemented and unimplemented portions to speed things up.

== Installation ==

1. Upload the directory "featured-category" to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Customize settings via settings control panel in wordpress administration pages.

== Frequently Asked Questions ==

= How do I customize the style? =

Modify featcat_style.css.

= Can feature x be added? =

Probably! E-mail me: webmaster[at]clifgriffin.com

== Screenshots ==

1. A sample from my site.
2. The settings page.
