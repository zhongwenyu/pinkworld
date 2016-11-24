<?php
namespace Home\Controller;
use Think\Controller;

class WxpayController extends Controller {
    private $wxpayConfig;
    private $wxpay;
    private $parameters;
    private $returnParameters;
    private $weixin;
    private $order = array();

    public function _initialize(){
        $this->wxpayConfig =  array('CURL_TIMEOUT' => 30);
        $this->wxpayConfig['appid'] = "wxd93fdd65967e6fe4";      // 微信公众号身份的唯一标识appid
        $this->wxpayConfig['appsecret'] = "a8e37016182bd9e9d044c03dc573d9f0";  // APP密钥
        $this->wxpayConfig['mchid'] = "1248595301";          // 微信支付商户号
        $this->wxpayConfig['key'] = "adminghyh82bd9e9d044c03dc573d9f0";      // 商户支付密钥Key
        $this->wxpayConfig['notifyurl'] = "http://www.zhongwenyu1987.com/index.php/Home/Wxpay/Paynotify"; //异步通知地址
        $this->wxpayConfig['returnurl'] = "http://www.zhongwenyu1987.com/index.php/Home/Wxpay/ReturnNotify"; //同步通知地址
        $this->wxpayConfig['url'] = "https://api.mch.weixin.qq.com/pay/unifiedorder";
    }

    /**
     *  支付
     */
    public function pay()
    {
        if(IS_POST){

            $orderid = I('orderid');
            $order = M('order')->where("id = $orderid")->find();

            $ordersn = $order['ordersn'];//商户订单号
            $payprice = $order['goodsprice'];//订单金额

            if (empty($ordersn) || empty($payprice)) {
                die('订单参数不完整!');
            }

            // 设置统一支付接口参数
            // 设置必填参数
            // appid已填,商户无需重复填写
            // mch_id已填,商户无需重复填写
            // noncestr已填,商户无需重复填写
            // spbill_create_ip已填,商户无需重复填写
            // sign已填,商户无需重复填写
            //$this->setParameter("openid", $openid);
            $this->setParameter("body", "购买商品");                          // 商品描述
            // 自定义订单号,此处仅作举例
            //$timeStamp = time();
            //$out_trade_no = \WxPayConf_pub::$APPID . $timeStamp;
            $out_trade_no = $ordersn;
            //$out_trade_no = time();
            $this->setParameter("out_trade_no", $out_trade_no);                      // 商户订单号
            $this->setParameter("total_fee", $payprice * 100);                       // 总金额
            $this->setParameter("notify_url", $this->wxpayConfig['notifyurl']);       // 通知地址
            $this->setParameter("trade_type", "NATIVE");                              // 交易类型
            // 非必填参数,商户可根据实际情况选填
            //$unifiedOrder->setParameter("sub_mch_id", "XXXX");                 // 子商户号
            //$unifiedOrder->setParameter("device_info", "XXXX");                    // 设备号
            //$unifiedOrder->setParameter("attach", "XXXX");                     // 附加数据
            //$unifiedOrder->setParameter("time_start", "XXXX");                 // 交易起始时间
            //$unifiedOrder->setParameter("time_expire", "XXXX");                    // 交易结束时间
            //$unifiedOrder->setParameter("goods_tag", "XXXX");                      // 商品标记
            //$unifiedOrder->setParameter("openid", "XXXX");                     // 用户标识
            //$unifiedOrder->setParameter("product_id", "XXXX");                 // 商品ID


            /*$prepay_id = $this->getPrepayId();
            if (empty($prepay_id)) {
                die('参数出错,请重试!');
            }*/

            $code_url = $this->getCodeUrl();
            $wxurl = $code_url['code_url'];

            exit(json_encode(array('url'=>$wxurl)));

            /*$this->getParameters($prepay_id);
            $returnurl = $this->wxpayConfig['returnurl'];

            $parameters = json_decode($this->parameters);
            $ptimeStamp = $parameters->timeStamp;
            $pnonceStr = $parameters->nonceStr;
            $ppackage = $parameters->package;
            $psignType = $parameters->signType;
            $ppaySign = $parameters->paySign;
            $signPackage = $this->getSignPackage();

            $this->assign("signPackage",$signPackage);
            $this->assign("ptimeStamp",$ptimeStamp);
            $this->assign("pnonceStr",$pnonceStr);
            $this->assign("ppackage",$ppackage);
            $this->assign("psignType",$psignType);
            $this->assign("ppaySign",$ppaySign);
            $this->display('wxpay');*/
        }
    }

