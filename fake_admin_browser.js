// phantomjs fake_admin_browser.js
// /app/vendor/phantomjs/bin fake_admin_browser.js

var page = require('webpage').create();
var killTimeout = 0;
page.open('http://localhost:8888/authenticate.php', 'post', 'username=bobdole&password=bobdole&save=OFF', function (status) {
    if (status !== 'success') {
        console.log('********Login failed!!!!');
        console.log(page.content);
    } else {
        console.log('Login successful.');
    }
    
    page = require('webpage').create();
    
    page.onConsoleMessage = function(msg) {
        if (msg.indexOf("viewuser.php") > -1) {
            clearTimeout(killTimeout);
            page = require('webpage').create();
            page.open("http://localhost:8888/"+msg, function (status) {
                if (status !== "success") {
                    console.log("Failed opening "+msg);
                } else {
                    console.log("Successfully opened "+msg);
                }
                killTimeout = setTimeout(function(){
                    phantom.exit(0);
                }, 3000);
            });
        }
    };
    
    page.open("http://localhost:8888/userlist.php", function (status) {
        // Check for page load success
        if (status !== "success") {
            console.log("Unable to load http://localhost:8888/userlist.php because of network issues");
        } else {
            page.includeJs("http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js", function() {
                console.log("Extracting user profile links from userlist.php...");
                page.evaluate(function() {
                    $(".userprofilelink").each(function() {
                        console.log(jQuery(this).attr('href'));
                    });
                });
            });
            killTimeout = setTimeout(function(){
                phantom.exit(0);
            }, 3000);
        }
    });
});
