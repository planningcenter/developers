---
layout: post
title:  "Core Data at Planning Center"
date:   2014-05-01 08:42:56
author: Skylar Schipper
header: /assets/images/core-data-logo.jpg
team:   mobile
---

Each of the iOS apps at Planning Center make heavy use of [Core Data][0]. We don't use it in the traditional sense of the users data store.  Instead, we use it as a cache. Using Core Data as a cache allows us to display pre-fetched data to a user. It speeds up interactions for the user and gives us compile time checking for data access.

Core Data has always had an interesting stance in the iOS/Mac developer community. People either love it or hate it. There are sharp edges and pain points, but those come with any framework. For us, those edges aren't as sharp as the hassle of rolling our own implementation. There are other options out there, and we use some of them (more on that in a later post).

We have a complicated data structure. There are over 50 unique models, and most of them are not small. The majority have 10+ attributes and 5+ relationships. There are a couple of models with 50+ attributes and 20+ relationships. This would be hard to manage if we had to write all those queries with sql. So we let Core Data handle the heavy lifting for us. Core Data creates the schema, runs all the table creation, and manages all the relationships. In code, we can just ask for an object and Core Data handles loading that data for us.

With large amounts of data coming in, we can't do all the processing on the main thread. So we're running multi-threaded Core Data. There is a master context that only talks to the persistent store. It has it's own private queue for performing its tasks. The main thread context is a child of the master and it is the first level accessible from the rest of the app. It's where the UI talks with the datastore and serves as the parent for any background thread contexts.

When the network returns data, it's parsed in the background then stored into the datastore. The view controllers are notified this data is new and they fetch the latest data from the datastore. As far as the UI knows, there is no such thing as JSON. Because objects are strongly typed we get compile time checking for data access. Automating the JSON "stringly" typed object access is easy because it only happens in one place.

So, how does this work?

Using [Services][2] as an example, we'll take a look at what happens when a user pulls to refresh.

1. User pulls to refresh on the songs page.
2. The refresh action on the view controller is called.  It calls into the songs controller letting it know it needs to get the latest list of songs.
3. The songs controller creates the API request and sends it off.
4. The data is returned from the network on a background thread. The data is handed off to the JSON mapper.
5. The JSON mapper converts JSON keys into the keys we use in the app. JSON values are converted into the types Core Data expects them to be.
6. The mapper asks the Core Data manager for a context for its thread. Each Song object is created, updated or destroyed based on the JSON data.
7. The context is saved, pushing its changes back up to the parent.
8. The Core Data manager notifies all listeners that the songs list has changed.
9.  The songs list interface pulls the data from the main thread context and displays it.

Threading adds some headaches and complexity, but keeping all the work off the main thread keeps the UI responsive to user input. It may take a bit longer to get data on screen, but that's a much better experience than locking up the UI for even a second.

Core Data is getting better with each OS (or iOS?) release. Those sharp edges are getting smoother, and performance is getting better. There are times I think we may have outgrown Core Data. I'll dive into other solutions, but nothing comes close for the convenience of relationship management.


[0]: https://developer.apple.com/library/mac/documentation/Cocoa/Conceptual/CoreData/cdProgrammingGuide.html
[2]: http://appstore.com/planningcenterservices
