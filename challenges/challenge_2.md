# XSS/CSRF Challenge 2

----------------------



-Breakthenet Game Owner

----------------------

Stuck? 
----------------------
<details> 
  <summary>Click for hint 1</summary>
   Looking at the code, we see [the code is now checking](https://github.com/breakthenet/file-upload-exercises/blob/master/preferences_c2.php#L219-L227) the mime-type of the file being uploaded - but who sets that mime-type value?
</details>

<details> 
  <summary>Click for hint 2</summary>
   When your browser sends the file via the upload form to the server, your browser is automatically including a Content-Type in the request, telling the webserver the file is of type text/php (for example). The code rejects this, as it only accepts Content-Type of 'image/gif', 'image/jpeg', and 'image/png'. Is there a way you can override what your browser is sending in the Content-Type field?
</details>

<details> 
  <summary>Click for hint 3</summary>
   You need to intercept the request your browser makes and modify it before sending it on to the server. Here's a couple ways to approach that.
   
   1) Google Chrome Inspector, Network Tab. Right click the upload request, and export as curl. Look for the Content-Type there, modify it, and send it again (by sticking the curl command in your terminal).
   
   2) Download Firefox, and install the Tamper Data add-on for firefox. Click "Start Tamper" right before submitting your file. When you click submit and the add-on triggers, hit Tamper. In the POST-DATA on the right, a few lines down you'll find the Content-Type you need to modify. Edit it there. NOTE - Tamper Data has a bug where it may not recognize you made any changes if you ONLY edit POST-DATA on the right. To ensure it picks up and forwards your changes to the request, make a random tweak to the User-Agent on the left and it should work.
   
   3) Install a proxy like Burpe Suite's, and capture and modify the request there.
</details>



