<?php

namespace ZengJJ\UcClient;

class WorkCorpMsg
{
    const MSG_OBJECT_TEXT = '\EasyWeChat\Kernel\Messages\Text';
    const MSG_OBJECT_TEXT_PROPERTIES = [
        'content' => '内容'
    ];

    const MSG_OBJECT_TEXT_CARD = '\EasyWeChat\Kernel\Messages\TextCard';
    const MSG_OBJECT_TEXT_CARD_PROPERTIES = [
        'title' => '标题',
        'description' => '描述',
        'url' => '链接'
    ];
}