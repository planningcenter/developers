Ministry Centered Technologies
==============================

## Engineering Blog

Creating a new post is easy.  

1. Create a new branch.
2. Run `rake post:new["My Post Title"]`
3. Write
4. Create a pull request into the `gh-pages` branch of this repo.

The post header has some values already filled in for you.

- `layout` - The layout to use when building the post page.
- `title` - The tile for your post.
- `date` - The date of the post.

There are some optional values you can set.

- `team` - The team this should be catigorized under. `devops | mobile | web`
- `author` - Your name



***

#### Preferences

Your preferences are stored on your local machine in `.defaults/prefs.json`.

Most preferences have a rake task for setting them.

- Editor

Your preferred markdown editor.  [Mou](http://mouapp.com) is a pretty good one.

```
rake prefs:editor["Mou"]
```
