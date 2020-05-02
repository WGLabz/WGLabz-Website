<?php
    class FetchYoutubeVideos{
        function fetchLatest(){
            $API_KEY = "AIzaSyBg6dDmGc-iqkcbQtC_-igYXaNmHSpbqzo"; 
            $response = file_get_contents('https://www.googleapis.com/youtube/v3/search?key='.$API_KEY.'&channelId=UC5BKrTTm1zZ2IxfVhnQufbA&part=id,snippet&order=date&maxResults=8');
            $arr=json_decode($response);
            $ids=array();
            foreach($arr->items as $x){
                if(($x->id->videoId != "") && ($x->snippet->title!="") ){
                    $detailsObj = new stdClass();
                    $detailsObj->videoId = $x->id->videoId;
                    $detailsObj->title = $x->snippet->title;
                    $detailsObj->publishedAt = $x->snippet->publishedAt;
                    $detailsObj->description = $x->snippet->description;
                    $stats_= file_get_contents('https://www.googleapis.com/youtube/v3/videos?key=AIzaSyDQfP10VXe8N42OCvgl2Ngy_RmFJtnjCME&part=statistics&id='.$x->id->videoId);
                    $arr_=json_decode($stats_);
                    foreach($arr_->items as $item){
                            $detailsObj->viewCount = $item->statistics->viewCount;
                            $detailsObj->likeCount = $item->statistics->likeCount;
                            $detailsObj->dislikeCount = $item->statistics->dislikeCount;
                            $detailsObj->commentCount = $item->statistics->commentCount;
                    }
                    array_push($ids,$detailsObj);
                }
            }
            return $ids;
        }
    }
?>
