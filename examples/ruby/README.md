# PCO API Example in Ruby

A quick [Sinatra](http://sinatrarb.com) app to authenticate via OAuth 1.0a and make a simple request.

## Setup

1. Get your consumer key and secret by emailing [support](support@planningcenteronline.com).
2. Update the `CONSUMER_KEY`, `CONSUMER_SECRET` in `app.rb` to the provided values and `SESSION_SECRET` to a randomly generated string.
3. Update the callback URL (if needed) in `app.rb`.
4. Run `bundle install && bundle exec ruby app.rb`
5. Visit http://localhost:4567

## More Information

[PCO Developers](https://github.com/ministrycentered/developers)
