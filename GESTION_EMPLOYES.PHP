<?php require_once('Connections/Ideal_Market.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO employés (ID_Employé, Nom_Employé, PRENOM_EMPLOYE, Poste, Salaire) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID_Employ'], "text"),
                       GetSQLValueString($_POST['Nom_Employ'], "text"),
                       GetSQLValueString($_POST['PRENOM_EMPLOYE'], "text"),
                       GetSQLValueString($_POST['Poste'], "text"),
                       GetSQLValueString($_POST['Salaire'], "int"));

  mysql_select_db($database_Ideal_Market, $Ideal_Market);
  $Result1 = mysql_query($insertSQL, $Ideal_Market) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO employés (ID_Employé, Nom_Employé, PRENOM_EMPLOYE, Poste, Salaire) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID_Employ'], "text"),
                       GetSQLValueString($_POST['Nom_Employ'], "text"),
                       GetSQLValueString($_POST['PRENOM_EMPLOYE'], "text"),
                       GetSQLValueString($_POST['Poste'], "text"),
                       GetSQLValueString($_POST['Salaire'], "int"));

  mysql_select_db($database_Ideal_Market, $Ideal_Market);
  $Result1 = mysql_query($insertSQL, $Ideal_Market) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO employés (ID_Employé, Nom_Employé, PRENOM_EMPLOYE, Poste, Salaire) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID_Employ'], "text"),
                       GetSQLValueString($_POST['Nom_Employ'], "text"),
                       GetSQLValueString($_POST['PRENOM_EMPLOYE'], "text"),
                       GetSQLValueString($_POST['Poste'], "text"),
                       GetSQLValueString($_POST['Salaire'], "int"));

  mysql_select_db($database_Ideal_Market, $Ideal_Market);
  $Result1 = mysql_query($insertSQL, $Ideal_Market) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO employés (ID_Employé, Nom_Employé, PRENOM_EMPLOYE, Poste, Salaire) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID_Employ'], "text"),
                       GetSQLValueString($_POST['Nom_Employ'], "text"),
                       GetSQLValueString($_POST['PRENOM_EMPLOYE'], "text"),
                       GetSQLValueString($_POST['Poste'], "text"),
                       GetSQLValueString($_POST['Salaire'], "int"));

  mysql_select_db($database_Ideal_Market, $Ideal_Market);
  $Result1 = mysql_query($insertSQL, $Ideal_Market) or die(mysql_error());
}

$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ideal_Market, $Ideal_Market);
$query_Recordset1 = "SELECT * FROM employés";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $Ideal_Market) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
<style type="text/css">
<!--
body {
	background-image: url(WhatsApp%20Image%202024-01-18%20%C3%A0%2013.39.33_6b42ea66.jpg);
}
.Style1 {
	font-size: 36px;
	color: #DFBF44;
	background-color: #C62F24;
}
.Style2 {color: #B23B10}
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div align="center" class="Style1"> 
    <div align="center">GESTION DES EMPLOYES </P>
	 <p><a href  = "IDEAL_MARKET.PHP" class="Style13">PAGE D'ACCUEIL</a>&nbsp;</p>
  </div>
  </div>
</form>
<p>&nbsp;</p>


<form method="post" name="form3" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">ID_Employé:</td>
      <td><input type="text" name="ID_Employ" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nom_Employé:</td>
      <td><input type="text" name="Nom_Employ" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">PRENOM_EMPLOYE:</td>
      <td><input type="text" name="PRENOM_EMPLOYE" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Poste:</td>
      <td><input type="text" name="Poste" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Salaire:</td>
      <td><input type="text" name="Salaire" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><p>
        <input type="submit" value="Recruter">
      </p>
        
        </p></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form3">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class="Style2">&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
