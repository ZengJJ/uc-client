<?php

namespace ZengJJ\UcClient;

class NoticeMsg
{
    const APP_INTERNAL_NO = 0;
    const APP_INTERNAL_YES = 1;
    const APP_INTERNAL_NAMES = [
        self::APP_INTERNAL_YES => '同应用',
        self::APP_INTERNAL_NO => '跨应用',
    ];

    const MSG_WORK_CORP_OBJECT_TEXT = '\EasyWeChat\Kernel\Messages\Text';
    const MSG_WORK_CORP_PROPERTIES_TEXT = '内容';

    const MSG_WORK_CORP_OBJECT_TEXT_CARD = '\EasyWeChat\Kernel\Messages\TextCard';
    const MSG_WORK_CORP_PROPERTIES_TEXT_CARD = [
        'title' => '标题',
        'description' => '描述',
        'url' => '链接'
    ];

    const MSG_UNIVERSAL_STRUCTURE = [
        'content' => '子应用消息展示内容',
        'voice' => '推送的语音播报内容',
        'url' => '消息点击跳转链接', // 非必要
        'send_key' => '推送组件的key', // 非必要
        'send_secret' => '推送组件的secret', // 非必要
    ];

    const SMS_THIRD_ALI = 1;
    const SMS_THIRD_SUB_MAIL = 2;
    const SMS_THIRD_FUN_NAMES = [
        self::SMS_THIRD_ALI => 'easySmsAli', // 阿里云
        self::SMS_THIRD_SUB_MAIL => 'easySmsSubmail', // 塞邮
    ];
}