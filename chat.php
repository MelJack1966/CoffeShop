<?php
require_once 'vendor/autoload.php';
require_once 'conversations/OnboardingConversation.php';
require_once 'dynamic/DBController';

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\DoctrineCache;
use BotMan\BotMan\Drivers\DriverManager;
use Doctrine\Common\Cache\FilesystemCache;



DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

$config = [
  'conversation_cache_time' => 60
];

$doctrineCacheDriver = new FilesystemCache("cache");

$botman = BotManFactory::create($config, new DoctrineCache($doctrineCacheDriver));

$botman->hears('.*ay.*', function (BotMan $bot) {
    $bot->reply('Ay gurl');
});

// Give the bot something to listen for.
$botman->hears('.*hi.*', function (BotMan $bot) {
    $bot->reply('Hello! Would you like some coffee?');
});

$botman->hears('.*bye.*', function (BotMan $bot) {
    global $db;
    $bot->reply('Good Bye');
    $db->db_disconnect($db);
});

$botman->hears('.*food.*', function (Botman $bot){
    global $db;
    $bot->startConversation(new FoodConversation);
});


$botman->fallback(function(Botman $bot) {
    $bot->reply('Sorry, I did not understand what you typed. Try using one of these prompts: ...');
});

// Start listening
$botman->listen();
