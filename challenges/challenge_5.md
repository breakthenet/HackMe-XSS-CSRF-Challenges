# XSS/CSRF Challenge 5

----------------------

Hey friend,

I've got a challenge for you.

Using the same concept from challenge 3, craft an XSS exploit in the profile signature that behaves like a worm, updating the profile signature of anyone who views an infected profile to also have the same exploit code on their profile.

To do this, you'll need to escape out of the bbcode parser and get javascript execution, use javascript to get a copy of the exploit code, and craft some javascript (perhaps using ajax) to submit a request to the server to update the user's profile signature.

I have a phantomjs bot setup that will log in as my admin account and visit all user profiles in the game - to trigger it, just go to Trigger Admin Browser in the navigation. See if you can get the exploit on the admin's profile signature via this worm!

Thanks!

-Breakthenet Game Owner

----------------------

Stuck? 
----------------------
<details> 
  <summary>Click for hint 1</summary>
   You don't have jquery on the page, so you'll need to google how to do an ajax call with plain, vanilla javascript. You also need to gather the details about the call you need to do (get it from the Preferences / Profile Signature form page).
</details>

<details> 
  <summary>Click for hint 2</summary>
   To get a copy of the worm for the payload, have the code refer to itself! E.g. &lt;img src='' id='bob' onLoad='document.getElementById("bob").getAttribute("onLoad")'&gt;
</details>


