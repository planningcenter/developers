require 'sinatra'
require 'oauth'
require 'json'

enable :sessions

CONSUMER_KEY = 'YOUR_CONSUMER_KEY'
CONSUMER_SECRET = 'YOUR_CONSUMER_SECRET'
CALLBACK_URL = 'http://localhost:4567/callback'

get '/' do
  consumer = OAuth::Consumer.new(CONSUMER_KEY, CONSUMER_SECRET, site: "http://services.pco.dev")
  request_token = consumer.get_request_token(oauth_callback: CALLBACK_URL)
  session[:request_token] = request_token
  redirect to(request_token.authorize_url)
end

get '/callback' do
  request_token = session[:request_token]
  access_token = request_token.get_access_token(oauth_verifier: params[:oauth_verifier])
  session[:access_token] = access_token

  redirect to('/me')
end

get '/me' do
  access_token = session[:access_token]
  response = access_token.get('/me.json')

  body = JSON.parse(response.body)
  "Hello #{body["first_name"]}"
end
