#Curator How To Guide

###Classes
- [Database](#database)
- [Lanugage](#language)
- [Session](#session)
- [Log](#log)

<a id="database"></a>##Database 
#####Create database object
```php
$DB = CLASSES\Database::getConnection();
```

#####Prepare a SQL statement.
```php
$DB->prepareStatement($statement);
```

#####Bind values to a prepared statement.
```php
$DB->bindValue($parameter, $value, $parameterType);
```
If $parameterType is not set the method will first identify the variable passed and properly associate the type (PARAM_INT, PARAM_BOOL, PARAM_NULL or PARAM_STR).

#####
```php
```

#####
```php
```

#####
```php
```

#####
```php
```

<a id="language"></a>##Language 

<a id="session"></a>##Session 

<a id="log"></a>##Log 