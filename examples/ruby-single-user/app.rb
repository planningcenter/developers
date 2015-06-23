require 'oauth'
require 'json'

CONSUMER_KEY        = 'YOUR_CONSUMER_KEY'
CONSUMER_SECRET     = 'YOUR_CONSUMER_SECRET'

# Get these from http://accesstoken.io
ACCESS_TOKEN_KEY    = 'YOUR_ACCESS_TOKEN_KEY'
ACCESS_TOKEN_SECRET = 'YOUR_ACCESS_TOKEN_SECRET'

consumer = OAuth::Consumer.new(CONSUMER_KEY, CONSUMER_SECRET, site: 'https://services.planningcenteronline.com')
access_token = OAuth::AccessToken.from_hash(consumer, { oauth_token: ACCESS_TOKEN_KEY, oauth_token_secret: ACCESS_TOKEN_SECRET } )

response = access_token.get('/me.json')
me = JSON.parse(response.body)

puts "Hello #{me["first_name"]}"

