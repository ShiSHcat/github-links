<?php
class GithubLinks {
function __construct(){}
function get__($user,$repo) {
    if (function_exists("curl_init")) {
        $res = $user."/".$repo;
        $ch = curl_init();
        $url = curl_escape($ch,$res);
        $url = "https://api.github.com/repos/".$res."/git/trees/master?recursive=1";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'User-Agent:PHP/1.0'
            #HERE YOU CAN ADD BASIC AUTH
   
        ]);
        $return_ = json_decode(curl_exec($ch),true);
        curl_close($ch);
        return $return_;
    }    
    
        $url = "https://api.github.com/repos/".$user."/".$repo."/git/trees/master?recursive=1";
    $opts = [
        'http'=>[
            'header' => "User-Agent:PHP/1.0\r\n"
            #HERE YOU CAN ADD BASIC AUTH
        ]
    ];
   
    $context = stream_context_create($opts);
   $result = json_decode(file_get_contents(
      $url,false,$context
    ),true);
    return $result;
    
}
function get($user,$repo,$skip_readme=true)  {
    $array = $this->get__($user,$repo)["tree"];
    $aoa   = array();
    $return = array();
    
    foreach ($array as $n => $ar) {
        $s_p = $ar['path'];
        $p_ar = explode("/",$s_p);
        $typ = $ar['type'];
        if (($s_p =="README.md") && ($skip_readme)) {
           continue;
        }
        if ($typ == "tree") {
            continue;
            }
            $filename = array_pop($p_ar);
            $p = implode("/",$p_ar);
        $link = 'https://raw.githubusercontent.com/'.$user.'/'.$repo.'/master/'.$filename;
           if (strpos($s_p,"/") === false) {
            $return[$filename] = $link;
            continue;
           }
        $return[$p][$filename] = $link;
        
    }
    return $return;
}


}
?>
