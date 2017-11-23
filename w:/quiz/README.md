

docker build -t my-php-app .
docker run -d --name my-running-app my-php-app

We recommend that you add a custom php.ini configuration. COPY it into /usr/local/etc/php by adding one more line to the Dockerfile above and running the same commands to build and run:

FROM php:7.0-apache
COPY config/php.ini /usr/local/etc/php/
COPY src/ /var/www/html/
Where src/ is the directory containing all your PHP code and config/ contains your php.ini file.


https://websiteforstudents.com/installing-lamp-ubuntu-17-04-17-10/

docker run -p 8081:80 -d --name my-running-app my-php-app


https://getcomposer.org/doc/00-intro.md
renamed as part of install and sudo mv to /usr/local/bin



















# [Start Bootstrap](http://startbootstrap.com/) - [Full Width Pics](http://startbootstrap.com/template-overviews/full-width-pics/)

[Full Width Pics](http://startbootstrap.com/template-overviews/full-width-pics/) is an HTML starter template for [Bootstrap](http://getbootstrap.com/) created by [Start Bootstrap](http://startbootstrap.com/). This template features numerous full width background image content sections.

## Getting Started

To begin using this template, choose one of the following options to get started:
* [Download the latest release on Start Bootstrap](http://startbootstrap.com/template-overviews/full-width-pics/)
* Clone the repo: `git clone https://github.com/BlackrockDigital/startbootstrap-full-width-pics.git`
* Fork the repo

## Bugs and Issues

Have a bug or an issue with this template? [Open a new issue](https://github.com/BlackrockDigital/startbootstrap-full-width-pics/issues) here on GitHub or leave a comment on the [template overview page at Start Bootstrap](http://startbootstrap.com/template-overviews/full-width-pics/).

## Creator

Start Bootstrap was created by and is maintained by **[David Miller](http://davidmiller.io/)**, Owner of [Blackrock Digital](http://blackrockdigital.io/).

* https://twitter.com/davidmillerskt
* https://github.com/davidtmiller

Start Bootstrap is based on the [Bootstrap](http://getbootstrap.com/) framework created by [Mark Otto](https://twitter.com/mdo) and [Jacob Thorton](https://twitter.com/fat).

## Copyright and License

Copyright 2013-2016 Blackrock Digital LLC. Code released under the [MIT](https://github.com/BlackrockDigital/startbootstrap-full-width-pics/blob/gh-pages/LICENSE) license.