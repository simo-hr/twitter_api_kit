<?php

declare(strict_types=1);

namespace TwitterApiService;

require_once '__DIR__' . '/../vendor/autoload.php';
require_once '__DIR__' . '/../Credential.php';

use Credential\Credential;
use GuzzleHttp\Client;

class TwitterApiService
{
    private $client;
    private $bearToken;

    public function __construct()
    {
        $this->client = new Client();
        $credential = new Credential;
        $this->bearToken = $credential->getBearToken();
    }

    public function searchRecent(array $queryParameters)
    {
        $endPoint =  'https://api.twitter.com/2/tweets/search/recent';
        $requests = [
            'headers' => ['Authorization' => 'Bearer ' . $this->bearToken],
            'query' => $queryParameters
        ];
        try {
            $result = $this->client->request('GET', $endPoint, $requests)->getBody()->getContents();
            return json_decode($result);
        } catch (RequestException $e) {
            echo $e->getMessage();
        }
    }

    public function getTweets(array $queryParameters)
    {
        $endPoint =  'https://api.twitter.com/2/tweets';
        $requests = [
            'headers' => ['Authorization' => 'Bearer ' . $this->bearToken],
            'query' => $queryParameters
        ];
        try {
            $result = $this->client->request('GET', $requests)->getBody()->getContents();
            $jsonResult = json_decode($result);
            return $jsonResult;
        } catch (RequestException $e) {
            echo $e->getMessage();
        }
    }

    public function postStreamRules(array $rules, bool $dryRun = false)
    {
        $endPoint =  'https://api.twitter.com/2/tweets/search/stream/rules';
        $requests = [
            'headers' => ['Authorization' => 'Bearer ' . $this->bearToken],
            'query' => ['dry_run' => $dryRun],
            'json' => ['add' => [$rules]]
        ];
        try {
            $result = $this->client->request('POST', $endPoint, $requests)->getBody()->getContents();
            $jsonResult = json_decode($result);
            if ($jsonResult->meta->summary->created) {
                return [
                    'data' => $jsonResult->data,
                    'success' => true,
                ];
            } else {
                return [
                    'message' => $jsonResult->errors,
                    'success' => false,
                ];
            }
        } catch (RequestException $e) {
            echo $e->getMessage();
        }
    }
}
