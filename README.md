Yii2 Chart Builder
==================
create chart from sql 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yii2learning/yii2-chart-builder "*"
```

or add

```
   "yii2learning/yii2-chart-builder": "@dev"
```

to the require section of your `composer.json` file.

Config Module
-----
```
'modules' => [
    'chartbuilder'=>[
        'class'=> 'yii2learning\chartbuilder\Module'
    ],
];
```
Migrations database
-----

```
./yii migrate/up -p=@yii2learning/chartbuilder/migrations
```

