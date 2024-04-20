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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form3")) {
  $updateSQL = sprintf("UPDATE client SET Nom_Client=%s, Prenom_Client=%s, Adresse_Client=%s, Numéro_Téléphone=%s WHERE ID_Client=%s",
                       GetSQLValueString($_POST['Nom_Client'], "text"),
                       GetSQLValueString($_POST['Prenom_Client'], "text"),
                       GetSQLValueString($_POST['Adresse_Client'], "text"),
                       GetSQLValueString($_POST['Numro_Tlphone'], "int"),
                       GetSQLValueString($_POST['ID_Client'], "text"));

  mysql_select_db($database_Ideal_Market, $Ideal_Market);
  $Result1 = mysql_query($updateSQL, $Ideal_Market) or die(mysql_error());
}

$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ideal_Market, $Ideal_Market);
$query_Recordset1 = "SELECT * FROM client";
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
	background-image: url(WhatsApp%20Image%202024-01-18%20%C3%A0%2013.39.32_e6363ad5.jpg);
}
.Style1 {
	font-size: 36px;
	color: #A63D20;
	font-weight: bold;
	font-family: "Courier New", Courier, monospace;
}
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div align="center" class="Style1">
  <P>GESTION DES CLIENTS </P>
   <p><a href  = "IDEAL_MARKET.PHP" class="Style13">PAGE D'ACCUEIL</a>&nbsp;</p>
    </div>
</form>
<form method="post" name="form3" action="<?php echo $editFormAction; ?>">
  <p>&nbsp;  </p>
  <p>
    <input type="hidden" name="MM_update" value="form3">
    <input type="hidden" name="ID_Client" value="<?php echo $row_Recordset1['ID_Client']; ?>">
  </p>
  <table width="371" align="center" bgcolor="#E7B62D">
    <tr valign="baseline">
      <td width="152" align="right" nowrap>ID_Client:</td>
      <td width="207"><?php echo $row_Recordset1['ID_Client']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nom_Client:</td>
      <td><input type="text" name="Nom_Client" value="<?php echo $row_Recordset1['Nom_Client']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Prenom_Client:</td>
      <td><input type="text" name="Prenom_Client" value="<?php echo $row_Recordset1['Prenom_Client']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Adresse_Client:</td>
      <td><input type="text" name="Adresse_Client" value="<?php echo $row_Recordset1['Adresse_Client']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Numéro_Téléphone:</td>
      <td><input type="text" name="Numro_Tlphone" value="<?php echo $row_Recordset1['Numéro_Téléphone']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input name="submit" type="submit" value="MODIFIER" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<form id="form4" name="form4" method="post" action="">
<p align="center">
<table border="0" width="52%" align="center">
  <tr>
    <td width="26%" height="28" align="center"><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><img src="First.gif" border=0></a>
          <?php } // Show if not first page ?>
    </td>
    <td width="33%" align="center"><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><img src="Previous.gif" border=0></a>
          <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"><img src="Next.gif" border=0></a>
          <?php } // Show if not last page ?>
    </td>
    <td width="18%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><img src="Last.gif" border=0></a>
          <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
