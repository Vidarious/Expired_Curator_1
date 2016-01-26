# <a id="top"></a>Curator How To Guide

###Classes
- [Database](#database)
  - [Create database object](#database1)
  - [Prepare a SQL statement](#database2)
  - [Bind values to a prepared statement](#database3)
- [Lanugage](#language)
- [Session](#session)
- [Log](#log)


## <a id="database"></a>Database
#####Create database object<a id="database1"></a>
```php
$DB = CLASSES\Database::getConnection();
```

[Back to Top](#top)

##### <a id="database2"></a>Prepare a SQL statement
```php
$statement = "INSERT INTO TABLE (name, value) VALUES (:name, :value)";
$DB->prepareStatement($statement);
```

[Back to Top](#top)

##### <a id="database3"></a>Bind values to a prepared statement
```php
$parameter = "name";
$value = "John";
$parameterType = "PARAM_STR";

$DB->bindValue($parameter, $value, $parameterType);
```
OR
```php
$DB->bindValue("name", "John", "PARAM_STR");
```

**NOTE**: If $parameterType is not set the method will first identify the variable passed and properly associate the type:
- PARAM_INT
- PARAM_BOOL
- PARAM_NULL
- PARAM_STR

[Back to Top](#top)

* * *

## <a id="language"></a>Language

[Back to Top](#top)

* * *

## <a id="session"></a>Session

[Back to Top](#top)

* * *

## <a id="log"></a>Log

[Back to Top](#top)