# thinkjwt
最近项目比较多  所以为了提高开发效率  对公共模块进行了封装
下面就是对thinkphp项目 进行了jwt的封装

安装完成以后  只需要安装阅读JwtAuth.php 文件配置相应的参数。

项目文件的composer.json的require加入以下代码
"ssw/ssw_jwt": "dev-master"

然后执行

composer update

等待引入即可


使用案例：


` ` 
      <?php

            use Thinkjwt\JWT\JwtAuth;

            //加密生成token
            public function ceateToken()
            {

               $tokenData = [
                  'userid'=>88,
                  'pwd'=>'千万不要设置用户密码以及其他隐私数据',
                  'anything'=>'设置其他你想要加密的数据'
               ];
               $token = JwtAuth::buildToken($tokenData);
               return $token;
            }

            //解密验证token
            public function ceateToken()
            {
               $Info=JwtAuth::checkToken($token);
            }
      ?>
` ` 
