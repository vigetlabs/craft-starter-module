# Craft CMS Starter Module

This module is the starting place for creating a [Craft CMS Module](https://docs.craftcms.com/v3/extend/module-guide.html).

## Installation

1. Copy `./modules` to `./modules`
1. Rename the module for your needs (client acronym makes sense)
1. Update all of the namespace references
1. Merge your `./config/app.php` with the sample `./config/app.php` accounting for the namespace change
1. Merge your `composer.json` with the sample `composer.json` accounting for the namspace change
1. Run `composer dump-autoload -a`

## Out of the box, the module includes:

### Custom partial() Twig method

The custom `partial()` Twig method as a shorthand for:

```twig
{% include 'path/to/file' ignore missing with {
    key: 'value',
} only %}
```

With this module enabled, you can do:

```twig
{{ partial('path/to/file', {
    key: 'value',
}) }}
```

### Customized CP Navigation

When in `devMode`, we are customizing the Craft CP navigation via a `/config/dev.php` (which should be gitignored). By default, we are adding links to **Sections** and **Fields** (controlled by `useDefaults`), and the three most **recent entries**. You can add links by adding to `navItems`.

Here's a full sample configuration:

```php
// /config/dev.php
<?php

return [
    'useDefaults' => true,
    'navItems' => [
        0 => [
            'url' => '#TODO',
            'label' => 'Custom Thing',
        ],
    ],
    'showRecentEntries' => 3,
    'icon' => 'disabled',
];
```

If you'd like to restore the stock Craft navigation, use:

```php
// /config/dev.php

<?php

return [
    'useDefaults' => false,
    'showRecentEntries' => false,
];
```