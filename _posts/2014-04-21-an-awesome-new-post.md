---
layout: post
title:  "An awesome new post"
date:   2014-04-21 09:50:51
team:   mobile
---

Donec id elit non mi porta gravida at eget metus. Donec sed odio dui. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Maecenas faucibus mollis interdum. Vestibulum id ligula porta felis euismod semper.

Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.

```ruby
  def self.new_post(title)
    new_post = File.read("#{defaults_path}/new_post.txt")
    new_post.gsub!("<#date#>", Time.now.strftime("%Y-%m-%d %H:%M:%S"))
    new_post.gsub!("<#title#>", title)
    new_post
  end
```

Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue.
