# Awm Customer Module

Simple overview of use/purpose.

## Description

The module allow you to import user from specific file (JSON, CSV) by magento console command.

## Getting Started

### Dependencies

Composer 2
Magento 2.4
PHP 7.4

### Installing

* Run: composer require awm/module-customer-import'
* Run: magento/bin setup:upgrade
* Run: magento/bin setup:di:compile
* Run: magento/bin c:c

### Executing program

* Open your magento console ( ex: command [argument] [argument])
** bin/magento customer:import sample-csv  sample.csv
* You can find in the directory two files as example.

```
code blocks for commands
```

## 