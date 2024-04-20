<?php require_once('Connections/Ideal_Market.php'); ?>
<?php
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
  $insertSQL = sprintf("INSERT INTO commande (ID_Commande, ID_Client, Date_Commande, Montant_Total) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID_Commande'], "text"),
                       GetSQLValueString($_POST['ID_Client'], "text"),
                       GetSQLValueString($_POST['Date_Commande'], "date"),
                       GetSQLValueString($_POST['Montant_Total'], "int"));

  mysql_select_db($database_Ideal_Market, $Ideal_Market);
  $Result1 = mysql_query($insertSQL, $Ideal_Market) or die(mysql_error());
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ideal_Market, $Ideal_Market);
$query_Recordset1 = "SELECT * FROM commande";
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
	background-image: url(WhatsApp%20Image%202024-01-18%20%C3%A0%2013.39.33_e6dcad19.jpg);
}
.Style1 {
	color: #E2465B;
	font-size: 36px;
	font-family: "Courier New", Courier, monospace;
}
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div align="center" class="Style1">GESTION DES COMMANDES </P>
   <p><a href  = "IDEAL_MARKET.PHP" class="Style13">PAGE D'ACCUEIL</a>&nbsp;</p>
 </div>
</form>
<form method="post" name="form3" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">ID_Commande:</td>
      <td><input type="text" name="ID_Commande" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">ID_Client:</td>
      <td><input type="text" name="ID_Client" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Date_Commande:</td>
      <td><input type="text" name="Date_Commande" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Montant_Total:</td>
      <td><input type="text" name="Montant_Total" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="AJOUTER">
        <label>
        <input type="submit" name="Submit" value="supprimer" />
      </label></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form3">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
