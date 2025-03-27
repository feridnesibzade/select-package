# TODO
1. Explain me .lock file
   2. should it be included in git?
2. https://laravel.com/docs/12.x/packages#main-content Read
3. Read composer docs on `repository` tag


# 2025-03-20 Package creation (sym link)

```composer
"repositories": {
    "select": {
        "type": "path",
        "url": "./package/select",
        "options": {
            "symlink": true
        }
    }
},
```

```composer
"autoload": {
    "psr-4": {
        "Farid\\Select\\": "src/"
    }
},
"extra": {
    "laravel": {
        "providers": [
            "Farid\\Select\\FaridSelectServiceProvider"
        ]
    }
},
```

## 2025-03-27
### TODO
1. Adaptar pattern oyren. Laravel-de harda istifade olunubsa goster.
2. Laracast
    1. Telescope
    2. PHPStan
4. Composer optionlari
5. Reservation proyektine
    1. ide-helper install ele
    2. Telescope-u install ele. yalniz non-prod environment-de ishlesin.
        1. Database migration yalniz production olmayan environment-lerde ishlemelidir.
