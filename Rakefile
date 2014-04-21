require_relative 'helpers'

namespace :post do

  desc "Create a new post"
  task :new, :title do |t, args|
    title = args[:title]
    if !title || title.empty?
      raise "Can't create a post without a title. rake post:new[\"My cool post\"]"
    end

    datestamp = Time.now.strftime("%Y-%m-%d")
    current_dir = File.dirname(__FILE__)

    file_name = fileize("#{datestamp}-#{title}.md")
    file_path = "#{current_dir}/_posts/#{file_name}"

    if File.exists?(file_path)
      raise "A post at #{file_path} already exitst"
    end

    new_post = Defaults.new_post(title)

    puts "Creating #{file_name}"

    File.open(file_path, "w") { |f| f.write(new_post) }

    editor = Defaults.prefs["editor"]

    if !editor || editor.empty?
      puts "You can set your default markdown editor by running rake prefs:editor[name]"
    else
      `open -a #{editor} #{file_path}`
    end
  end
end

namespace :prefs do

  desc "Sets your preferred markdown editor"
  task :editor, :name do |t, args|
      Defaults.prefs["editor"] = args["name"]
      Defaults.save
  end
end
