<?php

namespace ZengJJ\UcClient;

class AppParams
{
    const TYPE_KDDS = 1;
    const TYPE_QD = 2;
    const TYPE_DISCUZ = 3;
    const TYPE_ESTATE = 4;
    const TYPE_TASK = 5;
    const TYPE_NAMES = [
        self::TYPE_KDDS => '中介系统',
        self::TYPE_QD => '渠道系统',
        self::TYPE_DISCUZ => 'DISCUZ系统',
        self::TYPE_ESTATE => '开发商系统',
        self::TYPE_TASK => '任务系统',
    ];
}