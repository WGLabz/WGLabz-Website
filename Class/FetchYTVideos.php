<?php
    class FetchYoutubeVideos{
        function fetchLatest(){
            $API_KEY = "AIzaSyDQfP10VXe8N42OCvgl2Ngy_RmFJtnjCME";
            $response = file_get_contents('https://www.googleapis.com/youtube/v3/search?key='.$API_KEY.'&channelId=UCo3jik11kHu65uQBGueaw4g&part=id,snippet&order=date&maxResults=8');
            $arr=json_decode($response);
            $ids=array();
            foreach($arr->items as $x){
                if(($x->id->videoId != "") && ($x->snippet->title!="") ){
                    array_push($ids,$x->id->videoId);
                    array_push($ids,$x->snippet->title);
                    array_push($ids,$x->snippet->publishedAt);
                    array_push($ids,$x->snippet->description);
                    $stats_= file_get_contents('https://www.googleapis.com/youtube/v3/videos?key='.$API_KEY.'&part=statistics&id='.$x->id->videoId);
                    $arr_=json_decode($stats_);
                    foreach($arr_->items as $item){
                        array_push($ids,$item->statistics->viewCount);
                        array_push($ids,$item->statistics->likeCount);
                        array_push($ids,$item->statistics->dislikeCount);
                        array_push($ids,$item->statistics->commentCount);
                    }

                }
            }
            return $ids;
        }
    }
?>