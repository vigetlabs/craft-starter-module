# Craft CMS Starter Module

This module is the starting place for creating a [Craft CMS Module](https://docs.craftcms.com/v3/extend/module-guide.html). It also includes the custom `partial()` Twig method as a shorthand for:

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

## Installation

1. Copy `./modules` to `./modules`
1. Rename the module for your needs (client acronym makes sense)
1. Update all of the namespace references
1. Merge your `./config/app.php` with the sample `./config/app.php` accounting for the namespace change
1. Merge your `composer.json` with the sample `composer.json` accounting for the namspace change
1. Run `composer dump-autoload -a`