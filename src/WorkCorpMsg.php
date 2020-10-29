<?php

namespace ZengJJ\UcClient;

class WorkCorpMsg
{
    const APP_INTERNAL_NO = 0;
    const APP_INTERNAL_YES = 1;
    const APP_INTERNAL_NAMES = [
        self::APP_INTERNAL_YES => '同应用',
        self::APP_INTERNAL_NO => '跨应用',
    ];

    const MSG_OBJECT_TEXT = '\EasyWeChat\Kernel\Messages\Text';
    const MSG_OBJECT_TEXT_PROPERTIES = '内容';

    const MSG_OBJECT_TEXT_CARD = '\EasyWeChat\Kernel\Messages\TextCard';
    const MSG_OBJECT_TEXT_CARD_PROPERTIES = [
        'title' => '标题',
        'description' => '描述',
        'url' => '链接'
    ];
}