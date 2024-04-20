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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE rayon SET Nom_Rayon=%s WHERE `ID_ Rayon`=%s",
                       GetSQLValueString($_POST['Nom_Rayon'], "text"),
                       GetSQLValueString($_POST['ID__Rayon'], "text"));

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
$query_Recordset1 = "SELECT * FROM rayon";
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
$query_Recordset2 = "SELECT * FROM rayon";
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
?><style type="text/css">
<!--
body {
	background-image: url(WhatsApp%20Image%202024-01-18%20%C3%A0%2013.28.37_12ec6849);
}
.Style3 {
	font-size: 24px;
	color: #0D140C;
}
-->
</style>

<form name="form1" method="post" action="">
  <div align="center" class="Style3">GESTION DES RAYONS </p>
  <p><a href  = "IDEAL_MARKET.PHP" class="Style13">PAGE D'ACCUEIL</a>&nbsp;</p>
    </div>
</form>

    <form method="post" name="form2" action="<?php echo $editFormAction; ?>">
      <p>&nbsp;</p>
      <table align="center">
        <tr valign="baseline">
          <td nowrap align="right">ID_ Rayon:</td>
          <td><?php echo $row_Recordset1['ID_ Rayon']; ?></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Nom_Rayon:</td>
          <td><input type="text" name="Nom_Rayon" value="<?php echo $row_Recordset1['Nom_Rayon']; ?>" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">&nbsp;</td>
          <td><p>
            <input type="submit" value="AJOUTER UN NOUVEAU PRODUIT">
          </p>
            
            <table width="50%" border="0" align="center" class="Style3">
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
            </p></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="form2">
      <input type="hidden" name="ID_ Rayon" value="<?php echo $row_Recordset1['ID_ Rayon']; ?>">
    </form>
    <p>&nbsp;</p>
    <?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
