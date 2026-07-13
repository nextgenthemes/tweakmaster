=== TweakMaster ===
Contributors: nico23
Tags: performance, privacy, security, tweaks, lightweight
Requires at least: 6.6
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.4.1
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Donate link: https://nextgenthemes.com/donate

A collection of performance, privacy, security, and other tweaks. Minimalistic lightweight plugin.

== Description ==
WP Tweak is a lightweight and minimalistic WordPress plugin designed to enhance your website with a curated set of tweaks. It focuses on improving performance, bolstering privacy, strengthening security, and adding other useful optimizations—all without unnecessary bloat. Perfect for users who want a simple yet effective solution to fine-tune their WordPress experience.

This plugins handles tweaks in a minimalistic way. Only files that contains tweaks that you activate are loaded!

= Tweaks =

{ tweaks }

= Contribute to add quality tweaks to the plugin reviewed by me =

Unlike WP Code's snippet database that is filled with low code quality tweaks where some do not even work at all and spam this plugin only contains high quality tweaks. If something is missing please add it.

It is very easy to contribute to the plugin. Check out the [Github Readme](https://github.com/nextgenthemes/tweakmaster/blob/master/readme.md).

If you have questions on adding a more complex tweak please feel free to ask.

== Screenshots ==
(Maybe later)

== Changelog ==

= 2026-07-13 - 1.4.1
* Fix: Welcome panel removal using correct `welcome_panel` hook.

= 2026-07-13 - 1.4.0
* New: Standalone tweaks to remove dashboard widgets (Welcome Panel, Activity, Quick Draft, At a Glance, Events and News, Site Health).
* New: WP-CLI `feature-list` command for generating the features list.
* Improved: Build script converted from PHP to shell for simpler maintenance.
* Dev: Added PHPStan `dynamicConstantNames` for WordPress constants.
* Dev: Added tsconfig.json and standardized .gitignore.

= 2026-06-24 - 1.1.2
* New: Remove RSD link, shortlink, and wlwmanifest link from head.
* New: Enable Jetpack offline mode tweak.
* New: Enable maintenance mode tweak.
* New: Admin email check interval setting.
* New: Admin footer text setting.
* Improved: PHPDoc annotations across all files.
* Improved: Coding style, tab indentation, and restructuring.
* Dev: Deploy centralized in parent repo, removed per-plugin workflows.

= 2025-09-17 - 1.1.0
* New: Admin email check interval setting.
* New: Admin footer text setting.

= 2025-08-03 - 1.0.6
* Improved: sanitize, validate correctly, fix prefixes ...
* Removed update disable tweak, not allowed on wp.org?

= 2025-03-xx - 1.0.1-beta2 =
* Improved: Tweak descriptions.
* Fix: Admin Bar Greeting tweak.
* Fix: Link to GH readme.
* Fix: Rename `wptweak` to `tweakmaster` to fix multiple issues.

= 2025-03-15 - 1.0.1-beta1 =
* New: Disable non production email tweak.

= 2025-03-xx - 1.0.0-beta1 =
* Initial release.
