<?php
require_once 'vendor/autoload.php';
foreach(glob("conversations/*.php") as $file){
    require_once $file;
}

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\DoctrineCache;
use BotMan\BotMan\Drivers\DriverManager;
use Doctrine\Common\Cache\FilesystemCache;

DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
$config = ['conversation_cache_time' => 60];
$doctrineCacheDriver = new FilesystemCache("cache");
$botman = BotManFactory::create($config, new DoctrineCache($doctrineCacheDriver));

/////////BOT LOGIC/////////

$botman->hears('.*ex1.*', function (BotMan $bot) {
    $bot->startConversation(new ExampleConversation1);
});

$botman->hears('.*ex2.*', function (BotMan $bot) {
    $bot->startConversation(new ExampleConversation2);
});

// WELCOME MESSAGE
$botman->hears('.*hi.*', function (BotMan $bot) {
    $bot->startConversation(new Welcome);
});
$botman->hears('.*hello.*', function (BotMan $bot) {
    $bot->startConversation(new Welcome);
});

$botman->hears('.*bye.*', function (BotMan $bot) {
    global $db;
    $bot->reply('Good Bye');
    $bot->db_disconnect($db);
});

$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand what you typed. Try using one of these prompts: ...');
});

// Start listening
$botman->listen();
