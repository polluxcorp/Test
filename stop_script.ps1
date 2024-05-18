$timestamp = Get-Date -Format "yyyyMMdd_HHmmss"
$logFolder = "I:\Pgrm\quotations\logs"
$logFile = Join-Path $logFolder "stop_log_$timestamp.txt"

"[$(Get-Date -Format "yyyy/MM/dd HH:mm:ss")] Stopping script..." | Out-File $logFile

"[$(Get-Date -Format "yyyy/MM/dd HH:mm:ss")] Stopping artisan server..." | Out-File $logFile -Append
Get-Process -IncludeUserName | Where-Object { $_.CommandLine -like '*artisan serve*' -and $_.ProcessName -eq 'php' } | ForEach-Object { Stop-Process -Id $_.Id -Force }

"[$(Get-Date -Format "yyyy/MM/dd HH:mm:ss")] Stopping npm script..." | Out-File $logFile -Append
Get-Process -IncludeUserName | Where-Object { $_.CommandLine -like '*npm run dev*' -and $_.ProcessName -eq 'node' } | ForEach-Object { Stop-Process -Id $_.Id -Force }

"[$(Get-Date -Format "yyyy/MM/dd HH:mm:ss")] Script stopped." | Out-File $logFile -Append
