require 'json'

# Returns a string ready to be used as a file name
def fileize(string, sep='-')
  string.gsub(/[\s]+/i, sep).downcase
end


class Defaults
  @@prefs = {}

  def self.new_post(title)
    new_post = File.read("#{defaults_path}/new_post.txt")
    new_post.gsub!("<#date#>", Time.now.strftime("%Y-%m-%d %H:%M:%S"))
    new_post.gsub!("<#title#>", title)
    new_post
  end

  def self.prefs
    if @@prefs.empty? && File.exists?(prefs_path)
      @@prefs = JSON.parse(File.read(prefs_path)) || {}
    end
    @@prefs
  end
  def self.save
    File.open(prefs_path, "w") { |f| f.write(@@prefs.to_json) }
  end

  private
    def self.defaults_path
      File.expand_path(File.dirname(__FILE__)) + "/.defaults"
    end
    def self.prefs_path
      "#{defaults_path}/prefs.json"
    end
end
