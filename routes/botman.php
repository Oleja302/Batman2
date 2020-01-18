<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Attachments\Audio;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;

$botman = resolve('botman');

$botman->hears('Batman', function ($bot) {
    $bot->reply ('IM BATMAN!');

    // Create attachment
    $attachment = new Video('http://simkaget.xyz/get1/mp4_kinosimka.tv/Bjetmen.Ubijstvennaja.shutka.2016__Kinosimka.RU.mp4', [
        'custom_payload' => true,
    ]);

// Build message object
    $message = OutgoingMessage::create('Bat...')
        ->withAttachment($attachment);

// Reply message object
    $bot->reply($message);

});

$botman->hears('Hi', function ($bot) {

    $telegramUser = $bot->getUser();
    $chatId = $telegramUser->getId();

    $products = \App\Product::all();
    foreach ($products as $product) {

        $keybord = [
            [
                ['text' => "\xF0\x9F\x91\x89Детальнее", 'callback_data' => "/show " . $product->id],

            ],
        ];

        $bot->sendRequest("sendPhoto",
            [
                "chat_id" => "$chatId",
                "photo" => $product->img_url,
                'reply_markup' => json_encode([
                    'inline_keyboard' =>
                        $keybord
                ])
            ]);





    }

});


$botman->hears('1', function ($bot) {

    $telegramUser = $bot->getUser();
    $chatId = $telegramUser->getId();

    $categories = \App\Category::all();
    foreach ($categories as $category) {

        $keybord = [
            [
                ['text' => "\xF0\x9F\x91\x89Детальнее в категории", 'callback_data' => "/show_in_category " . $category->id],

            ],
        ];

        $bot->sendRequest("sendPhoto",
            [
                "chat_id" => "$chatId",
                "photo" => $category->img_url,
                'reply_markup' => json_encode([
                    'inline_keyboard' =>
                        $keybord
                ])
            ]);

    }

});


$botman->hears('/show_in_category ([0-9]+)', function ($bot, $categoryid) {

    $telegramUser = $bot->getUser();
    $chatId = $telegramUser->getId();

    $products = (\App\Category::with(['products'])->where("id",$categoryid)->first())->products()->get();

    foreach ($products as $product) {

        $keybord = [
            [
                ['text' => "\xF0\x9F\x91\x89Детальнее", 'callback_data' => "/show " . $product->id],

            ],
        ];

        $bot->sendRequest("sendPhoto",
            [
                "chat_id" => "$chatId",
                "photo" => $product->img_url,
                'reply_markup' => json_encode([
                    'inline_keyboard' =>
                        $keybord
                ])
            ]);





    }

});


$botman->hears("/show ([0-9]+)", function ($bot,$id){

    $telegramUser = $bot->getUser();
    $chatId = $telegramUser->getId();

    $product = \App\Product::find($id);

    $bot->reply($product->name . "\n" . $product->description . "\n" . $product->price . "\n" . $product->img_url);

    $bot->sendRequest("sendAudio",
        [
            "chat_id" => "$chatId",
            "audio" => "https://dl2.ru-music.xn--41a.ws/mp3/3930.mp3",

        ]);
});

$botman->hears('music', function ($bot) {
    $bot->reply ('music batman!');

// Create attachment
    $attachment = new Audio('https://cs1.mp3top.top/download/102386600/QUVLOG8yVWVVS2I1dm1VQWNkY3NPVHlRVi9ZUXM2aE1wTjNORnE3S0U1Y3dRRWFhTGVrSlBNaDljcUwvY2c4cDhtL3F2b0czVURkSUh1czdqcXVhK2dmbk52YnQxaGFTdWVIakN6YmcwMjBxelpiVnd6MlJ5S1dyU3crZmxmK2o/im_batman_ya_behtmehn_(mp3top.top).mp3', [
        'custom_payload' => true,
    ]);

// Build message object
    $message = OutgoingMessage::create('Its my life!')
        ->withAttachment($attachment);

// Reply message object
    $bot->reply($message);

});

$botman->hears('Show me BATMAN', function ($bot) {
    $bot->reply ('Its!');
    // Create attachment
    $attachment = new Image('https://www.meme-arsenal.com/memes/98c924f6c47c85dda8ee193b9a2a4784.jpg', [
        'custom_payload' => true,
    ]);

    $message = OutgoingMessage::create('Batman')
        ->withAttachment($attachment);

    $bot->reply($message);

});

$botman->hears('single response', function (BotMan $bot) {
    $bot->reply("Tell me more!");
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');
