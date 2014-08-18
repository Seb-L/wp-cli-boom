wp-boom
=======

Initial Wordpress install with your favorite plugins/themes in less than a minute using WP-CLI &amp; a single wordpress.json config file.

# Install

## Install wp-cli

See : http://wp-cli.org/

## Install wp-boom

In your terminal

```
curl -O https://raw.githubusercontent.com/Seb-L/wp-boom/master/wp-boom.php
```

Then:

```
chmod +x wp-cli.phar
sudo mv wp-boom.php /usr/local/bin/wp-boom
```

# Using

First you need to create a wordpress.json file in your main directory, (there is an exemple in the repository above), and looks like this:

```
{
    "download": {
        "locale": "fr_FR"
    },
    "config": {
        "dbname": "test",
        "dbuser": "root",
        "dbpass": "root",
        "dbhost": "localhost",
        "dbprefix": "wp_",
        "dbcharset": "utf8"
    },
    "install": {
        "url": "http://localhost:8888/Test",
        "title": "test",
        "admin_user": "pouet",
        "admin_password": "pouet",
        "admin_email": "my.mail@me.com"
    },
    "plugins": [{
        "slug": "mobble",
        "activate": true
    }, {
        "slug": "timber-library",
        "activate": true
    }],
    "themes": [{
        "slug": "flat",
        "activate": false
    }, {
        "slug": "padhang",
        "activate": true
    }]
}
```

You can use any attributes in the 'download / config / install' sections, see the documentation: http://wp-cli.org/commands/core/

For the plugins & themes you just have to put the slug (or zip url/path instead) and specify if you want to activate them or not.

Then in you terminal go to the folder where you put your 'wordpress.json' and type:

```
wp-boom
```

Wait and BOOM! Your Wordpress website is ready !



Special thanks to my friend @kartonnade for the discover of wp-cli.