<?php
require_once __DIR__ . '/../autoload.php'; use Qiniu\Auth; use Qiniu\Processing\PersistentFop; $accessKey = 'Access_Key'; $secretKey = 'Secret_Key'; $entry = '<bucket>:<Key>';$encodedEntryURI = \Qiniu\base64_urlSafeEncode($entry); $newurl = "78re52.com1.z0.glb.clouddn.com/resource/Ship.jpg?imageView2/2/w/200/h/200|saveas/" . $encodedEntryURI; $sign = hash_hmac("sha1", $newurl, $secretKey, true); $encodedSign = \Qiniu\base64_urlSafeEncode($sign); $finalURL = "http://" . $newurl . "/sign/" . $accessKey . ":" . $encodedSign; $callbackBody = file_get_contents("$finalURL"); echo $callbackBody; 