<?php 
	$curl = curl_init('https://graph.facebook.com/v2.7/me?fields=id%2Cname%2Cbirthday%2Cabout%2Ccontext%2Ccover&access_token=EAACEdEose0cBAJ3D3SJt6hwZCoj6cEhNIUM7FgzpMVNX8aYIYr6g5MLVqF1FID6AQrgD2VA0U06hqP6ZCSzdlAOkW6pTDWkRM7t3MifamLjjdPRp1ZCV2nG7nR9dFielAqpHeQ7JZBBIyygiBZBfSlTCcqxdOEbxqEayrObsdXAZDZD'); 
	curl_setopt($curl, CURLOPT_FAILONERROR, true); 
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   
	$result = curl_exec($curl);
	echo $result; 
?>