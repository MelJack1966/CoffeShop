<?php
require_once 'vendor/autoload.php';

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

$config = [
    "port" => 8080
];

$botman = BotManFactory::create($config);


// Give the bot something to listen for.
$botman->hears('hi', function (BotMan $bot) {    
    $bot->reply('Hello! Would you like some coffee?');
});

$botman->hears('heya', function (BotMan $bot) {    
    $bot->reply('I heard a yo');
});
    
$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});

// Start listening
$botman->listen();