
PHP-JWT
=======
随着技术的发展，分布式web应用的普及，通过session管理用户登录状态成本越来越高，因此慢慢发展成为token的方式做登录身份校验，然后通过token去取redis中的缓存的用户信息，随着之后jwt的出现，校验方式更加简单便捷化，无需通过redis缓存，而是直接根据token取出保存的用户信息，以及对token可用性校验，单点登录更为简单

Installation
------------

Use composer to manage your dependencies and download enzo/thinkjwt:

```bash
composer require enzo/thinkjwt
```
