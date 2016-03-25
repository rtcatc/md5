<?php
/*
*Author:Code Life
*http://www.ract.top
*/

$time_start = microtime(true);


if(!empty($_POST)&&!empty($_POST['q'])){
	
	$e = trim($_POST['q']);
	if((strlen($e) == 16) || (strlen($e) == 32))
	{
		set_time_limit(0);				//不限定脚本执行时间
		$q=strip_tags(trim($e));
		$url = "http://www.md5.lol/api/md5/".$q;
		$results=file_get_contents($url);
		$obj=json_decode($results); 
	}else{
		$obj= array("s" => false,"r" => "目前测试MD5"); 
		$obj = json_decode(json_encode($obj));
	}
	
}
?>
<script>
<!--
    function check(form){
if(form.q.value==""){
  alert("目前测试MD5");
  form.q.focus();
  return false;
 }
}
-->
</script>
<form name="from"action="post_data.php" method="post">
			<div id="content"><div id="create_form"><label>请输入密文：<input class="inurl" size="26" id="unurl" name="q" value="<?php echo !empty($q)?$q:''; ?>"/></label>
			<?php
		if(isset($obj)){
			if($obj->s)
			{
				echo '<ul>恭喜,解密成功:<font color=#ffff00><strong>';
				echo $obj->r;
				echo '</strong><br /><li>数据来源:<a href="http://www.md5.lol/api/md5">www.md5.lol</a><br /></li></font>';
				echo '</ul>';
				
			}else
			{
				echo '<ul>解密失败,进入后台破解...';
				echo '</ul>';
			}
			
		}
		?>
