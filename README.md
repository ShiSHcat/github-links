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
## Installation (js)
Download [this](https://github.com/ShiSHcat/github-links/blob/master/JS.js) in your webserver
include that from browser via html
## How to use (js)
github_get_links("user","repo",skip_readme);
skip_readme: boolean if skip the readme

## node version is bugged i will fix later
