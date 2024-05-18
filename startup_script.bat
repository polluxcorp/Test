@echo off

SET LOGFOLDER=I:\Pgrm\quotations\logs
SET TIMESTAMP=%DATE:~10,4%%DATE:~4,2%%DATE:~7,2%_%TIME:~0,2%%TIME:~3,2%%TIME:~6,2%
SET LOGFILE=%LOGFOLDER%\startup_log_%TIMESTAMP%.txt
SET ARTISAN_LOGFILE=%LOGFOLDER%\artisan_serve_log_%TIMESTAMP%.txt
SET NPM_LOGFILE=%LOGFOLDER%\npm_run_dev_log_%TIMESTAMP%.txt

echo [%DATE% %TIME%] Starting script... > %LOGFILE%

cd /d I:\Pgrm\quotations

echo [%DATE% %TIME%] Updating repository... >> %LOGFILE%
git pull origin master >> %LOGFILE% 2>&1

echo [%DATE% %TIME%] Starting artisan server... >> %LOGFILE%
start /min /B cmd /c "php artisan serve >> %ARTISAN_LOGFILE% 2>&1"
timeout /t 5 /nobreak
for /f "tokens=2" %%a in ('tasklist /v /fi "imagename eq php.exe" ^| findstr /i "artisan serve"') do (
    set ARTISAN_PID=%%a
)
echo %ARTISAN_PID% > artisan_serve.pid

echo [%DATE% %TIME%] Running npm script... >> %LOGFILE%
start /min /B /WAIT cmd /c "npm run dev >> %NPM_LOGFILE% 2>&1"
timeout /t 5 /nobreak
for /f "tokens=2" %%a in ('tasklist /v /fi "imagename eq node.exe" ^| findstr /i "npm run dev"') do (
    set NPM_PID=%%a
)
echo %NPM_PID% > npm_run_dev.pid

echo [%DATE% %TIME%] Script completed. >> %LOGFILE%
exit
