ESI Edge Side Includes example 
==============================

Draft: [Edge Side Includes](https://en.wikipedia.org/wiki/Edge_Side_Includes) (ESI) is a small markup language for edge level dynamic web content assembly. The purpose of ESI is to tackle the problem of web infrastructure scaling.[1] It is an application of edge computing.


## What are the ESI tags
The ESI tags were introduced by Akamai to add some dynamic tags and only re-render these parts on the server-side. The goal of that is to render only specific parts. For example, we want to render a full e-commerce webpage but only the cart is user-dependent. So we could render the "static" parts and store with a predefined TTL (e.g. 60 minutes), and only the cart would be requested to render the block.

There are multiple esi tags that we can use but the most used is the esi:include because that's the one to request another resource.

We can have many esi:include tags in a single response, and each esi:include tags can itself have one or more esi:include tags.

## References
https://www.w3.org/TR/esi-lang/

## Requirements:

apache2, php, varnish

## How to for Macos Apple Silicon users:

     brew install varnish apache php

To enable PHP in Apache add the following to httpd.conf (/opt/homebrew/etc/httpd/httpd.conf) 

    LoadModule php_module /opt/homebrew/opt/php/lib/httpd/modules/libphp.so

    <IfModule php_module>
        <FilesMatch \.php$>
            SetHandler application/x-httpd-php
        </FilesMatch>

        <IfModule dir_module>
            DirectoryIndex index.html index.php
        </IfModule>
    </IfModule>

Both Apache 2 and Varnish are configured by default to listen on port 8080, this is a real problem for our purpose.
So we need to move Apache 2 on port 8081. You need to modify httpd.conf changing:

    Listen 8080

into

    Listen 8081
 
Now you can start (or restart) Apache:

    brew services restart apache2

To check that Apache 2 is running successfully run:

    sudo lsof -itcp -n -P | grep LISTEN | grep httpd

You should see something like this:

    httpd     96177 youruser    4u  IPv6 0xfa65b9eaf13404c1      0t0  TCP *:8081 (LISTEN)
    httpd     96183 youruser    4u  IPv6 0xfa65b9eaf13404c1      0t0  TCP *:8081 (LISTEN)
    httpd     96184 youruser    4u  IPv6 0xfa65b9eaf13404c1      0t0  TCP *:8081 (LISTEN)
    httpd     96185 youruser    4u  IPv6 0xfa65b9eaf13404c1      0t0  TCP *:8081 (LISTEN)
    httpd     96186 youruser    4u  IPv6 0xfa65b9eaf13404c1      0t0  TCP *:8081 (LISTEN)
    httpd     96187 youruser    4u  IPv6 0xfa65b9eaf13404c1      0t0  TCP *:8081 (LISTEN)
    httpd     96564 youruser    4u  IPv6 0xfa65b9eaf13404c1      0t0  TCP *:8081 (LISTEN)

To enable ESI in Varnish add the following to default.vcl (/opt/homebrew/etc/varnish/default.vcl) 
modify `sub vcl_backend_response` adding `set beresp.do_esi = true` 
You should have something like this:

    sub vcl_backend_response {

        set beresp.do_esi = true;

    }

This step is optional, you could remove s-maxage header from response
modify `sub vcl_deliver` adding `set resp.http.cache-control = regsub(resp.http.cache-control, "(,\s*s-maxage=[0-9]+\s*$)|(\s*s-maxage=[0-9]+\s*,)","");` 
You should have something like this:

    sub vcl_deliver {

        set resp.http.cache-control = regsub(resp.http.cache-control, "(,\s*s-maxage=[0-9]+\s*$)|(\s*s-maxage=[0-9]+\s*,)","");

    }

and start (or restart) Varnish:

    brew services restart varnish

at end you should have varnish listening on port 8080 (and apache 2 listeining on port 8081)
To check that Apache 2 is running successfully run:

    sudo lsof -itcp -n -P | grep LISTEN | grep varnish

You should see something like this:

    varnishd  96540 youruser    4u  IPv4 0xfa65b9e622dd95f9      0t0  TCP *:8080 (LISTEN)
    varnishd  96540 youruser    7u  IPv4 0xfa65b9e624653729      0t0  TCP 127.0.0.1:2000 (LISTEN)
    varnishd  96555 youruser    4u  IPv4 0xfa65b9e622dd95f9      0t0  TCP *:8080 (LISTEN)

Now you can copy the folder `src-php` in `/opt/homebrew/var/www/` and follow the link

    http://localhost:8080/src-php/

![index.php](https://github.com/freedev/esi-example/blob/main/index-php.png?raw=true)