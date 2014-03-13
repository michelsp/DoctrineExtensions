## Doctrine 2 Extensions for POSTGRESQL

## to_char

``` clojure
(query "SELECT to_char(campo, 'yyyy-mm-dd HH24') AS alias")
```

## cast

``` clojure
(query "SELECT CAST(campo AS 'float')")
```
