Beanstalk Queue Driver 
======================

[![Build Status](https://travis-ci.org/kanboard/plugin-beanstalk.svg?branch=master)](https://travis-ci.org/kanboard/plugin-beanstalk)

This plugin use [Beanstalk](http://kr.github.io/beanstalkd/) to process background jobs for Kanboard.

Author
------

- Frederic Guillot
- License MIT

Requirements
------------

- Kanboard >= 1.0.29
- PHP >= 5.3.3
- Beanstalkd daemon

Installation
------------

You have the choice between 3 methods:

1. Install the plugin from the Kanboard plugin manager in one click
2. Download the zip file and decompress everything under the directory `plugins/Beanstalk`
3. Clone this repository into the folder `plugins/Beanstalk`

Note: Plugin folder is case-sensitive.

Configuration
-------------

By default this plugin assume that beanstalkd is running on `localhost`.
To change the default values, define those parameters in your config file:

```php
define('QUEUE_NAME', 'kanboard');
define('BEANSTALKD_HOSTNAME', '127.0.0.1');
```

You also need to run the Kanboard's worker:

```bash
./cli worker
```

The worker must have the same permissions as the web application (same user).
You should run the worker with a process manager like [supervisord](http://supervisord.org) or similar.
