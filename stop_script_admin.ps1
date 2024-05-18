$timestamp = Get-Date -Format "yyyyMMdd_HHmmss"
$logFolder = "I:\Pgrm\quotations\logs"
$logFile = Join-Path $logFolder "stop_log_$timestamp.txt"

"[$(Get-Date -Format "yyyy/MM/dd HH:mm:ss")] Stopping script..." | Out-File $logFile

"[$(Get-Date -Format "yyyy/MM/dd HH:mm:ss")] Stopping artisan server..." | Out-File $logFile -Append
$artisanServePID = Get-Content "I:\Pgrm\quotations\artisan_serve.pid"
Stop-Process -Id $artisanServePID -Force

"[$(Get-Date -Format "yyyy/MM/dd HH:mm:ss")] Stopping npm script..." | Out-File $logFile -Append
$npmRunDevPID = Get-Content "I:\Pgrm\quotations\npm_run_dev.pid"
Stop-Process -Id $npmRunDevPID -Force

"[$(Get-Date -Format "yyyy/MM/dd HH:mm:ss")] Script stopped." | Out-File $logFile -Append
