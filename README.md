## Doctrine 2 Extensions for POSTGRESQL

## TO_CHAR

``` clojure
(query "SELECT to_char(campo, 'yyyy-mm-dd HH24') AS alias")
```

## CAST

``` clojure
(query "SELECT CAST(campo AS 'float')")
```
