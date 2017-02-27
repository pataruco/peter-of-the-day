# Peter of the day
A media viewer for family members

## Technologies
* Laravel
* MariaDB
* Angular ?

## Models

* Day
    - date: _datetime_

* Media
    - date: _datetime_
    - URL: _string_
    - type: _enumerable_
    - description: _string_

## Relationships

* A Day have many medias
* A media have one Day
