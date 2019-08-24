# github-links
Generates links from Github (PHP,JS) 
## Installation (PHP)
Copy [this](https://github.com/ShiSHcat/github-links/blob/master/PHP.php) to your erver and add this to your code
```php
require [filename].php
``` 
- change [filename] with the name of the downloaded file
## How to use (PHP) 
```php
$r = new GithubLinks();
$r->get("USERNAME","REPO");
```
## How to use (nodejs)
download [this](https://github.com/ShiSHcat/github-links/blob/master/node.js)
use in your script with require
example:
`require("github-links")("ShiSHcat","test-repo").then(console.log);`

## Installation (js)
Download [this](https://github.com/ShiSHcat/github-links/blob/master/JS.js) in your webserver
include that from browser via html
## How to use (js)
`github_get_links("user","repo");`

