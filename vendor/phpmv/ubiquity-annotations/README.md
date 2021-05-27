# ubiquity-annotations
php annotations for Ubiquity framework with mindplay/php-annotations

As mindplay annotations are not yet compatible with PHP8, you have to add a fix in the `composer.json` file of your project:
```json
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/phpMv/php-annotations"
        }
    ],
    "require-dev" : {
            "mindplay/annotations": "dev-php8-fix as 1.3.2",
    },
```
Run `composer update`

If necessary, remember to clear the cache (especially the annotations cache in `app/cache/annotations` folder).
```bash
Ubiquity clear-cache
```
