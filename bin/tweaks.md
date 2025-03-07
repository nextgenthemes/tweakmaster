## Tweaks

* **Remove version query strings**
<br>Removes <code>?ver=1.2.3</code> from all styles and scripts.
* **Disable feeds**
* **Disable emojis**
* **Search single result redirect**
* **Disallow File Edits**
<br>Disables the ability to edit files in the file manager. Sets <code>DISALLOW_FILE_EDIT</code> constant to true. Does only work if the constant is already defined, usually in wp-config.php
* **Admin bar greeting**
<br>Replace "Howdy, {name}" with a custom message. Use <code>{name}</code> for the user's display name. For example <code>Hi, {name}!</code>. Leave empty for no greeting. Use <code>default</code> for the default greeting, preventing the tweak from running.
* **Enable fonts to uploads**
<br>Move (Google) Fonts enabled in the Block Editor from wp-content/fonts to wp-content/uploads
* **Disable auto trash emptying**
* **Set trash keep days**
<br>Set the number of days to keep posts in the trash. Default is 30 days.
* **Scroll progress bar**
* **Scroll progress color**
<br><a href="https://oklch.com/#46,0.0741,270,100" target="_blank">And valid css will work. You can use this color picker!</a>, copy the 2nd field.
* **Scroll progress bar background color**
* **Scroll progress height**
* **Set user agent**
<br>WP really hates privacy and sends this <code>WordPress/1.0; https://example.org</code> to every site it makes calls to. You can empty the field, pretend to be Chrome <code>Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36</code> or something else. <code>default</code> will change nothing.
* **Remove EXIF**
<br>Remove EXIF data from uploaded images.
* **Convert jpeg to avif**
<br>Convert uploaded jpeg to avif
* **Avif compression**
<br>Default is 82
* **Jpeg compression**
<br>Default is 82
* **Webp compression**
<br>Default is 86
* **Limit ALL revisions**
<br>Limit revisions for all post types. This will override the limit for each post type from above!
* **Disable XML-RPC**
* **Remove WP version**
<br>Remove <code>WordPress/6.7.1; https://example.org</code> from html head
* **Dequeue jQuery Migrate**
<br>Dequeue jQuery Migrate from the jQuery script dependencies on the frontend. This is used to help devs debug from old versions of jQuery. You really do not need this on a production site.
* **Script Optimizer**
<br>Optimize script loading by moving them into the head and adding defer attribute. This may break your site. Use at your own risk!
* **Disable Contact Form 7 CSS**
<br>Sets <code>wpcf7_load_css</code> filter to false
* **Disable Contact Form 7 Autop**
<br>Sets <code>wpcf7_autop_or_not</code> filter to false
* **Enable Jetpack offline mode**
* **Enable maintenance mode**
