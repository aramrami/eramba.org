=== Zendesk Request Form ===
Contributors: pipdig
Tags: zendesk, zendesk integration, zendesk support, zendesk ticket, helpdesk, support, form, ticket, support ticket, zendesk api, shortcode
Requires at least: 4.6
Tested up to: 4.7
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add a Zendesk Support Form directly to your WordPress site.

== Description ==

Add a **Zendesk Support** form to your WordPress site. This plugin will embed the form directly into your page content, matching your theme's styling where possible. You can add a basic form very easily in minutes!

Want to create multiple forms with different fields? You can setup custom fields and options using the advanced features available.

**Features and Options:**

* Uses the Zendesk API to open a ticket directly within your account. No need to worry about missed emails!
* Support for Zendesk custom [ticket fields](https://support.zendesk.com/hc/en-us/articles/203661506-About-ticket-fields).
* Create multiple forms with different ticket fields.
* Spam protection to avoid fake submissions.
* Double click protction - Stop people from submitting the form twice by accident.
* Pre-fill form fields with user data for people who are logged in to WordPress.
* Redirect user after form submission.
* Google Analytics Events tracking on form submission.
* Automatically check email address for typos and suggest solutions via [mailcheck.js](https://github.com/mailcheck/mailcheck).
* Add User Agent and [CloudFlare Geolocation](https://support.cloudflare.com/hc/en-us/articles/200168236-What-does-CloudFlare-IP-Geolocation-do) data (if available) to the ticket.
* HTTPS or plain HTTP support (HTTPS recommended).
* HTML5 Pattern validation on fields.
* Data is validated/sanitized before sending to Zendesk.

We this plugin for our own support system, so you can be assured that we will update and maintain it into the future. If you have any features suggestions, you are welcome to ask in the [support forum](https://wordpress.org/support/plugin/zendesk-request-form).

**Supported Custom Field Types:**

* Text
* Number
* URL
* Email
* Password
* Checkbox
* Dropdown
* Hidden
* Descriptive (Arbitrary HTML/Text)

If you have found this plugin useful, please consider [leaving a review](https://wordpress.org/support/plugin/zendesk-request-form/reviews/#new-post). Share some Zen :)

**Languages / Localization**

If you would like to translate the form into your language, please [click here](https://translate.wordpress.org/projects/wp-plugins/zendesk-request-form/dev).

== Installation ==

1. Go to 'Plugins > Add New' in your WordPress dashboard and search for "Zendesk Request Form". Install and activate the plugin.
2. Add your Zendesk API information to the options under 'Settings > Zendesk Form' in your WP dashboard. You can generate an API key from your Zendesk dashboard using [this guide](https://support.zendesk.com/hc/en-us/articles/226022787-Generating-a-new-API-token-).
3. Add the shortcode [zendesk_request_form] to any post/page. This will add a basic form to the page with the minimum required fields to open a new ticket in Zendesk.
4. Optionally, you can also add any custom fields to your form by using the shortcode options described in 'Setttings > Zendesk Form'.

== Screenshots ==

1. Basic request form with no options.
2. Advanced request form using custom fields and options.
3. Settings page.
4. Shortcode/form attributes and options.

== Frequently Asked Questions ==

= How do I get my Zendesk API key? =

You can generate an API key from your Zendesk dashboard using [this guide](https://support.zendesk.com/hc/en-us/articles/226022787-Generating-a-new-API-token-).

= How are messages sent to Zendesk? =

This plugin will connect directly to your Zendesk account via the Zendesk API. This means you do not need to worry about missed emails being sent. The data is transferred directly via the WordPress HTTP API.

= Can I translate the form text/language? =

This plugin is fully translatable into any language. If you find that there is some text that has not already been translated, you can add your language on [this page](https://translate.wordpress.org/projects/wp-plugins/zendesk-request-form/dev).

= Is this plugin free? =

Yup! And it always will be. We have no plans to create a "pro" version. This plugin was created for our own suppport site, so we will continue to add new features. If you have a suggestion, you are welcome to post it in the [support forum](https://wordpress.org/support/plugin/zendesk-request-form).

If you'd like to make a donation, the best thing you can do is [leave a 5 star rating](https://wordpress.org/support/plugin/zendesk-request-form/reviews/#new-post) :)

== Changelog ==

= 2.3.3 =
* Fix: Missing subject field.
* Enhancement: If theme does not include form styling, make form 100% width of container.

= 2.3.2 =
* Enhancement: Option to remove User-Agent string from showing at the bottom of ticket description. Set shortcode parameter `useragent="no"` to disable.
* Minor refactoring to improve code readability.

= 2.3.1 =
* Enhancement: More efficient form action/loading time.
* Fix: Issue with Contact Form 7 plugin.

= 2.3.0 =
* New: Dropdown custom field support.
* New: [HTML5 pattern](http://www.w3schools.com/tags/att_input_pattern.asp) option for custom feilds.
* Enhancement: Prevent "double click" duplicate form submissions.
* Enhancement: Disable spam check if requester is logged in.
* Enhancement: Add [CloudFlare Geolocation](https://support.cloudflare.com/hc/en-us/articles/200168236-What-does-CloudFlare-IP-Geolocation-do) to User-Agent data.
* Enhancement: Extra spam protection.
* Enhancement: Update to match new [Zendesk branding](https://www.zendesk.com/blog/the-zendesk-rebrand/).

= 2.2.5 =
* New: Option to Pre-fill Name and Email via shortcode.
* New: Option to disable prefilling of field information from logged in user account.

= 2.2.2 =
* New: Checkbox custom field support.
* Enhancement: Set unique ID on field `<p>` tags for easier styling.

= 2.1.0 =
* New: Google Analytics Events tracking on form submit button.

= 2.0.0 =
* Custom ticket fields.
* Group specified fields into different instances of form/shortcode.
* Extra form customization options via shortcode attributes.
* Pre-fill form fields with user data for useres who are logged in to WordPress.
* Custom url to redirect user to once the form is submitted.
* Pre-fill custom fields via GET from url query.
* Add browser User-Agent string to ticket data.
* Declare WordPress 4.5 support.

= 1.0.2 =
* Improved error messages.

= 1.0.1 =
* Use WP http API instead of cURL.

= 0.9 =
Initial release.