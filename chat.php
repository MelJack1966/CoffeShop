<?php
require_once 'vendor/autoload.php';
require_once 'dynamic/initialize.php';
foreach(glob("conversations/*.php") as $file){
    require_once $file;
}

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\DoctrineCache;
use BotMan\BotMan\Drivers\DriverManager;
use Doctrine\Common\Cache\FilesystemCache;

DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
$config = ['conversation_cache_time' => 20];
$doctrineCacheDriver = new FilesystemCache("cache");
$botman = BotManFactory::create($config, new DoctrineCache($doctrineCacheDriver));

/////////BOT LOGIC/////////

// WELCOME MESSAGE
$botman->hears('.*hi.*', function (BotMan $bot) {
    $bot->startConversation(new Welcome);
});
$botman->hears('.*hello.*', function (BotMan $bot) {
    $bot->startConversation(new Welcome);
});

// STRAIGHT TO THE ORDER
$botman->hears(".*like.* {item}", function(Botman $bot, $item) {
    $bot->startConversation(new TakeOrder($item));
});
$botman->hears(".*want.* {item}", function(Botman $bot, $item) {
    $bot->startConversation(new TakeOrder($item));
});
$botman->hears(".*need.* {item}", function(Botman $bot, $item) {
    $bot->startConversation(new TakeOrder($item));
});
$botman->hears(".*get.* {item}", function(Botman $bot, $item) {
    $bot->startConversation(new TakeOrder($item));
});

$botman->hears('.*bye.*', function (BotMan $bot) {
    global $db;
    $bot->reply('Good Bye');
    $bot->db_disconnect($db);
});

$botman->fallback(function($bot) {
    $bot->startConversation(new Suggest);
});

// TEST CONVERSATIONS
$botman->hears('.*ex1.*', function (BotMan $bot) {
    $bot->startConversation(new ExampleConversation1);
});

$botman->hears('.*ex2.*', function (BotMan $bot) {
    $bot->startConversation(new ExampleConversation2);
});

// Start listening
$botman->listen();
