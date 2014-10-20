# PCO API Developer Support

Planning Center has an API that allows you to access most of the information about your plans, people, songs, arrangements, etc. Documentation on the available API endpoints is [available here](http://get.planningcenteronline.com/api).

## Authentication

We use [OAuth 1.0](http://oauth.net/core/1.0) to allow third party applications access to your data without using your password. OAuth can be tricky if you are new to it, but we have example applications below to get you started.

Before integrating your app with PCO, you'll need to request API keys by emailing [support](mailto:support@planningcenteronline.com). Be sure to include a URL for your app or church in your request.

### Single User Authentication

If your app only needs access to your own data, this is the easiest method for authentication. This is typically how apps that sync data to your ChMS work. In that case, OAuth is much easier to implement because you only need to obtain and reuse a single access token.

Once you've received your consumer key and secret by emailing support, you can use [accesstoken.io](http://accesstoken.io) to generate an access token for whichever user you are currently logged in as.

Here are some apps showing how to use your access token:

- [Ruby](/examples/ruby-single-user)
- [PHP](/examples/php-single-user)

### Multi User Authentication

If you are building an application that will need to log in on behalf of other PCO users, you will need to build a standard implementation of OAuth.

Here's a couple examples to get you going:

- [Ruby](/examples/ruby)
- [PHP (PECL Library)](/examples/php-pecl) - The easiest way to do OAuth with PHP if you have the ability to install PECL extensions (or if it has already been installed).
- [PHP (OAuth Library)](/examples/php-library) - Uses an OAuth library that can be required from your script. This library is more complicated to use, but it works if you are unable to use the prefered PECL method.

## Working with the API

There are a couple of third party tools to simplify working with the API. While not necessary, they may make your life easier.

- [Ruby](https://github.com/molawson/planning_center)
- [PHP](https://github.com/deboorn/PlanningCenterOnline-API-Helper)

## Support

If you have any questions or feature requests, post an [issue](https://github.com/ministrycentered/developers/issues). We'll take a look and get back to you asap.
