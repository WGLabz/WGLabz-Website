<?php
// {  
//     "app_id":"test_application_wglab",
//     "dev_id":"dummy_node",
//     "hardware_serial":"00A36492E6360272",
//     "port":1,
//     "counter":11,
//     "payload_raw":"SGkgZnJvbSBXR0xhYnoh",
//     "metadata":{  
//        "time":"2018-10-03T17:31:16.438233072Z",
//        "frequency":867.3,
//        "modulation":"LORA",
//        "data_rate":"SF7BW125",
//        "coding_rate":"4/5",
//        "gateways":[  
//           {  
//              "gtw_id":"eui-b827ebfffeaed699",
//              "timestamp":2948879523,
//              "time":"2018-10-03T17:31:16.36201Z",
//              "channel":4,
//              "rssi":-45,
//              "snr":8.8,
//              "rf_chain":0,
//              "latitude":12.90126,
//              "longitude":77.58433,
//              "altitude":10
//           }
//        ]
//     },
//     "downlink_url":"https://integrations.thethingsnetwork.org/ttn-eu/api/v2/down/test_application_wglab/dfdf?key=ttn-account-v2.W_FJEjfsNt8u1KlDG9vfJYvRo0tLczvVydBHm70oNlc"
//  }

$jsonData=file_get_contents('php://input');
$parsedJsonData=json_decode($jsonData);
$my_file = 'file.txt';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
fwrite($handle,base64_decode ($parsedJsonData["app_id"])."hdfj".$jsonData);
?>