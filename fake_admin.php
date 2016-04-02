<?php

    include "mysql.php";

    
    $userids = array();
    $q = mysql_query( "SELECT * from users", $c);
    while ($r = mysql_fetch_array($q))
    {
        $userids[] = $r['userid'];
    }
    
    
    require 'vendor/autoload.php';
    
    use JonnyW\PhantomJs\Client;

    $client = Client::getInstance();

    //$client->getEngine()->setPath('/app/vendor/phantomjs/bin');
    $client->getEngine()->setPath('/Users/emeth/Downloads/phantomjs-2.1.1-macosx/bin/phantomjs');
    $client->getEngine()->addOption('--load-images=true');
    $client->getEngine()->addOption('--ignore-ssl-errors=true');
    
    $base_url = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/";
    
    //LOGIN
    
    $data = array(
        'username' => 'bobdole',
        'password' => 'bobdole',
        'save' => 'OFF'
    );
    
    $request  = $client->getMessageFactory()->createRequest();
    $response = $client->getMessageFactory()->createResponse();
    
    $request->setMethod('POST');
    $request->setUrl($base_url.'/authenticate.php');
    $request->setRequestData($data); // Set post data
    
    $client->send($request, $response);
    
    $response = (array)$response;
    $current_cookie = $response['headers']['Set-Cookie'];
    $current_cookie = explode(';', $current_cookie);
    $current_cookie = $current_cookie[0];
    print "sb1";
    print $current_cookie;
    
    //Visit all user profiles
    
    foreach($userids as $userid) {
        $response = $client->getMessageFactory()->createResponse();
        
        $request->setMethod('GET');
        $request->addHeader('Cookie', $current_cookie);

        $request->setUrl($base_url.'/viewuser.php?u='.$userid);
        
        $client->send($request, $response);
        echo $response->getContent();
    }
    