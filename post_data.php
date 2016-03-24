<
//构造要post的字符串，，网页地址后面加个问号，中间用&符号连接各个参数
$url = 'http://www.baidu.com?' ;
$fields = array(
'hpzl'=>$_POST['hpzl'],
'fzjg'=>$_POST['fzjg'],
'hphm'=>$_POST['hphm'],
'clsbdh'=>$_POST['clsbdh'],
'businesstype'=>'Wz_vehcxPROC',
'hp'=>strtoupper('Q'.$_POST['hphm']),
'clsbh'=>$_POST['clsbdh'],
'luruflag'=>'',
'xreset'=>'1',
'wfbj2'=>'');
//url-ify the data for the POST
$fields_string ='';
foreach($fields as $key=>$value)
{
$str = $key.'='.$value.'&';
$fields_string .= $str;
}
rtrim($fields_string ,'&') ;
//open connection
$ch = curl_init() ;
//set the url, number of POST vars, POST data
$url = $url.rtrim($fields_string ,'&') ;
curl_setopt($ch, CURLOPT_URL,$url) ;
curl_setopt($ch, CURLOPT_POST,count($fields)) ;
curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string) ;
//execute post
$result = curl_exec($ch) ;
print_r($result);
//close connection
curl_close($ch) ;
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); >
