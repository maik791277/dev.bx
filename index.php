<?php

spl_autoload_register(function ($class) {
	include __DIR__ . '/' . str_replace("\\", "/", $class) . '.php';
});

use \Service\Formatting;

$advertisement = (new \Entity\Advertisement())
	->setBody("это текст рекламы")
	->setTitle("...")
	->setDuration(10);

$formatter = new Formatting\FooterFormatterDecorator(new Formatting\HeadFormatterDecorator(new Formatting\BaseFormatter()));


$fbProvider=new \Service\FbProvider($formatter,new \Adapter\FacebookAdvertisementProviderAdapter());

print_r($fbProvider->publication($advertisement));
