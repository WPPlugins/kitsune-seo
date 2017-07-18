=== Automated SEO by Kitsune ===
Contributors: team@getkitsune.com
Donate link: http://getkitsune.com/
Tags: automatic tagging, SEO, site optimization, tags
Requires at least: 4.0
Tested up to: 4.7
Stable tag: 4.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Kitsune helps you improve your SEO organically, what’s even better? Everything we do for you is completely automated.

== Description ==
= Robots.txt =

Without a 'robots.txt file', search engine crawlers may spend a lot of time going through irrelevant content. However, modern search engine crawlers simulate your site like an actual user would visit it. This means that previously irrelevant content like css and javascript files become relevant as they are essential for user experience. This also means that any plugins that you use to add style or insert content becomes relevant.
Hence, our automatically generated 'robots.txt' file lets the search engine crawler experience the site as a regular user, thus, increasing your chance of ranking high in their index.


= Automatic Tag Generation =

Tags are used by search engines to find out what keywords and phrases are related to your post. This plugin automatically adds tags to posts that you have published or updated. Your post's content is sent to our API server, which returns tags by using advanced algorithms to figure out phrases and keywords relevant to your content (The daily limit is 100 tags). 
Using these tags, the search engine can understand what your post is about and can rank you accordingly for relevant search terms. Thereby, significantly increasing the chances of your posts being discovered.

= Updated Permalinks =

If you add content and its URL is not updated, then you will get a nasty 404 page which really crushes your score in the search engine's index. That's why we automatically update permalinks whenever you add or update a post and whenever tags are added to your post. This also let's the search engine crawler find more content via updated tag pages.
Hence, by keeping permalinks updated, search engines will know that your site is well maintained and increase your score in their search index.


= XML Sitemap =

Search engines don't know how your site is structured, so they find content by traversing links on your website and your server directory. By providing an XML sitemap, the search engine crawler can find content that could not have been found previously. The XML sitemap we generate includes all post types (including custom post types) and pages. It is automatically updated when new content is published and works wonders for getting your new content discovered quickly.

== Installation ==
= From within WordPress =

1. Visit 'Plugins > Add New' 
2. Search for 'Automated SEO by Kitsune' and download it. 
3. Click 'Activate' under 'Automated SEO by Kitsune' from your Plugins page. 

= Manually =

1. Upload the Kitsune-SEO folder to the /wp-content/plugins/ directory. 
2. Click 'Activate' under 'Automated SEO by Kitsune' from your Plugins page. 

== Frequently Asked Questions ==

= How do I access settings? =
Currently, there is no settings page. Everything is done automatically. If you would like to send us suggestions, you can do so by sending an email to 'team@getkitsune.com'.
We may include your suggestions in a future release.

= Why did my tag limit exceed when I only updated posts?. =

This happened, because, everytime you update a post the entire content must be sent for tagging again, since the content might
have been changed. Retagging the post again increases the tag count and thereby you reach your tag limit faster.

= Why is there a daily tag limit of 100? =

Tags are retrieved from an external server. Since this is a free service;
we have to make sure that the server remains at an optimal level for all users.
We are currently working on a premium version that allows more tags and features.

= When is the daily tag limit reset? =

Your tag limit will be reset to 0 exactly 24 hours (86,400,000 milliseconds) after you reach the limit.

= The sitemap is not showing all my contents urls ? =

The generated sitemap has a limit of 10,000 urls in the sitemap. This limit is set to prevent your server from overloading.

= What is the maximum size of the content that I can send for tagging? =

You can tag upto 15 kilobytes of textual data every time you publish.

== Screenshots ==

1. After post is published
2. Tags added by kitsune
3. XML sitemap

== Changelog ==

= 0.1 =
* Basic Release

== Upgrade Notice ==

= 0.1 =
This version is the intial release of basic features

== About Kitsune ==

Visit [GetKitsune](http://www.getkitsune.com/) for more details.
