# yii2-wiki
Yii2-Wiki is a flexible implementation of a wiki for Yii2

## Installation
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require dmitxe/yii2-wiki
```

or add

```
"dmitxe/yii2-wiki": "dev-master"
```

to the `require` section of your `composer.json` file.


## Configuration

###### Migration
For the default table structure execute the provided migration as follows:

	yii migrate --migrationPath=@vendor/dmitxe/yii2-wiki/migrations

To remove the table just do the same migration downwards.

###### Configuring the module
add the following entry to the modules-part of your config-file:

```php
//...

'modules'=>[
	'wiki'=>[
		'class'=>'dmitxe\yii2\wiki\Module',
		'editorRole'=>'administrator'
	],
],

//...
```

