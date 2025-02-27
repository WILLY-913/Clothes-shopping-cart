# -買衣服的購物車
一個功能完整的電子商務平台，使用 Laravel 構建，具備使用者認證、產品管理、購物車、訂單處理和管理員功能。

## 功能

### 一般使用者
* **會員註冊與登入**：安全的註冊和登入系統，基於 Session 認證。
* **產品市場**：按類別瀏覽產品、查看詳情並評價商品。
* **購物車**：添加產品、調整數量並將購物車轉為訂單。
* **訂單追蹤**：查看訂單歷史與詳情。

### 管理員
* **會員管理**：查看並刪除使用者帳戶。
* **訂單管理**：監控和管理所有訂單，並提供詳細視圖。
* **Excel 匯出/匯入**：將訂單匯出為 Excel 檔案，並從 Excel 匯入會員資料。

## 技術
* **後端**：Laravel 10.x, PHP 8.0+
* **前端**：Bootstrap 4.6, jQuery, Blade 模板
* **資料庫**：MySQL 8.0
* **依賴管理**：Composer, PhpOffice/PhpSpreadsheet（用於 Excel 功能）
* **伺服器**：XAMPP (Apache + MySQL)

### 前置條件
* 已安裝XAMPP(Apache + MySQL)
* PHP 8.0(含 Composer）
  
### 安裝步驟
1. **安裝Laravel**
   
   $   cd  c:\xampp  
   $   composer  global  require  "laravel/installer"

2. 建立專案
   
   $  cd  c:\xampp\htdocs
   
   $  laravel  new  Laravel2022         (Laravel2022  是專案名稱)
   
   $   cd  c:\xampp\htdocs\Laravel2022
   
       ** 啟動 Apache**

4. 運行應用程式
   
   $ php artisan serve

   在 http://127.0.0.1:8000 訪問應用程式。

### 使用說明
* 首頁：http://127.0.0.1:8000/Home/Index
* 登入：使用 http://127.0.0.1:8000/Home/Login（可測試預設的管理員/會員角色）。
* 管理面板：使用管理員帳戶登入後可訪問。
* 資料庫管理：使用 http://127.0.0.1:8080/phpmyadmin。
