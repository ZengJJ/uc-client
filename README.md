# uc-client

# SDK使用

## 获取应用 TOKEN

### SDK调用

#### 请求参数

| 参数|类型|必填|描述 |
| ------------ | ------------ | ------------ | ------------ |
| base_url|string|是|用户中心api地址 |
| app_key|string|是|应用KEY |
| app_secret|string|是|应用SECRET |

#### 调用示例

```php

$uc_api = new ApiIndex(['base_url' => C('uc_api_url'), 'app_key' => C('uc_app_key')]);
$result['app_token'] = $uc_api->getAppToken(C('uc_app_secret'));

```

## 获取用户 TOKEN

### SDK调用

#### 请求参数

| 参数|类型|必填|描述 |
| ------------ | ------------ | ------------ | ------------ |
| base_url|string|是|用户中心api地址 |
| app_key|string|是|应用KEY |
| phone|string|是|用户电话 |
| password|string|是|用户密码 |

#### 调用示例

```php

$uc_api = new ApiIndex(['base_url' => C('uc_api_url'), 'app_key' => C('uc_app_key')]);
$result['user_token'] = $uc_api->getUserToken($phone, $password);

```

## 应用生成 （项目初始化时使用）

### SDK调用

#### 请求参数

| 参数|类型|必填|描述 |
| ------------ | ------------ | ------------ | ------------ |
| base_url|string|是|用户中心api地址 |
| app_key|string|是|应用KEY |
| phone|string|是|用户电话 |
| password|string|是|用户密码 |
| name|string|是|应用名 |
| hosts|string|是|当前域名（即申请应用网站地址) |
| type|string|是|应用类型 |
| desc|string|是|应用描述 |

#### 调用示例

```php

$uc_api = new ApiIndex(['base_url' => C('uc_api_url'), 'app_key' => C('uc_app_key')]);
$appInfo = $uc_api->appGenerate($phone, $password, $name, (new UcWeb())->currentHost(), AppParams::TYPE_KDDS, $desc);

```

## 检测APP_TOKEN是否有效

### SDK调用

#### 请求参数

| 参数|类型|必填|描述 |
| ------------ | ------------ | ------------ | ------------ |
| base_url|string|是|用户中心api地址 |
| app_token|string|是|应用token |

### 调用示例

```php
 $app_key = (new ApiApp(['base_url' => C('uc_api_url')]))->checkToken(I('app_token'));
 if (strcmp($app_key, C('uc_app_key')) !== 0) {
      return ajaxFail($app_key);
 }
```

## 获取已授权企业列表

### SDK调用

#### 请求参数

| 参数|类型|必填|描述 |
| ------------ | ------------ | ------------ | ------------ |
| base_url|string|是|用户中心api地址 |
| app_token|string|是|应用token |

### 调用示例

```php
$api_app = new ApiApp(['base_url' => C('uc_api_url')]);
$work_corp_list = $api_app->workCorpList(I('app_token'));
```

## 删除极光别名

### SDK调用

#### 请求参数

| 参数|类型|必填|描述 |
| ------------ | ------------ | ------------ | ------------ |
| base_url|string|是|用户中心api地址 |
| app_token|string|是|app token |
| alias|string|是|别名 |

### 调用示例

```php
$api_app = new ApiApp(['base_url' => C('uc_api_url')]);
$result = $api_app->jgDelAlias($app_token, $alias);
```

## 极光推送

### SDK调用

#### 请求参数

| 参数|类型|必填|描述 |
| ------------ | ------------ | ------------ | ------------ |
| base_url|string|是|用户中心api地址 |
| app_token|string|是|app token |
| content|string|是|内容 |
| alias|string|否|别名 |
| jg_key|string|否|极光key |
| jg_secret|string|否|极光secret |
| registration_id|string|否|极光分配的ID |

### 调用示例

```php
$api_app = new ApiApp(['base_url' => C('uc_api_url')]);
$result = $api_app->jgPush($app_token, $content, $alias, $jg_key, $jg_secret =, $registration_id);
```

## 站内通知消息推送

### SDK调用

#### 请求参数

| 参数|类型|必填|描述 |
| ------------ | ------------ | ------------ | ------------ |
| base_url|string|是|用户中心api地址 |
| app_token|string|是|app token |
| data|string|是|消息通用结构 |

### 调用示例

```php
$api_app = new ApiApp(['base_url' => C('uc_api_url')]);
$result = $api_app->sendNoticeMsg($app_token, $phone, NoticeMsg::MSG_UNIVERSAL_STRUCTURE);

```

## 推送企业微信消息

### SDK调用

#### 请求参数

| 参数|类型|必填|描述 |
| ------------ | ------------ | ------------ | ------------ |
| base_url|string|是|用户中心api地址 |
| app_token|string|是|app token |
| phone|string|是|用户电话 |

### 调用示例

```php
$api_app = new ApiApp(['base_url' => C('uc_api_url')]);
$result = $api_app->sendWorkCorpMsg($app_token, $phone, $object = NoticeMsg::MSG_WORK_CORP_OBJECT_TEXT, $properties = NoticeMsg::MSG_WORK_CORP_PROPERTIES_TEXT, $work_corp_id = 0, $internal = NoticeMsg::APP_INTERNAL_YES);

```

