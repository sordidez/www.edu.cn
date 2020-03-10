<?php
function subTree(array $data,int $pid=0){
    $arr=[];
    foreach($data as $val){
        if($val['pid']==$pid){
            $val['sub']=subTree($data,$val['id']);
            $arr[]=$val;
        }
    }
    return $arr;
}