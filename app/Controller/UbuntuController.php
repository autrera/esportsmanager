<?php

// Controller/ExampleController.php
App::import('Vendor', 'OAuth/OAuthClient');

class UbuntuController extends AppController {

    public $render = false;

    public $autoRender = false;

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('callback'); 
    }

    public function index() {
        $callback = 'http://teamquetzal.com/esportsmanager/ubuntu/callback';
        $client = $this->createClient();
        $requestToken = $client->getRequestToken('https://api.dropbox.com/1/oauth/request_token', $callback);

        if ($requestToken) {
            $this->Session->write('ubuntu_request_token', $requestToken);
            $this->redirect('https://www.dropbox.com/1/oauth/authorize?oauth_token=' . $requestToken->key . '&oauth_callback=' . $callback);
        } else {
            // an error occured when obtaining a request token
        }
    }

    public function callback() {
        $requestToken = $this->Session->read('ubuntu_request_token');
        $client = $this->createClient();
        $accessToken = $client->getAccessToken('https://api.dropbox.com/1/oauth/access_token', $requestToken);

        if ($accessToken) {
            echo "<pre>";
            print_r($accessToken);
            echo "</pre>";
            // $client->post($accessToken->key, $accessToken->secret, 'https://api.twitter.com/1/statuses/update.json', array('status' => 'hello world!'));
        }
    }

    private function createClient() {
        return new OAuthClient('rvob0qty1562swf', 'g2a6f0lyermai8s');
    }

    public $credentials = array(
        'key' => '7dg4vey4t9rsf6s',
        'secret' => 'a1zc65o1hrjz9bq'
    );
}

?>