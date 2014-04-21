Ministry Centered Technologies
==============================

## Engineering Blog

Creating a new post is easy.  

1. Create a new branch.
2. Run `rake post:new["My Post Title"]`
3. Write
4. Create a pull request into the `gh-pages` branch of this repo.

***

#### Preferences

Your preferences are stored on your local machine in `.defaults/prefs.json`.

Most preferences have a rake task for setting them.

- Editor

Your preferred markdown editor.  [Mou](http://mouapp.com) is a pretty good one.

```
rake prefs:editor["Mou"]
```
