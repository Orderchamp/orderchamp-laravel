# orderchamp-laravel
Simple api client for using the orderchamp grahpql api in laravel.

## Installation
`composer require Orderchamp/orderchamp-laravel`

Update your .env
```
ORDERCHAMP_CLIENT_ID=ca8bd79cab7987ba8c7ba34
ORDERCHAMP_CLIENT_SECRET=uRc1i3n7s3cr3t097sdf978c987a6
ORDERCHAMP_API_URL=https://api.orderchamp.com/v1
ORDERCHAMP_WEB_URL=https://www.orderchamp.com
ORDERCHAMP_VERIFY=true
```

Create the file `config/orderchamp.php` to set the proper permissions you need for your app.
```php
<?php

return [
    'scopes' => [
        'account_read',
        'products_read',
        'products_write',
    ],
];
```
