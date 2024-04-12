Enabling Varnish ESI Edge Side Includes 
==============================

To enable ESI in Varnish add the following to default.vcl to the docker container.

Starting from the default configuration I have just modified
 `sub vcl_backend_response` adding `set beresp.do_esi = true` 
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

Refreshing the page you can see the different caches duration for each part of the page

![index.php](https://github.com/freedev/esi-example/blob/main/index-php.png?raw=true)