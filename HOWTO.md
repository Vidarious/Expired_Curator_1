#Curator How To Guide

###Classes
- [Database](#database)
  - [Create database object](#database1)
  - [Prepare a SQL statement](#database2)
  - [Bind values to a prepared statement](#database3)
- [Lanugage](#language)
- [Session](#session)
- [Log](#log)


##Database <a id="database"></a>
#####Create database object<a id="database1"></a>
```php
$DB = CLASSES\Database::getConnection();
```

#####Prepare a SQL statement<a id="database2"></a>
```php
$statement = "INSERT INTO TABLE (name, value) VALUES (:name, :value)";
$DB->prepareStatement($statement);
```

#####Bind values to a prepared statement<a id="database3"></a>
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

##Language <a id="language"></a>

##Session <a id="session"></a>

##Log <a id="log"></a>