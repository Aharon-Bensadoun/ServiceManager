param
(
    $username = "aharonbe"
)

$UserInfos = Get-ADUser -Identity $username -Properties * | select Name,Mail,Description,st,MobilePhone,Department

foreach ($info in $UserInfos){
    Write-Host "Name: $($info.Name)"
    Write-Host "Mail: $($info.Mail)"
    Write-Host "ID: $($info.Description)"
    Write-Host "Employee Number: $($info.st)"
    Write-Host "MobilePhone: $($info.MobilePhone)"
    Write-Host "Department: $($info.Department)"
}