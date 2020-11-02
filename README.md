# php-twig-pdo-test

![image](https://raw.githubusercontent.com/echochio-tw/php-twig-pdo-test/main/Customer_info.png)

work with joomla in Jumi Application

1. composer install

2. Application details

cloud_info :
```
<?php
session_start();
$_SESSION["userinfo"] = $user ->name;
require_once('cloud/cloud.php');
```
cloudaccount :
```
<?php
session_start();
$_SESSION["userinfo"] = $user ->name;
require_once('cloud/cloudaccount.php');
```

cloud_customer:
```
<?php
session_start();
$_SESSION["userinfo"] = $user ->name;
require_once('cloud/customer.php');
```

3. work for superuser
