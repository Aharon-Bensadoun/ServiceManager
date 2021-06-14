$Server = "AppServer"
$Service = "SpinCal - spincal Production for Hadassah - 5040"

if (Get-Service -ComputerName $Server -Name $Service | Restart-Service -Force)
    {
        Write-Host "Service $($Service) in server $($Server) restarted successfully"
    }
else
    {
        Write-Host "$($Error[0].exception.Message)"
    }