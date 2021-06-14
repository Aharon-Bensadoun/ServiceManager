
$Server = "Sukeret"


if(Restart-Computer -ComputerName $Server)
    {
        Write-Host "$($Server) restarted successfully by the Service Mannager process"
    }
else
    {
        Write-Host "$($Error[0].exception.Message)"
    }