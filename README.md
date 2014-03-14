## Doctrine 2 Extensions for POSTGRESQL

Author
=======
* Michel Soares Pintor

Usage
=====
## to_char
Função de formatação de data e Hora: [to_char](http://www.postgresql.org/docs/9.3/static/functions-formatting.html).

``` clojure
(query "SELECT to_char(campo, 'yyyy-mm-dd HH24') AS alias ...")
```

## cast
Função de conversão de tipo: [cast](http://www.postgresql.org/docs/9.3/static/typeconv-func.html).

``` clojure
(query "SELECT CAST(campo AS 'float') ...")
```

## stddev
Função de agregação: [stddev](http://www.postgresql.org/docs/9.3/static/functions-aggregate.html).

``` clojure
(query "SELECT sttdev(campo) ...")
```

Contacts
========
You also can report bugs or suggest features using issue tracker at GitHub
https://github.com/michelsp/DoctrineExtensions/issues