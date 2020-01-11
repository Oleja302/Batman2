<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Attachments\Audio;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

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
    $bot->reply ('Zik hi!');

    $products = \App\Product::all();
    foreach ($products as $product)
        $bot->reply($product->title."\n".$product->img_url);

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
