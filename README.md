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

docker, docker-compose

## Run it
Just run Docker Compose to build and start the containers.
```
docker-compose up --build
```

## Test it
Send a HTTP GET request to ``http://localhost:8080/`` to see the output of the applications.

Refreshing the page you can see the different caches duration for each part of the page

![index.php](https://github.com/freedev/esi-example/blob/main/index-php.png?raw=true)