    /**
     *  服务器异步通知页面路径
     */
    public function Paynotify() {
        echo 111;
        /**
         * 通用通知接口demo
         * ====================================================
         * 支付完成后，微信会把相关支付和用户信息发送到商户设定的通知URL，
         * 商户接收回调信息后，根据需要设定相应的处理流程。
         *
         * 这里举例使用log文件形式记录回调信息。
         */

        // 存储微信的回调
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        $data = $this->xmlToArray($xml);

        // 验证签名,并回应微信。
        // 对后台通知交互时,如果微信收到商户的应答不是成功或超时,微信认为通知失败，
        // 微信会通过一定的策略（如30分钟共8次）定期重新发起通知
        // 尽可能提高通知的成功率,但微信不保证通知最终能成功。
        if($this->checkSign($data) == FALSE){
            $this->setReturnParameter("return_code", "FAIL");        // 返回状态码
            $this->setReturnParameter("return_msg", "签名失败"); // 返回信息
        } else {
            $this->setReturnParameter("return_code", "SUCCESS"); // 设置返回码
        }
        $returnXml = $this->returnXml();
        echo $returnXml;

        //==商户根据实际情况设置相应的处理流程，此处仅作举例=======

        // 以log文件形式记录回调信息
        /*$log_ = new \Think\Log();
        $log_name = THINK_PATH . "Library/Vendor/Wxpay/jssdk/notify_url.log";   // log文件路径
        $log_->log_result($log_name, "【接收到的notify通知】:\n" . $xml . "\n");*/

        if($this->checkSign($data) == TRUE) {
            if ($data["return_code"] == "FAIL") {
                // 此处应该更新一下订单状态,商户自行增删操作
                die('【通信出错】'.$xml);
                // $log_->log_result($log_name, "【通信出错】:\n" . $xml . "\n");
            } elseif ($data["result_code"] == "FAIL"){
                // 此处应该更新一下订单状态,商户自行增删操作
                // $log_->log_result($log_name, "【业务出错】:\n" . $xml . "\n");
                die('【业务出错】'.$xml);
            }

            if($data["return_code"] == "SUCCESS"){
                $odsn = $data['out_trade_no'];
                $save['paystatus'] = 1;
                $save['paymode'] = 2;
                $save['paytime'] = time();
                $save['trade_no'] = $data['transaction_id'];
                $res = M('order')->where("ordersn = $odsn")->save($save);
            }

            //商户自行增加处理流程,
            //例如：更新订单状态
            //例如：数据库操作
            //例如：推送支付完成信息
        }
    }
    public function ReturnNotify() {
        /**
         * 通用通知接口demo
         * ====================================================
         * 支付完成后，微信会把相关支付和用户信息发送到商户设定的通知URL，
         * 商户接收回调信息后，根据需要设定相应的处理流程。
         *
         * 这里举例使用log文件形式记录回调信息。
         */

        // 存储微信的回调
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        $data = $this->xmlToArray($xml);

        // 验证签名,并回应微信。
        // 对后台通知交互时,如果微信收到商户的应答不是成功或超时,微信认为通知失败，
        // 微信会通过一定的策略（如30分钟共8次）定期重新发起通知
        // 尽可能提高通知的成功率,但微信不保证通知最终能成功。
        if($this->checkSign($data) == FALSE){
            $this->setReturnParameter("return_code", "FAIL");        // 返回状态码
            $this->setReturnParameter("return_msg", "签名失败"); // 返回信息
        } else {
            $this->setReturnParameter("return_code", "SUCCESS"); // 设置返回码
        }
        $returnXml = $this->returnXml();
        //echo $returnXml;
        //==商户根据实际情况设置相应的处理流程，此处仅作举例=======

        // 以log文件形式记录回调信息
        // $log_ = new \Log_();
        // $log_name = THINK_PATH . "Library/Vendor/Wxpay/jssdk/notify_url.log";   // log文件路径
        // $log_->log_result($log_name, "【接收到的notify通知】:\n" . $xml . "\n");

        if($this->checkSign($data) == TRUE) {
            if ($data["return_code"] == "FAIL") {
                // 此处应该更新一下订单状态,商户自行增删操作
                die('【通信出错】'.$xml);
                // $log_->log_result($log_name, "【通信出错】:\n" . $xml . "\n");
            } elseif ($data["result_code"] == "FAIL"){
                // 此处应该更新一下订单状态,商户自行增删操作
                // $log_->log_result($log_name, "【业务出错】:\n" . $xml . "\n");
                die('【业务出错】'.$xml);
            } else {
                // 此处应该更新一下订单状态,商户自行增删操作

            }

            //商户自行增加处理流程,
            //例如：更新订单状态
            //例如：数据库操作
            //例如：推送支付完成信息
        }else $this->redirect('Mobile/Orders/orderNoReceive');
    }