# Index

## 获取应用 TOKEN

### API调用

#### 请求URL

- http://api.yefengwo.com/index/get-app-token

#### 请求方式

- POST

#### 请求参数

| 参数|类型|必填|描述 |
| ------------ | ------------ | ------------ | ------------ |
| app_key|string|是|应用KEY |
| app_secret|string|是|应用SECRET |

## 获取用户 TOKEN

### API调用

#### 请求URL

- http://api.yefengwo.com/index/get-user-token

#### 请求方式

- POST

#### 请求参数

| 参数|类型|必填|描述 |
| ------------ | ------------ | ------------ |------------ |
| app_key|string|是|应用KEY |
| phone|string|是|手机号 |
| password|string|是|密码 |

# App

## 检测Token

#### http://api.yefengwo.com/app/check-token

| 参数|类型|必填|描述 | | ------------ | ------------ | ------------ | | app_token|string|是|应用TOKEN |

## 获取已授权企业列表

#### http://api.yefengwo.com/app/work-corp-list

| 参数|类型|必填|描述 | | ------------ | ------------ | ------------ | | app_token|string|是|应用TOKEN |

## 极光推送 (仅仅推送语音播报)

#### http://api.yefengwo.com/app/jg-push

| 参数|类型|必填|描述 | | ------------ | ------------ | ------------ | | app_token|string|是|应用TOKEN | | content|string|是|内容 | |
registration_id|string|与alias二选一|设备ID | | alias|string|与registration_id二选一|别名（一般为手机号） |

## 站内消息推送 (含语音播报)

#### http://api.yefengwo.com/app/send-notice-msg

| 参数|类型|必填|描述 | | ------------ | ------------ | ------------ | | app_token|string|是|应用TOKEN | | phone|string|是|手机号 | |
data|array|是|数据 |

#### data内容

		[
			'content' => '子应用消息展示内容',
			'voice' => '推送的语音播报内容', // 非必要
			'url' => '消息点击跳转链接', // 非必要
			'send_key' => '推送组件的key', // 非必要
			'send_secret' => '推送组件的secret', // 非必要
		]

## 推送企业微信消息

#### http://api.yefengwo.com/app/send-work-corp-msg

| 参数|类型|必填|描述 | | ------------ | ------------ | ------------ | | app_token|string|是|应用TOKEN | | internal|int|是|同应用 1或0
默认1 | | phone|string|是|手机号 | | data[object]|string|是|消息对象 | | data[properties]|string|是|消息主体 |

##### object 和 properties

	- \EasyWeChat\Kernel\Messages\Text
		'内容'
	- \EasyWeChat\Kernel\Messages\TextCard
		[
			'title' => '标题',
			'description' => '描述',
			'url' => '链接'
		]

## 注册 | 反向用户同步（用户数据在应用内有，中心没有）

#### http://api.yefengwo.com/app/reverse-sync-user

| 参数|类型|必填|描述 | | ------------ | ------------ | ------------ | | app_token|string|是|应用TOKEN | | phone|int|是|手机号 | |
password|string|是|密码 | | more|array|否|更多数据 |

# User

## 获取用户数据

#### http://api.yefengwo.com/user/info

| 参数|类型|必填|描述 | | ------------ | ------------ | ------------ | | app_key|string|是|应用KEY | | token|int|是|用户TOKEN |

## 刷新TOKEN

#### http://api.yefengwo.com/user/token-refresh

| 参数|类型|必填|描述 | | ------------ | ------------ | ------------ | | app_key|string|是|应用KEY | | token|int|是|用户TOKEN | |
work_corp_id|int|否|需使用的企业微信的ID |

## 获取已使用企业列表

#### http://api.yefengwo.com/user/work-corp-list

| 参数|类型|必填|描述 | | ------------ | ------------ | ------------ | | token|string|是|用户TOKEN |

## 校验用户密码

#### http://api.yefengwo.com/user/check-app-pwd

| 参数|类型|必填|描述 | | ------------ | ------------ | ------------ | | app_key|string|是|应用KEY | | token|int|是|用户TOKEN | |
pwd|int|是|密码 |

## 同步用户密码

#### http://api.yefengwo.com/user/sync-app-pwd

| 参数|类型|必填|描述 | | ------------ | ------------ | ------------ | | app_key|string|是|应用KEY | | token|int|是|用户TOKEN | |
pwd|int|是|密码 |

## 获取站内通知消息列表

#### http://api.yefengwo.com/user/get-notice-msg-list

| 参数|类型|必填|描述 | | ------------ | ------------ | ------------ | | app_key|string|是|应用KEY | | token|int|是|用户TOKEN | |
page|int|否|页 | | num|int|否|数量 |

## 获取并修改站内通知消息的读取状态

#### http://api.yefengwo.com/user/read-notice-msg

| 参数|类型|必填|描述 | | ------------ | ------------ | ------------ | | app_key|string|是|应用KEY | | token|int|是|用户TOKEN | |
id|int|是|消息ID |




























