<?php

// Data: array("param" => "value") ==> index.php?param=value
function CallAPI($method, $url, $data = false) {
    $curl = curl_init();
    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

function build_api_url($param, $key) {
    $key_url = "&apiKey=".$key;
    return "https://www.n2yo.com/rest/v1/satellite/".$param.$key_url;
}

$mykey = "FR2XVF-WR3JRJ-Z9UGV4-4KBZ";

if ($_POST['cmd']=='above') {
    $param_url = "above/".$_POST['obs_lat'] ."/". $_POST['obs_lng'] ."/". $_POST['obs_alt'] ."/". $_POST['search_radius'] ."/". $_POST['cat_id'];

    $url1 = build_api_url($param_url, $mykey);
    echo CallAPI("GET", $url1);

} else if ($_POST['cmd']=='positions') {
    $param_url = "positions/".$_POST['id'] ."/". $_POST['obs_lat'] ."/". $_POST['obs_lng'] ."/". $_POST['obs_alt'] ."/". $_POST['sec'];
    $url1 = build_api_url($param_url, $mykey);
    echo CallAPI("GET", $url1);

} else if ($_POST['cmd']=='visual') {
    //   /visualpasses/{id}/{observer_lat}/{observer_lng}/{observer_alt}/{days}/{min_visibility} 
    $param_url = "visualpasses/". $_POST['id'] ."/". $_POST['obs_lat'] ."/". $_POST['obs_lng'] ."/". $_POST['obs_alt'] ."/". $_POST['days'] ."/". $_POST['min'];
    $url1 = build_api_url($param_url, $mykey);
    echo CallAPI("GET", $url1);
} else {
    echo "request unknown";
}



?>
