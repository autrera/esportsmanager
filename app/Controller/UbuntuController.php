<?php

// Controller/ExampleController.php
App::import('Vendor', 'OAuth/OAuthClient');

class UbuntuController extends AppController {
    public function index() {
        $client = $this->createClient();
        $requestToken = $client->getRequestToken('https://one.ubuntu.com/oauth/request/', 'http://' . $_SERVER['HTTP_HOST'] . '/example/callback');

        if ($requestToken) {
            $this->Session->write('ubuntu_request_token', $requestToken);
            $this->redirect('https://one.ubuntu.com/auth/login/?next=/oauth/authorize/=' . $requestToken->key);
        } else {
            // an error occured when obtaining a request token
        }
    }

    public function callback() {
        $requestToken = $this->Session->read('twitter_request_token');
        $client = $this->createClient();
        $accessToken = $client->getAccessToken('https://one.ubuntu.com/oauth/access/', $requestToken);

        if ($accessToken) {
            echo "<pre>";
            print_r($accessToken);
            echo "</pre>";
            $client->post($accessToken->key, $accessToken->secret, 'https://api.twitter.com/1/statuses/update.json', array('status' => 'hello world!'));
        }
    }

    private function createClient() {
        return new OAuthClient('ubuntuone', 'hammertime');
    }
}

?>