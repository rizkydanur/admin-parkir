@echo off
color 02
echo ==============================================================
echo Created by Dedy Rizaldi, 19 May 2024
echo Credit: This script is based on the work of [@drizaldi_].
echo Smart Parking System
echo ==============================================================

rem Ambil IP Address lokal
for /f "tokens=2 delims=:" %%a in ('ipconfig ^| findstr /c:"IPv4 Address"') do set ip=%%a
set ip=%ip:~1%

rem Jalankan php artisan serve dengan IP Address lokal
php artisan serve --host=%ip%
