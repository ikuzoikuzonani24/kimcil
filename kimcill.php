

<?php
function feed($userid, $usertoken){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"active/sheepFeed/getMySheep.do?callback=topicCallback1534000816050&appTypeId=0&lang=12&countryCode=ID&appVersion=7.1.1&currency=IDR&terminalType=1&timestamp=1533999986382&cookieId=074619ce-428b-4bb4-9c5d-ed3478be0b36&userId=$userid&userToken=$usertoken&token=P7XFhJz3PGHyfPexVeAQ%2BbYbNCdWNZczUv2ml%2ByjYJxFLhpVkVBxKQQQ&_=1534000814021");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
        curl_setopt($ch, CURLOPT_REFERER, 'https://h5server.jollychic.com/');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi 4X Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/68.0.3440.91 Mobile Safari/537.36');
        $output = curl_exec ($ch);
        curl_close ($ch);
        $chi = curl_init();
                return $output;
}
function change($userid, $usertoken, $sheepName, $sheepId){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://h5server.jollychic.com/active/sheepFeed/submitSheepInfo.do?callback=topicCallback1534000827075&appTypeId=0&lang=12&countryCode=ID&appVersion=7.1.1&currency=IDR&terminalType=1&timestamp=1533999986382&cookieId=074619ce-428b-4bb4-9c5d-ed3478be0b36&userId=$userid&userToken=$usertoken&token=P7XFhJz3PGHyfPexVeAQ%2BbYbNCdWNZczUv2ml%2ByjYJxFLhpVkVBxKQQQ&sheepId=$sheepId&sheepName=$sheepName&_=1534000814022");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
        curl_setopt($ch, CURLOPT_REFERER, 'https://h5server.jollychic.com/');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi 4X Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/68.0.3440.91 Mobile Safari/537.36');
        $output = curl_exec ($ch);
        curl_close ($ch);
        $chi = curl_init();
                return $output;
}
echo "User ID?\nInput : ";
$uid = trim(fgets(STDIN));
echo "User Token?\nInput : ";
$usertoken = trim(fgets(STDIN));
$jolly = feed($uid, $usertoken);
$x = explode('"sheepId":', $jolly);
for($a=1;$a<count($x);$a++){
        $s = explode("," ,$x[$a]);
        $sheepId = $s[0];
        $get = file_get_contents("https://api.randomuser.me");
        $j = json_decode($get, true);
        $getName = $j['results'][0]['name']['first'];
        $change = change($uid, $usertoken, $getName,$sheepId);
        print_r($change."\n");
}
?>
