<?php 
/**
 * Cloud Id + Attendance Upload + Current_time + Api Key
 * D363A40797284737 + 2024-06-30 + Timestamp + P3KYNITCICUX0VM6
 * # Params 
 * Cloud Id = D363A40797284737
 * Attendace Upload = 2024-06-30
 * Format Date = 14
 * Property = date_time
 * Direction = ASC
 * Export Type = JSON
 * Auth = Auth
 * Current Time = Current Time
 */
 $currentUri = "https://api.fingerspot.io/api/download/attendance_log/";
 $cloudId = "C269248053241837";
 $apiKey = "P3KYNITCICUX0VM6";
 $attendace_upload = date('2024-06-30');
 $formatDate = "6";
 $property = "date_time";
 $direction = "asc";
 $exportType = "json";
 $currentTime = date("YmdHis");
 $authStr = $cloudId.$attendace_upload.$currentTime.$apiKey;
 $auth = md5($authStr);
 echo $auth."\n";
 $uri = $currentUri.$cloudId."/".$attendace_upload."/".$formatDate."/".$property."/".$direction."/".$exportType."/".$auth."/".$currentTime;
 echo $uri;
// $uri = ""

// https://api.fingerspot.io/api/download/attendance_log/C269248053241837/2024-06-30/6/date_time/asc/json/be1ef57fef8de98eb091de534b641dda/20240701072334