<?php
/*
 *
 * @file name: function.php
 *
 * @description: Some usefull functions.
 * @author: RayLee[itaoyuan.org]
 * @version: 1.2
 * @license: GNU/GPL
 * @copyright: RayLee[RayLee@itaoyuan.org]
 *
 */
 
//--------------------------------------------------------------------------------------------//

/*
 * @function name: filter
 * @description: filter some HTML tags.
 *
 * @parameter $str(string): required, the strings that will be filtered.
 *
 * @return: filtered strings.
 */
function filter($str){
  // HTML tags that will be filtered.
  $farr = array(
      "/\s+/",
      "/<(\/?)(object|script|i?frame|style|html|body|title|link|meta|\?|\%)([^>]*?)>/isU",
      "/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",
  );
  // the strings that will replace the filtered ones.
  $tarr = array(
      " ",
      "＜\\1\\2\\3＞",
      "\\1\\2",
  );
  // strings replace.
  $str = preg_replace($farr,$tarr,$str);
  return $str;
}

//--------------------------------------------------------------------------------------------//

/*
 * @function name: generate_once
 * @description: Creat the token key, which will be encrypted by MD5.
 *
 * @parameter $length(int): optional, the length of the key. default 12.
 * @parameter $text(string): optional, custom string, something like private key. default null.
 *
 * @return: encrypted strings.
 */
function generate_once($length = 12, $text = ""){
  // base strings.
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|';
    $password = '';
  
  // Get the random strings.
  // The length of the string will be set as the parameter $length, which is gave 12 by default.
    for($i = 0; $i < $length; $i++){
    //$password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    $password .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
  
  // Encrypting the string by MD5, then return it.
  return $password = strtoupper(md5($password.time().$text));
  
  // Done.
}

//--------------------------------------------------------------------------------------------//

/*
 * @function name: get_content
 * @description: Get remote page contents by using cURL if it is available or using socket. 
 *
 * @parameter $url(string): required, the remote page url.
 * @parameter $header(bool): optional, output the respond hearder or not, default is false.
 *  NOTICE: if the $nobody is set to true, it will ignore the $header setting whether it is true or false that will aways output the respond header.
 * @parameter $nobody(bool): optional, no body content to output, default is false.
 * @parameter $referer(string): optional, custom referer, default is null.
 *
 * @return: strings, the contents of the remote page
 *
 */
function get_content($url,$header=false,$nobody=false,$referer='',$stream=true){
  $content = '';
  
  //cURL. More information see http://php.net/manual/zh/book.curl.php
  if(function_exists('curl_init')){
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, $header);
    curl_setopt($ch, CURLOPT_NOBODY, $nobody);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, $stream);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:'.$_SERVER["REMOTE_ADDR"], 'CLIENT-IP:'.$_SERVER["REMOTE_ADDR"]));
    
    $content .= curl_exec($ch);
    curl_close($ch);
  }
  //socket. More information see http://php.net/manual/zh/function.fsockopen.php
  else{
    // Separate the URL, more details see http://www.php.net/manual/zh/function.parse-url.php
    $remote = parse_url($url);
    
    // Get host.
    $host = $remote['host'];
    
    // Get the port if it exists, or set it to 80.
    $port = array_key_exists('port', $remote) ? $remote['port'] : 80;
    
    // Get the path if it exists, or set it to the root(/).
    $path = array_key_exists('path', $remote) ? $remote['path'] : '/';
    
    // Get the query if it exists, or set it to null.
    $query = array_key_exists('query', $remote) ? '?'.$remote['query'] : '';
    
    // Open Internet or Unix domain socket connection.
    $fp = fsockopen($host, $port, $errno, $errstr, 30);
    
    if($fp){
      $send = '';
      // Construct the request header.
      // We use HTTP/1.0 here to avoid the chunked transfer mode that will put some useless strings in the contents.
      $send .= "GET ".$path.$query." HTTP/1.0".PHP_EOL;
      $send .= "Host: ".$host.PHP_EOL;
      $send .= "Referer: ".$referer.PHP_EOL;
      $send .= "User-Agent: ".$_SERVER['HTTP_USER_AGENT'].PHP_EOL;
      $send .= "Connection: Close".PHP_EOL.PHP_EOL;
      
      // Put the request header into the connection.
      fwrite($fp, $send);
      
      // Read the contents.
      while(!feof($fp))
        $content .= fread($fp,128);
      
      fclose($fp);
      
      // Discrete the header and the body contents.
      // As we kown, there are two line breaks between the header and the body, so we just do like this
      $ex = explode(PHP_EOL.PHP_EOL,$content);
      
      // If no header output, we just need the body contents.
      if(!$header)
        $content = $ex[1];
      
      // No body out put, we just need the header, it will ignore the $header setting whether it is true or false
      if($nobody)
        $content = $ex[0];
    }
  }
  
  return $content;
  
  // Done.
}
  
 /**
 * 输出变量
 *
 * @param void $varVal 变量值
 * @param str $varName 变量名
 * @param bool $isExit 是否输出变量之后就结束程序（TRUE:是 FALSE:否）
 */
function dump($varVal, $isExit = FALSE){
    ob_start();
    var_dump($varVal);
    $varVal = ob_get_clean();
    $varVal = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $varVal);
    echo '<pre>'.$varVal.'</pre>';
    $isExit && exit();
}

?>