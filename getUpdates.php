#!/usr/bin/env php
<?php
require __DIR__ . '/vendor/autoload.php';

$bot_api_key  = '372270003:AAHXcT9raspFUPExhKmAkcWwESRHtajvAPY';
$bot_username = 'ternyata_bot';

$mysql_credentials = [
   'host'     => 'localhost',
   'port'     => 3306, // optional
   'user'     => 'nguprekc_telegrambot',
   'password' => 'bottelegram',
   'database' => 'nguprekc_telegrambot',
];

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Enable MySQL
    $telegram->enableMySql($mysql_credentials);

    // Handle telegram getUpdates request
    $telegram->handleGetUpdates();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    // echo $e->getMessage();
}
