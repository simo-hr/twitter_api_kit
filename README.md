# twitter_api_kit

add Credential.php file in root dir.

```php
<?php

declare(strict_types=1);

namespace Credential;

class Credential
{
    const BEAR_TOKEN =  '';
    const CONSUMER_KEY = '';
    const CONSUMER_SECRET_KEY = '';
    const ACCESS_TOKEN = '';
    const ACCESS_TOKEN_SECRET = '';
    public function getBearToken()
    {
        return self::BEAR_TOKEN;
    }
    public function getConsumerKey()
    {
        return self::CONSUMER_KEY;
    }
    public function getConsumerSecretKey()
    {
        return self::CONSUMER_SECRET_KEY;
    }
    public function getAccessToken()
    {
        return self::ACCESS_TOKEN;
    }
    public function getAccessTokenSecret()
    {
        return self::ACCESS_TOKEN_SECRET;
    }
}
```
