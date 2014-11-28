# Here I Am!

Just another Web components app.

Share your position with friends.

[demo](http://codeland.cz/hereiam/)

## Requirements

- webserver
- [PHP](http://php.net/)
- [MYSQL](http://www.mysql.com)
- [Composer](https://getcomposer.org/)
- [Bower](http://bower.io/)

## Installation

> git clone https://github.com/codelandcz/hereiam.git

> composer install

> bower install

Prepare your database:

    CREATE TABLE position (
      `name` varchar(16) NOT NULL,
      lat double NOT NULL,
      lng double NOT NULL,
      `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      UNIQUE KEY `name` (`name`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

Make you own configuration:
create new file config.yml by making a copy of [config.yml.dist](src/config.yml.dist).

## Run
Point your webserver to the cloned directory and start your browser.

## Usage
User is requested for his name and position. Map is refreshed with his position in the center. Map shows positions of all users.

User can refresh the positions by a refresh button.
