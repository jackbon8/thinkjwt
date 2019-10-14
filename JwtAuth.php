<?php

namespace Firebase\JWT;


class JwtAuth
{
    /**
     *
     *
        return [
            "key" => "m^wq775SGqFFdkMuwgQLIJL$@id9kKLi&CGRVJw2&@rUlYf0uZEhqJOeL#7hYpvx",//64位key
            "token"    =>[
                "iss" => "localhost.com",//签发者 可选
                "aud" => "localhost.com",//接收该JWT的一方，可选
                "iat" => time(),//签发时间
                "nbf" => time(),//(Not Before)：某个时间点后才能访问，比如设置time+30，表示当前时间30秒后才能使用
                "exp" => mktime(23, 59, 59, date("m", time()), date("d", time()), date("Y", time())), //过期时间,当天结束时间
                "alg" => ['HS256'],//加密方式 HS256，HS512，HS384
            ],
        ];

     *
     *
     */


    /**
     * @param $data jwt加密數據
     * @return string  生成的用戶token
     */
    public static function buildToken($data){
        //jwt 生成token
        $token = config('jwt.token');
        $token['data'] = $data;
        $jwt = JWT::encode($token, config('jwt.key'));
        return $jwt;
    }

    /**
     * @param string $jwt
     * @param array $hs
     * @return array ['code'=>1,'tokenInfo'=>$tokenInfo->data]
     */
    public static function checkToken(string $jwt,array $hs=array('HS256')){
        try {
            $tokenInfo=JWT::decode($jwt, config('jwt.key'), $hs);   //對象
            return ['code'=>1,'tokenInfo'=>$tokenInfo->data];

        } catch (\SignatureInvalidException $e) {//签名不正确
            $remsg = $e->getMessage();
        } catch (\BeforeValidException $e) {//签名在某个时间点之后才能用
            $remsg = $e->getMessage();
        } catch (\ExpiredException $e) {//token过期
            $remsg = $e->getMessage();
        } catch (\Exception $e) { //其他錯誤
            $remsg = $e->getMessage();
        }
        return ['code'=>0,$remsg];
    }



}
