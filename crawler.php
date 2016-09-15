<?php
require_once('simple_html_dom/simple_html_dom.php');
function get_link1($target_url){
    $html = new simple_html_dom();
    $html->load_file($target_url);
    $links=$html->find('a');
    $base_url=$target_url;
    if(substr($base_url, 0, 7)=='http://'){
        $base_url=substr($base_url, 7);
        $base_url='http://'.substr($base_url, 0, strpos($base_url, '/'));
    }else if(substr($base_url, 0, 8)=='https://'){
        $base_url=substr($base_url, 8);
        $base_url='https://'.substr($base_url, 0, strpos($base_url, '/'));
    }
    foreach($links as $link){
        if(strpos($link->href,'#')){
            $link->href=substr($link->href,0,strpos($link->href,'#'));
        }

        if(substr($link->href,0,1)=='.'){
            $link->href=substr($link->href,0,1);
        }else if(substr($link->href,0,1)=='#'){
            $link->href=$target_url;
        }else if(substr($link->href,0,7)=='mailto:'){
            $link->href="[$link->href]";
        }else if(substr($link->href,0,2)=='//'){
            $link->href=$base_url.substr($link->href,2);
        }else if(substr($link->href,0,1)=='/'){
            $link->href=$base_url.$link->href;
        }
        echo ("<li><a href='$link->href'>$link->href</a></li>");
    }
}
if(isset($_REQUEST["url"])){
    get_link1($_REQUEST["url"]);
}
?>
