# XSS/CSRF Challenges

These challenges are set in a Text-Based 'MM'ORPG Game based off Mccode Lite Game Engine (GPL)

Deploy to your own Heroku instance with this button below, then complete the challenges!

[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

Challenges:
----------------------

[Challenge 1](https://github.com/breakthenet/xss-exercises/blob/master/challenges/challenge_1.md): Basic CSRF

[Challenge 2](https://github.com/breakthenet/xss-exercises/blob/master/challenges/challenge_2.md): XSS - thinking outside the box

[Challenge 3](https://github.com/breakthenet/xss-exercises/blob/master/challenges/challenge_3.md): XSS via BBCode parser, steal admin's cookies

----------------------

Note that useful information for testing and debugging will be logged to the Papertrail app in your heroku instance. Open papertrail to view those streaming logs.

----------------------

TroubleShooting:

Sometimes, an error can occur when deploying to Heroku on this line:
-----> Fetching PhantomJS 2.1.1 binaries at https://bitbucket.org/ariya/phantomjs/downloads/phantomjs-2.1.1-linux-x86_64.tar.bz2

I've seen a couple explanations for this, but the common one was bitbucket wasn't reachable at that moment. If you try again a few minutes later, it should work.