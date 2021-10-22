<?php

declare(strict_types=1);

namespace TwitterApiService;

require_once(__DIR__ . '/../v2/TwitterApiService.php');

use TwitterApiService\TwitterApiService;

function deleteStreamRules(array $ruleIds)
{
    try {
        $twitterApiService = new TwitterApiService();
        $result = $twitterApiService->deleteStreamRules($ruleIds);
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

deleteStreamRules(['1451522016339644417','80425976098']);
