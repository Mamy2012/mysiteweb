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
  $insertSQL = sprintf("INSERT INTO produit (ID_Produit, ID_Rayon, Nom_Produit, Prix_Unitaire, Stock_Disponible) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID_Produit'], "text"),
                       GetSQLValueString($_POST['ID_Rayon'], "text"),
                       GetSQLValueString($_POST['Nom_Produit'], "text"),
                       GetSQLValueString($_POST['Prix_Unitaire'], "int"),
                       GetSQLValueString($_POST['Stock_Disponible'], "int"));

  mysql_select_db($database_Ideal_Market, $Ideal_Market);
  $Result1 = mysql_query($insertSQL, $Ideal_Market) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO produit (ID_Produit, ID_Rayon, Nom_Produit, Prix_Unitaire, Stock_Disponible) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID_Produit'], "text"),
                       GetSQLValueString($_POST['ID_Rayon'], "text"),
                       GetSQLValueString($_POST['Nom_Produit'], "text"),
                       GetSQLValueString($_POST['Prix_Unitaire'], "int"),
                       GetSQLValueString($_POST['Stock_Disponible'], "int"));

  mysql_select_db($database_Ideal_Market, $Ideal_Market);
  $Result1 = mysql_query($insertSQL, $Ideal_Market) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO produit (ID_Produit, ID_Rayon, Nom_Produit, Prix_Unitaire, Stock_Disponible) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID_Produit'], "text"),
                       GetSQLValueString($_POST['ID_Rayon'], "text"),
                       GetSQLValueString($_POST['Nom_Produit'], "text"),
                       GetSQLValueString($_POST['Prix_Unitaire'], "int"),
                       GetSQLValueString($_POST['Stock_Disponible'], "int"));

  mysql_select_db($database_Ideal_Market, $Ideal_Market);
  $Result1 = mysql_query($insertSQL, $Ideal_Market) or die(mysql_error());
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE produit SET ID_Rayon=%s, Nom_Produit=%s, Prix_Unitaire=%s, Stock_Disponible=%s WHERE ID_Produit=%s",
                       GetSQLValueString($_POST['ID_Rayon'], "text"),
                       GetSQLValueString($_POST['Nom_Produit'], "text"),
                       GetSQLValueString($_POST['Prix_Unitaire'], "int"),
                       GetSQLValueString($_POST['Stock_Disponible'], "int"),
                       GetSQLValueString($_POST['ID_Produit'], "text"));

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
$query_Recordset1 = "SELECT * FROM produit";
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

mysql_select_db($database_Ideal_Market, $Ideal_Market);
$query_Recordset2 = "SELECT * FROM produit";
$Recordset2 = mysql_query($query_Recordset2, $Ideal_Market) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

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
	background-image: url(WhatsApp%20Image%202024-01-18%20%C3%A0%2013.28.37_1aaceb1c.jpg);
}
.Style1 {
	font-size: 36px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.Style3 {color: #F5FEFD}
-->
</style></head>

<body>
<form action="" method="post" name="form1" class="Style3" id="form1">
  <div align="left" class="Style1">
    <div align="center">
      <blockquote>
        <p>GESTION DES PRODUITS </p>
		 <p><a href  = "IDEAL_MARKET.PHP" class="Style13">PAGE D'ACCUEIL</a>&nbsp;</p>
 </blockquote>
    </div>
  </div>
</form>
<p>&nbsp;</p>



    
    <form method="post" name="form2" action="<?php echo $editFormAction; ?>">
      <table align="center">
        <tr valign="baseline">
          <td nowrap align="right">ID_Produit:</td>
          <td><?php echo $row_Recordset1['ID_Produit']; ?></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">ID_Rayon:</td>
          <td><input type="text" name="ID_Rayon" value="<?php echo $row_Recordset1['ID_Rayon']; ?>" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Nom_Produit:</td>
          <td><input type="text" name="Nom_Produit" value="<?php echo $row_Recordset1['Nom_Produit']; ?>" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Prix_Unitaire:</td>
          <td><input type="text" name="Prix_Unitaire" value="<?php echo $row_Recordset1['Prix_Unitaire']; ?>" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Stock_Disponible:</td>
          <td><input type="text" name="Stock_Disponible" value="<?php echo $row_Recordset1['Stock_Disponible']; ?>" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">&nbsp;</td>
          <td><input type="submit" value="VENDU"></td>
        </tr>
      </table>
      <p>
      <table border="0" width="50%" align="center">
        <tr>
          <td width="23%" align="center"><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><img src="First.gif" border=0></a>
                <?php } // Show if not first page ?>
          </td>
          <td width="31%" align="center"><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><img src="Previous.gif" border=0></a>
                <?php } // Show if not first page ?>
          </td>
          <td width="23%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"><img src="Next.gif" border=0></a>
                <?php } // Show if not last page ?>
          </td>
          <td width="23%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><img src="Last.gif" border=0></a>
                <?php } // Show if not last page ?>
          </td>
        </tr>
      </table>
      </p>
<p>
<input type="hidden" name="MM_update" value="form2">
        <input type="hidden" name="ID_Produit" value="<?php echo $row_Recordset1['ID_Produit']; ?>">
        </p>
    </form>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
