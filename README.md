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
