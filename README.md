# laravel7xshop
### 1 - tạo CSDL mới và import SQL từ file laravel7xcrud.sql vào trong CSDL mới của bạn
### 2 - thay đổi các thông số kết nối đến CSDL trong file .env
update config cache = câu lệnh bên dưới như hình ảnh sau   
` php artisan config:cache `
![Screenshot](doc/config-cache.png)
### 3 - xóa folder ( symlink ) có tên storage trong folder public
![Screenshot](delete-symlink.png)
### 4 - chạy command bên dưới để tạo lại storage link 
` php artisan storage:link `
![Screenshot](doc/command-symlink.jpg)
### 5 - chạy command để tạo ra 1 admin mới với password do bạn tự chọn
` php artisan make:admin-account {name} {email} {password} `
![Screenshot](doc/make-admin.jpg)
### 6 - run : php artisan serve --port=8001 
### 7 - URL admin : http://127.0.0.1:8001/backend/admin-login


