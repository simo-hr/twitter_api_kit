<?php

declare(strict_types=1);

namespace TwitterApiService;

require_once(__DIR__ . '/../v2/TwitterApiService.php');

use TwitterApiService\TwitterApiService;

function postStreamRules(array $query, $dryRun)
{
    try {
        $twitterApiService = new TwitterApiService();
        $result = $twitterApiService->postStreamRules($query, $dryRun);
        if ($result['success'] === true) {
            var_dump($result['data']);
        } else if (($result['success'] === false)) {
            echo $result['message'];
        } else {
            echo 'ERROR';
        }
    } catch (RequestException $e) {
        var_dump($e->getMessage());
    }
}

postStreamRules([
    [
        'value' => '#京都' . ' -is:retweet -is:quote',
        'tag' => '#京都',
    ],
    [
        'value' => '#大阪' . ' -is:retweet -is:quote',
        'tag' => '#大阪',
    ]
], false);
