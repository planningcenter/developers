# PHP OAuth Extension Example

This example uses the OAuth PECL extension. More info can be found here at (php.net)[http://www.php.net/manual/en/intro.oauth.php].

## Setup

Set your consumer key, consumer secret and callback url in `oauth_config.php`. (You can get a consumer key and secret by emailing (support)[mailto:support@plannincenteronline.com].) The callback url should be a full url (not just a path) to the location of the code in `callback.php`.

Now visit `index.php`. Tada!

## Oauth. How does it work?

* User visits `/index.php` 
* A new OAuth object is instantatied in `oauth_config.php` with your consumer key and secret. (At this point, line 8 does nothing because your cookie is empty). 
* The OAuth object gets a new request token from PCO. 
* The request token is stored in a cookie. 
* The user is forwarded to PCO to authorize the request token to access their account. 

* The user is sent back to `callback.php`. 
* A new OAuth object is instantiated, and it's told to use the request token stored in our cookie for subsequent requests. 
* The OAuth object requets an access token from PCO. 
* We replace the request token stored in our cookie with the access token. 

* The user is forwarded to `me.php` 
* An OAuth object is instantiated, and now uses the access token for requests. 
* We use the OAuth object to make a request to `http://planningcenteronline.com/me.json` 
