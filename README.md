YouPass
=======

Found [here](http://semscenter.com/getter/youpass), YouPass is a little PHP program I made to bypass the Lightspeed blocking systems SMUSD has and embeds a video.

YouPass Implementation
===

To implemement YouPass into your site, you must have PHP enabled. No YouTube APIs are required for this program.
First, include the class.

```php
include_once('path_to_yt-getter.php');
```

After the class is included, you can do your normal things with functions and whatnot.

```php
$youpass = new YouPass();
$embedCode = $youpass->get('http://www.youtube.com/watch?v=OVMuwa-HRCQ','autoplay=1');
```

Function usage
=====

get()
---

Paramaters: `get($url, $params)`

This function will generate an embed code for the YouTube video and put it in an `<iframe>` element.

`$url` is the URL of the YouTube video. For example, http://www.youtube.com/watch?v=U8GBXvdmHT4 would be a valid URL, while http://youtu.be/U8GBXvdmHT4 would not.

`$params` are the basic YouTube paramaters. Seperate the paramaters by commas. Example: `'autoplay=1,controls=0'`

strip_id()
---

Paramaters: `strip_id($url)`

This function will strip the id from the rest of the URL if you need to use the YouTube API for some reason.

`$url` is the URL to strip.
