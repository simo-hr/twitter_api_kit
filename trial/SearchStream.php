<?php

declare(strict_types=1);

namespace TwitterApiService;

require_once '__DIR__' . '/../v2/TwitterApiService.php';

use TwitterApiService\TwitterApiService;

function execSearchResent(array $query)
{
    try {
        $twitterApiService = new TwitterApiService();
        $tweets_data = [];
        $stream = $twitterApiService->searchStream($query);
        if (!is_array($stream)) {
            while (!$stream->eof()) {
                $line = "";
                while (mb_substr($line, -2) != "\r\n") {
                    $line .= $stream->read(1);
                }
                if ($line == "\r\n") echo date("Y/m/d H:i:s") . $line;
                if ($line != "\r\n") $tweets_data[] = json_decode($line, true);
                echo '**************************************' . PHP_EOL;
                var_dump($tweets_data);
                echo '**************************************' . PHP_EOL;
                // file_put_contents("stream.txt", print_r($tweets_data, true));
            }
        } else {
            throw new Exception('Stream not readable.');
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
$query = [
    // 'expansions' => 'author_id',
    // 'user.fields' => 'description,public_metrics',
];
execSearchResent($query);
