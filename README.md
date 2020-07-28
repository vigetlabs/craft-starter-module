# Craft CMS Starter Module

This module is the sample for creating a [Craft CMS Module](https://docs.craftcms.com/v3/extend/module-guide.html). This extends from the [Viget Base composer package](https://github.com/vigetlabs/craft-viget-base), so that functionality can be included on the site without having to duplicate it. Be sure to use the latest version of the package in your `composer.json`.

## Installation

1. Copy `./modules` to `./modules`
1. Rename the module for your needs (client acronym makes sense)
1. Update all of the namespace references
1. Merge your `./config/app.php` with the sample `./config/app.php` accounting for the namespace change
1. Merge your `composer.json` with the sample `composer.json` accounting for the namspace change
1. Run `composer dump-autoload -a`
1. Add the following `ENV` variables to your enviroment file:
    ```
    AIRTABLE_API_KEY
    AIRTABLE_BASE
    ```
    Using the base ID from the Craft Inventory Airtable
