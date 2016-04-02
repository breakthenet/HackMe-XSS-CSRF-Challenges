<?php

    use vendor\jonnyw\php-phantomjs\src\JonnyW\PhantomJs\Client;

    $client = Client::getInstance();

    $client->getEngine()->setPath('/app/vendor/phantomjs/bin');
    
    /** 
     * @see JonnyW\PhantomJs\Message\Request 
     **/
    $request = $client->getMessageFactory()->createRequest('http://jonnyw.me', 'GET');

    /** 
     * @see JonnyW\PhantomJs\Message\Response 
     **/
    $response = $client->getMessageFactory()->createResponse();

    // Send the request
    $client->send($request, $response);

    if($response->getStatus() === 200) {

        // Dump the requested page content
        echo $response->getContent();
    }