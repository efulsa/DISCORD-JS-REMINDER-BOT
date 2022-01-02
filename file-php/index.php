<?php
//this file for send webhooks from php
?>

<!DOCTYPE html>
<html lang="en" id="pul-bot">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>REMINDER-BOT</title>
</head>
<body>
    <h1>SUCCESS</h1>
    <div id="txt"></div>
</body>
</html>
<?php
//=======================================================================================================
// Create new webhook in your Discord channel settings and copy&paste URL
//=======================================================================================================

$webhookurl = "YOUR WEBHOOK URL";
$image = "http://url";
$username = "REMINDER-BOT";

//=======================================================================================================
// Compose message. You can use Markdown
// Message Formatting -- https://discordapp.com/developers/docs/reference#message-formatting
//========================================================================================================
date_default_timezone_set("Asia/Bangkok");
$timestamp = date("c", strtotime("now"));

$json_data = json_encode([
    // Message
    "content" => "Jangan lupa absen yaa ! @everyone",
    
    // Username
    "username" => $username,

    // Avatar URL.
    // Uncoment to replace image set in webhook
    //"avatar_url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=512",

    // Text-to-speech
    "tts" => false,

    // File upload
    // "file" => "",

    // Embeds Array
    "embeds" => [
        [
            // Embed Title
            // "title" => "Klik disini untuk absen gaiiss !",

            // Embed Type
            "type" => "rich",

            // Embed Description
            // "description" => "Lupa absen dapat mengakibatkan rudet",

            // URL of title link
            // "url" => "http://link title",

            // Timestamp of embed must be formatted as ISO8601
            "timestamp" => $timestamp,

            // Embed left border color in HEX
            "color" => hexdec( "3366ff" ),

            // Footer
            "footer" => [
                "text" => "GitHub.com/efulsa",
                "icon_url" => "https://avatars.githubusercontent.com/u/34164303?v=4"
            ],

            // Image to send
            "image" => [
                "url" => $image
            ],

            // Thumbnail
            // "thumbnail" => [
            //    "url" => "http://url image"
            // ],

            // Author
            "author" => [
                "name" => "ABSENLAH SEBELUM DIABSENKAN",
                "url" => "https://github.com/efulsa"
            ],

            // Additional Fields array
            "fields" => [
                // Field 1
                // [
                //     "name" => "field 1",
                //     "value" => "field 1",
                //     "inline" => false
                // ],
                // // Field 2
                // [
                //     "name" => "field 2",
                //     "value" => "field 2",
                //     "inline" => false
                // ],
                // [
                //     "name" => "field 3",
                //     "value" => "field 3",
                //     "inline" => true
                // ]
                // Etc..
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );

// If you need to debug, or find out why you can't send message uncomment line below, and execute script.
// echo $response;
curl_close( $ch );
?>