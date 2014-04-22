# PHP OAuth Extension Example

This example uses the OAuth PECL extension. More info can be found here at (php.net)[http://www.php.net/manual/en/intro.oauth.php].

## Setup

Set your consumer key, consumer secret and callback url in `oauth_config.php`. (You can get a consumer key and secret by emailing (support)[mailto:support@plannincenteronline.com].) The callback url should be a full url (not just a path) to the location of the code in `callback.php`.

Now visit `index.php`. Tada!

## What's going on?

* An OAuth object is created and used to get a request token from PCO.
* The user is sent to PCO to authorize the request token to access their account.
* Once authorized, the request token is swapped for an access token.
* The access token is used to make subsequent requests on the user's behalf.
