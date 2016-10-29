<?php

$data[]= 'Minchia1234';
$data[]= $_GET['timestamp'];
$data[]= $_GET['nonce'];

asort($data);

$strData= '';
$d= '';
$authString='';

foreach($data as $d){
    $authString .=$d;
}

if(sha1($authString)== $_GET['signature']){
    if(!empty ($_GET['echostr'])){
        echo $_GET['echostr'];
        die();
    }else{
        $return = '<xml>
        <toUserName> <![CDATA['.$toUser.']]></toUserName>
        <fromUserName> <![CDATA['.$fromUser.']]></fromUserName>
        <CreateTime>'.time().'</CreateTime>
        <MsgType> <![CDATA[text]]></MsgType>
        <Content> <![CDATA['.$text.']]></Content>
        <FuncFlag>0</FuncFlag>
        </xml>';
        echo $return;

    }
}else{
    die('You are not suppose to be here!');
}

 ?>