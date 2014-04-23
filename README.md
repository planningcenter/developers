Ministry Centered Technologies
==============================

## Engineering Blog

Getting set up.

1. Clone this repo's `gh-pages` branch. `git clone https://github.com/ministrycentered/developers.git -b gh-pages`
2. If you're going to work on the blog itself run `bundle install`

Creating a new post.  

1. Create a new branch.
2. Run `rake post:new["My Post Title"]`
3. Write
4. Push to GitHub
5. Create a pull request into the `gh-pages` branch of this repo.

The post header has some values already filled in for you.

- `layout` - The layout to use when building the post page.
- `title` - The tile for your post.
- `date` - The date of the post.

There are some optional values you can set.

- `team` - The team this should be categorized under. `devops | mobile | web`
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

The name of the app should be the same that would open by running `open -a <name> ./file.md`
