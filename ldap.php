
<?php
session_start(); 
$username = $_POST["username"];
$password = $_POST["password"];
$host = 'gold';
$domain = 'dom.hadassah.org.il';
$basedn = 'dc=dom,dc=hadassah,dc=org,dc=il';
$group = 'Systemnt';
$LoginError = "Username or password incorrect";
$PermissionError = "You are not authorized to access this application. <br> Contact your System Administrator.";
$Login_Validation = "Username or password empty" ;

//putenv('LDAPTLS_CACERT=C:\\Apache24\\htdocs\\servicemanager\\gold.pem');

// Login Form Validation
if (empty($username) || empty($password)) { 
    $_SESSION["Login_Validation"] = $Login_Validation;
    header("location: index.php");
}

$ad = ldap_connect("ldap://{$host}.{$domain}") or die('Could not connect to LDAP server.');
ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);

if(@ldap_bind($ad, "{$username}@{$domain}", $password)){ 
    $userdn = getDN($ad, $username, $basedn);
    if (checkGroupEx($ad, $userdn, getDN($ad, $group, $basedn))) {
    //if (checkGroup($ad, $userdn, getDN($ad, $group, $basedn))) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        $_SESSION['loggedin_time'] = time();  
        header("Location: index.php");
        die();
        // echo "You're authorized as ".getCN($userdn);
    } else {
        // echo 'Authorization failed';
        $_SESSION["PermissionError"] = $PermissionError;
        header("location: login.php"); //send user back to the login page.
    }
}else{
    ($_SESSION["LoginError"] = $LoginError);
    header("location: login.php"); //send user back to the login page.;


}
ldap_unbind($ad);

/*
* This function searchs in LDAP tree ($ad -LDAP link identifier)
* entry specified by samaccountname and returns its DN or epmty
* string on failure.
*/
function getDN($ad, $samaccountname, $basedn) {
    $attributes = array('dn');
    $result = ldap_search($ad, $basedn,
        "(samaccountname={$samaccountname})", $attributes);
    if ($result === FALSE) { return ''; }
    $entries = ldap_get_entries($ad, $result);
    if ($entries['count']>0) { return $entries[0]['dn']; }
    else { return ''; };
}

/*
* This function retrieves and returns CN from given DN
*/
function getCN($dn) {
    preg_match('/[^,]*/', $dn, $matchs, PREG_OFFSET_CAPTURE, 3);
    return $matchs[0][0];
}

/*
* This function checks group membership of the username, searching only
* in specified group (not recursively).
*/
function checkGroup($ad, $userdn, $groupdn) {
    $attributes = array('members');
    $result = ldap_read($ad, $userdn, "(memberof={$groupdn})", $attributes);
    if ($result === FALSE) { return FALSE; };
    $entries = ldap_get_entries($ad, $result);
    return ($entries['count'] > 0);
}

/*
* This function checks group membership of the username, searching
* in specified group and groups which is its members (recursively).
*/
function checkGroupEx($ad, $userdn, $groupdn) {
    $attributes = array('memberof');
    $result = ldap_read($ad, $userdn, '(objectclass=*)', $attributes);
    if ($result === FALSE) { return FALSE; };
    $entries = ldap_get_entries($ad, $result);
    if ($entries['count'] <= 0) { return FALSE; };
    if (empty($entries[0]['memberof'])) { return FALSE; } else {
        for ($i = 0; $i < $entries[0]['memberof']['count']; $i++) {
            if ($entries[0]['memberof'][$i] == $groupdn) { return TRUE; }
            elseif (checkGroupEx($ad, $entries[0]['memberof'][$i], $groupdn)) { return TRUE; };
        };
    };
    return FALSE;
}

?>