# PCO API Developer Support

Planning Center has an API that allows you to access most of the information in your account, across multiple apps. Documentation on the available API endpoints is [available here](https://developer.planning.center/docs/).

## Authentication

### Single User Authentication

If your app only needs access to your own data, this is the easiest method for authentication. This is typically how apps that sync data to your ChMS work.

You can get 'Personal Access Tokens' [here](https://api.planningcenteronline.com/oauth/applications).  You can then use HTTP basic auth to access the API.

```bash
curl -u application_id:secret https://api.planningcenteronline.com/services/v2/
```

### Multi User Authentication

If you are building an application that will need to log in on behalf of other PCO users, you will use [OAuth 2](http://oauth.net/2/) to authenticate users in your application.

You can register your application and get your Client ID and Secret [here](https://api.planningcenteronline.com/oauth/applications).

We have a [Ruby example for authenticating with OAuth 2](https://github.com/planningcenter/pco_api_oauth_example).

## Working with the API

All data is returned according to the [JSONAPI 1.0 spec](http://jsonapi.org).

If you're creating a Ruby application we have the [pco_api gem](https://github.com/planningcenter/pco_api_ruby) to get you started.

## Support

If you have any questions or feature requests, post an [issue](https://github.com/ministrycentered/developers/issues). We'll take a look and get back to you asap.
