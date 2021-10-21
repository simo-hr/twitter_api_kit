<?php

declare(strict_types=1);

namespace TwitterApiService;

require_once(__DIR__ . '/../v2/TwitterApiService.php');

use TwitterApiService\TwitterApiService;

function getStreamRules()
{
    try {
        $twitterApiService = new TwitterApiService();
        $result = $twitterApiService->getStreamRules();
        if ($result['success'] === true) {
            var_dump($result['data']);
        }
    } catch (RequestException $e) {
        var_dump($e->getMessage());
    }
}

getStreamRules();
