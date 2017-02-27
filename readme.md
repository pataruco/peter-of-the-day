# Peter of the day
A media viewer for family members

## Technologies
* Laravel
* MariaDB
* Angular ?

## Models

* Day
    - date: _datetime_

* File
    - URL: _string_
    - type: _enumerable_
    - description: _string_
    - name: _string_

## Relationships

* A Day have many medias
* A media have one Day
