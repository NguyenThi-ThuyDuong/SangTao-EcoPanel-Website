@echo off
chcp 65001 >nul
title Sáng Tạo EcoPanel - Server Development
echo ========================================================
echo       KHỞI CHẠY HỆ THỐNG SÁNG TẠO ECOPANEL
echo ========================================================
echo.
echo Website: http://localhost:8000/
echo Admin:   http://localhost:8000/sota/
echo Tài khoản Admin: admin / admin
echo.
echo Đang mở trình duyệt và chạy server...
start http://localhost:8000/
php -S localhost:8000 router.php
pause
