# iron
###### tags: `php` `Laravel`
> 多人協作專案描述 使用`Laravel`框架開發

## Quick start

```bash=
$ composer install
```
> 安裝`php`套件


```bash=
$ php artisan key:gen
```
> 產生唯一的key 用於加密
```bash=
$ php artisna Storage:link
```
>開放Storage資料夾權限
```bash=
$ npm install
```
>安裝`NPM`套件
```bash=
$ php artisan server
```
>開啟伺服器

## 資料表設計

### User 
> 後台登入使用者


| Type   | Name              | Remark           |
| ------ | ----------------- | ---------------- |
| int    | id                | 使用者ID`唯一碼` |
| string | name              | 使用者名稱       |
| string | email             | 電子郵件`唯一碼` |
| date   | email_verified_at | 電子信箱驗證     |
| string | password          | 密碼             |
| string | rememberToken     | session登入用    |
| date   | created_at        | 建立時間         |
| date   | updated_at        | 更新時間         |

### ironman_news
> 鋼鐵人 最新消息  
> 可不輸入英文有關欄位 前台會直接不顯示

| Type     | Name       | Remark                      |
| -------- | ---------- | --------------------------- |
| int      | id         | ID`唯一碼`                  |
| int      | type_id    | 消息類別    `與類別表關聯`  |
| int      | author_id  | 作者類別 `與作者表關聯`     |
| string   | title      | 中文標題                    |
| string   | en_title   | 英文標題        `可不輸入`  |
| string   | preview    | 中文內文預覽                |
| string   | en_preview | 英文內文預覽     `可不輸入` |
| longtext | content    | 中文內文                    |
| longtext | en_content | 英文內文      `可不輸入`    |
| longtext | keyword    | 中文關鍵字                  |
| longtext | en_keyword | 英文關鍵字    `可不輸入`    |
| longtext | img        | 圖片                        |
| date     | date       | 時間                        |
| date     | created_at | 建立時間                    |
| date     | updated_at | 更新時間                    |

### tool_news
> 精品工具機 最新消息  
> 可不輸入英文有關欄位 前台會直接不顯示

| Type     | Name       | Remark                        |
| -------- | ---------- | ----------------------------- |
| int      | id         | ID`唯一碼`                    |
| int      | type_id    | 消息類別       `與類別表關聯` |
| int      | author_id  | 作者類別 `與作者表關聯`       |
| string   | title      | 中文標題                      |
| string   | en_title   | 英文標題        `可不輸入`    |
| string   | preview    | 中文內文預覽                  |
| string   | en_preview | 英文內文預覽     `可不輸入`   |
| longtext | content    | 中文內文                      |
| longtext | en_content | 英文內文      `可不輸入`      |
| longtext | keyword    | 中文關鍵字                    |
| longtext | en_keyword | 英文關鍵字    `可不輸入`      |
| longtext | img        | 圖片                          |
| date     | date       | 時間                          |
| date     | created_at | 建立時間                      |
| date     | updated_at | 更新時間                      |


### ironman_news_types
>鋼鐵人 消息類別

| Type   | Name       | Remark     |
| ------ | ---------- | ---------- |
| int    | id         | ID`唯一碼` |
| string | name       | 中文名稱   |
| string | en_name    | 英文名稱   |
| date   | created_at | 建立時間   |
| date   | updated_at | 更新時間   |

### tool_news_types
>精品工具機 消息類別

| Type   | Name       | Remark     |
| ------ | ---------- | ---------- |
| int    | id         | ID`唯一碼` |
| string | name       | 中文名稱   |
| string | en_name    | 英文名稱   |
| date   | created_at | 建立時間   |
| date   | updated_at | 更新時間   |


### news_authors
>作者表

| Type     | Name              | Remark       |
| -------- | ----------------- | ------------ |
| int      | id                | ID`唯一碼`   |
| string   | name              | 中文名稱     |
| string   | en_name           | 英文名稱     |
| longtext | company           | 中文公司名稱 |
| longtext | en_company        | 英文公司名稱 |
| longtext | companySummary    | 中文公司簡介 |
| longtext | en_companySummary | 英文公司簡介 |
| longtext | companyWebsite    | 公司網站     |
| date     | created_at        | 建立時間     |
| date     | updated_at        | 更新時間     |

## 此專案的困難點
#### 感謝職訓單位當初邀請我參與這次多人協作的經驗，從當初的規劃資料表與前端討論功能設計，到專案完成的QA校正，是我在踏入職場前的一次寶貴經驗。
- 雙語功能
> 新增貼文符合雙語功能
- 產品目錄上傳下載
> 結案前緊急插件的功能
- SummerNote
> 新增刪除圖片 預設字體 可調整字體大小
- 搜尋貼文
- 關鍵字
> 用分號隔開 可一次設定多個關鍵字
- 連結社群媒體