<?php

declare(strict_types=1);

namespace TwitterApiService;

require_once '__DIR__' . '/../v2/TwitterApiService.php';

use TwitterApiService\TwitterApiService;

// https://developer.twitter.com/en/docs/twitter-api/tweets/search/api-reference/get-tweets-search-recent
function executeSearchResent()
{
    $twitterApiService = new TwitterApiService();
    return $twitterApiService->searchRecent([
        'query' => 'twitter',
        'max_results' => 10,
        // 'end_time' => '2021-10-05T12:22:13Z',
        // 'expansions' => '',
        // 'media.fields' => '',
        // 'next_token' => '',
        // 'place.fields' => '',
        // 'poll.fields' => '',
        // 'since_id' => '',
        // 'tweet.fields' => '',
        // 'until_id' => '',
        // 'user.fields' => '',
    ]);
}

var_dump(executeSearchResent());
