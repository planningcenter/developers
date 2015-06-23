require 'sinatra'
require 'oauth'
require 'oauth/signature/plaintext'
require 'json'

SESSION_SECRET = 'RANDOMLY_GENERATED_STRING'

set :sessions, secret: SESSION_SECRET

CONSUMER_KEY    = 'YOUR_CONSUMER_KEY'
CONSUMER_SECRET = 'YOUR_CONSUMER_SECRET'
CALLBACK_URL    = 'http://localhost:4567/callback'

def consumer
  @consumer ||= OAuth::Consumer.new(CONSUMER_KEY, CONSUMER_SECRET, site: "https://services.planningcenteronline.com", signature_method: 'plaintext')
end

def token_to_hash(token)
  token.params.select {|key,_| key.is_a? Symbol }
end

get '/' do
  request_token = consumer.get_request_token(oauth_callback: CALLBACK_URL)
  session[:request_token] = token_to_hash(request_token)
  redirect to(request_token.authorize_url)
end

get '/callback' do
  request_token = OAuth::RequestToken.from_hash consumer, session[:request_token]
  access_token = request_token.get_access_token(oauth_verifier: params[:oauth_verifier])
  session[:access_token] = token_to_hash(access_token)

  redirect to('/me')
end

get '/me' do
  access_token = OAuth::AccessToken.from_hash consumer, session[:access_token]
  response = access_token.get('/me.json')

  body = JSON.parse(response.body)
  "Hello #{body["first_name"]}"
end
