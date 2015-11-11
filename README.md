# arius/number-formatter
[![Build Status](https://travis-ci.org/arius86/number-formatter.svg?branch=master)](https://travis-ci.org/arius86/number-formatter)
[![Coverage Status](https://coveralls.io/repos/arius86/number-formatter/badge.svg?branch=master)](https://coveralls.io/r/arius86/number-formatter?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/87742c9a-446c-4635-9a9a-b277405cb3a1/mini.png)](https://insight.sensiolabs.com/projects/87742c9a-446c-4635-9a9a-b277405cb3a1)

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
- spellout-ordinal-feminine
- spellout-ordinal-masculine
- spellout-ordinal-neuter

2. Russian (ru)
--------------

- spellout-ordinal
- spellout-ordinal-feminine
- spellout-ordinal-masculine
- spellout-ordinal-neuter
- spellout-ordinal-plural (plural isn't part of ICU in all languages)