    /**
     * 获取当前页面完整URL地址
     */
    private function get_url() {
        $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
        $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
        $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : $path_info);
        return $sys_protocal . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '') . $relate_url;
    }

    /**
     *  作用：格式化参数，签名过程需要使用
     */
    private function formatBizQueryParaMap($paraMap, $urlencode) {
        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v)
        {
            if($urlencode)
            {
                $v = urlencode($v);
            }
            //$buff .= strtolower($k) . "=" . $v . "&";
            $buff .= $k . "=" . $v . "&";
        }
        $reqPar = '';
        if (strlen($buff) > 0) {
            $reqPar = substr($buff, 0, strlen($buff)-1);
        }
        return $reqPar;
    }

    /**
     *  作用：设置请求参数
     */
    private function setParameter($parameter, $parameterValue) {
        $this->parameters[$this->trimString($parameter)] = $this->trimString($parameterValue);
    }

    private function trimString($value) {
        $ret = null;
        if (null != $value) {
            $ret = $value;
            if (strlen($ret) == 0) {
                $ret = null;
            }
        }
        return $ret;
    }

    /**
     * 获取prepay_id
     */
    private function getPrepayId() {
        $response = $this->postXml();
        $result = $this->xmlToArray($response);
        $prepay_id = $result["prepay_id"];
        return $prepay_id;
    }

    /**
     * 获取codeUrl
     */
    private function getCodeUrl() {
        $response = $this->postXml();
        $result = $this->xmlToArray($response);
        $code_url = $result["code_url"];
        return $result;
    }

    /**
     *  作用：post请求xml
     */
    private function postXml() {
        $xml = $this->createXml();
        $response = $this->postXmlCurl($xml,$this->wxpayConfig['url'],$this->wxpayConfig['CURL_TIMEOUT']);
        return $response;
    }

    /**
     * 生成接口参数xml
     */
    private function createXml() {
        try {
            // 检测必填参数
            if($this->parameters["out_trade_no"] == null) {
                throw new \Exception("缺少统一支付接口必填参数out_trade_no！"."<br>");
            }elseif($this->parameters["body"] == null){
                throw new \Exception("缺少统一支付接口必填参数body！"."<br>");
            }elseif ($this->parameters["total_fee"] == null ) {
                throw new \Exception("缺少统一支付接口必填参数total_fee！"."<br>");
            }elseif ($this->parameters["notify_url"] == null) {
                throw new \Exception("缺少统一支付接口必填参数notify_url！"."<br>");
            }elseif ($this->parameters["trade_type"] == null) {
                throw new \Exception("缺少统一支付接口必填参数trade_type！"."<br>");
            }elseif ($this->parameters["trade_type"] == "JSAPI" && $this->parameters["openid"] == NULL){
                throw new \Exception("统一支付接口中，缺少必填参数openid！trade_type为JSAPI时，openid为必填参数！"."<br>");
            }
            $this->parameters["appid"] = $this->wxpayConfig['appid'];     // 公众账号ID
            $this->parameters["mch_id"] = $this->wxpayConfig['mchid'];        // 商户号
            $this->parameters["spbill_create_ip"] = $_SERVER['REMOTE_ADDR'];// 终端ip
            $this->parameters["nonce_str"] = $this->createNoncestr();     // 随机字符串
            $this->parameters["sign"] = $this->getSign($this->parameters); // 签名
            return  $this->arrayToXml($this->parameters);
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    /**
     *  作用：产生随机字符串，不长于32位
     */
    private function createNoncestr( $length = 32 ) {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str = "";
        for ( $i = 0; $i < $length; $i++ )  {
            $str.= substr($chars, mt_rand(0, strlen($chars)-1), 1);
        }
        return $str;
    }

    /**
     *  作用：生成签名
     */
    private function getSign($Obj) {
        foreach ($Obj as $k => $v) {
            $Parameters[$k] = $v;
        }
        //签名步骤一：按字典序排序参数
        ksort($Parameters);
        $String = $this->formatBizQueryParaMap($Parameters, false);
        //echo '【string1】'.$String.'</br>';
        //签名步骤二：在string后加入KEY
        $String = $String."&key=".$this->wxpayConfig['key'];
        //echo "【string2】".$String."</br>";
        //签名步骤三：MD5加密
        $String = md5($String);
        //echo "【string3】 ".$String."</br>";
        //签名步骤四：所有字符转为大写
        $result_ = strtoupper($String);
        //echo "【result】 ".$result_."</br>";
        return $result_;
    }

    /**
     *  作用：array转xml
     */
    private function arrayToXml($arr) {
        $xml = "<xml>";
        foreach ($arr as $key=>$val) {
            if (is_numeric($val)) {
                $xml.="<".$key.">".$val."</".$key.">";
            } else {
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";

        return $xml;
    }

    /**
     *  作用：以post方式提交xml到对应的接口url
     */
    private function postXmlCurl($xml,$url,$second = 30) {
        //初始化curl
        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);
        //这里设置代理，如果有的话
        //curl_setopt($ch,CURLOPT_PROXY, '8.8.8.8');
        //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
        //设置header
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //post提交方式
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        //运行curl
        $data = curl_exec($ch);
        curl_close($ch);
        //返回结果
        if($data)
        {
            //curl_close($ch);
            return $data;
        }
        else
        {
            $error = curl_errno($ch);
            echo "curl出错，错误码:$error"."<br>";
            echo "<a href='http://curl.haxx.se/libcurl/c/libcurl-errors.html'>错误原因查询</a></br>";
            curl_close($ch);
            return false;
        }
    }

    /**
     *  作用：将xml转为array
     */
    private function xmlToArray($xml) {
        //将XML转为array
        $array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $array_data;
    }

    /**
     *  作用：设置jsapi的参数
     */
    private function getParameters($prepay_id) {
        $jsApiObj["appId"] = $this->wxpayConfig['appid'];
        $timeStamp = time();
        $jsApiObj["timeStamp"] = "$timeStamp";
        $jsApiObj["nonceStr"] = $this->createNoncestr();
        $jsApiObj["package"] = "prepay_id=$prepay_id";
        $jsApiObj["signType"] = "MD5";
        $jsApiObj["paySign"] = $this->getSign($jsApiObj);
        $this->parameters = json_encode($jsApiObj);
    }

    private function checkSign($data) {
        $tmpData = $data;
        unset($tmpData['sign']);
        $sign = $this->getSign($tmpData);//本地签名
        if ($data['sign'] == $sign) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * 设置返回微信的xml数据
     */
    private function setReturnParameter($parameter, $parameterValue) {
        $this->returnParameters[$this->trimString($parameter)] = $this->trimString($parameterValue);
    }

    /**
     * 将xml数据返回微信
     */
    private function returnXml() {
        $returnXml = $this->arrayToXml($this->returnParameters);
        return $returnXml;
    }

    /*----以下是JSSDK的文件----*/
    private function getSignPackage() {
        $jsapiTicket = $this->getJsApiTicket();

        // 注意 URL 一定要动态获取，不能 hardcode.
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $timestamp = time();
        $nonceStr = $this->createNonceStr2();

        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr×tamp=$timestamp&url=$url";

        $signature = sha1($string);

        $signPackage = array(
            "appId"     => $this->wxpayConfig['appid'],
            "nonceStr"  => $nonceStr,
            "timestamp" => $timestamp,
            "url"       => $url,
            "signature" => $signature,
            "rawString" => $string
        );
        return $signPackage;
    }

    private function createNonceStr2($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    private function getJsApiTicket() {
        // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
        // $data = json_decode(file_get_contents("jsapi_ticket.json"));
        $data = json_decode($_COOKIE['jsapi_ticket_json']);
        if ($data->expire_time < time()) {
            $accessToken = $this->getAccessToken();
            // 如果是企业号用以下 URL 获取 ticket
            // $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
            $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
            $res = json_decode($this->httpGet($url));
            $ticket = $res->ticket;
            if ($ticket) {
                //$data->expire_time = time() + 7000;
                //$data->jsapi_ticket = $ticket;
                //$fp = fopen("jsapi_ticket.json", "w");
                //fwrite($fp, json_encode($data));
                //fclose($fp);
                $tempArr = array('jsapi_ticket' => $ticket, 'expire_time' => time() + 7000);
                setcookie('jsapi_ticket_json', json_encode($tempArr), $tempArr['expire_time']);
            }
        } else {
            $ticket = $data->jsapi_ticket;
        }

        return $ticket;
    }

    private function getAccessToken() {
        // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
        // $data = json_decode(file_get_contents("access_token.json"));
        $data = json_decode($_COOKIE["access_token_json"]);
        if ($data->expire_time < time()) {
            // 如果是企业号用以下URL获取access_token
            // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $this->wxpayConfig['appid'] . "&secret=" . $this->wxpayConfig['appsecret'];
            $res = json_decode($this->httpGet($url));
            $access_token = $res->access_token;
            if ($access_token) {
                //$data->expire_time = time() + 7000;
                //$data->access_token = $access_token;
                //$fp = fopen("access_token.json", "w");
                //fwrite($fp, json_encode($data));
                //fclose($fp);
                $tempArr = array('access_token' => $access_token, 'expire_time' => time() + 7000);
                setcookie('access_token_json', json_encode($tempArr), $tempArr['expire_time']);
            }
        } else {
            $access_token = $data->access_token;
        }
        return $access_token;
    }

    private function httpGet($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }

}