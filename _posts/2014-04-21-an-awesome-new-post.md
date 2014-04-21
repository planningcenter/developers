---
layout: post
title:  "An awesome new post"
date:   2014-04-21 09:50:51
team:   mobile
author: Skylar Schipper
---

Donec id elit non mi porta gravida at eget metus. Donec sed odio dui. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Maecenas faucibus mollis interdum. Vestibulum id ligula porta felis euismod semper.

Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.

```objc
  if (attachment.link) {
        if ([delegate respondsToSelector:@selector(didLoadAttachmentURL:)]) {
            [delegate didLoadAttachmentURL:attachment];
        }
        if ([delegate respondsToSelector:@selector(didOpenAttachment:)]) {
            [delegate didOpenAttachment:attachment];
        }
        if (![delegate openUnknownAttachment:attachment URL:[NSURL URLWithString:attachment.link]]) {
            if ([delegate respondsToSelector:@selector(failedToOpenAttachment:error:)]) {
                [delegate failedToOpenAttachment:attachment error:openFailedError];
            }
        }
        return;
    }
```

Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue.
