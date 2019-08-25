<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$bot_api_key  = '372270003:AAHXcT9raspFUPExhKmAkcWwESRHtajvAPY';
$bot_username = 'ternyata_bot';
$hook_url     = 'https://labs.nguprek.com/telegrambot/hook.php';

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Set webhook
    $result = $telegram->setWebhook($hook_url);
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    // echo $e->getMessage();
}
