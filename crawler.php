<?php
require_once('simple_html_dom/simple_html_dom.php');
function get_link1($target_url){
    $html = new simple_html_dom();
    $html->load_file($target_url);
    $links=$html->find('a');
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
        }
        printf ("<li>$link->href</li>");
    }
}
if(isset($_REQUEST["url"])){
    get_link1($_REQUEST["url"]);
}
?>