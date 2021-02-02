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
- 連結社群媒體