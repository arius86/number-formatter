# arius/number-formatter
PHP NumberFormatter extended with additional ordinals not supported by ICU.
**Feel free to add more languages. Fork, pull request and contribute!**

How to
======

1. composer.json
----------------------------

```json
{
     "require": {
        "arius/number-formatter": "1.*"
     }
}
```

2. PHP
-------

Use in code just like [NumberFormatter class](http://php.net/manual/en/class.numberformatter.php).

```php
use Arius\NumberFormatter;

$formatter = new NumberFormatter('pl', NumberFormatter::SPELLOUT);
$formatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-ordinal");

$formatter->format(123);
```

Additional supported ordinals
=============================

1. Polish (pl)
--------------

- spellout-ordinal
- spellout-ordinal-femine
- spellout-ordinal-masculine


