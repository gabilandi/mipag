<?php require_once('Connections/conexion.php'); ?>
<?php require_once('Connections/CONEXIO.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO datos (CEDULA, NOMBRE, APELLIDO, `FECHA DE NACIMIENTO`, EDAD, SEXO, TELEFONO, EMAIL) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['CEDULA'], "text"),
                       GetSQLValueString($_POST['NOMBRE'], "text"),
                       GetSQLValueString($_POST['APELLIDO'], "text"),
                       GetSQLValueString($_POST['FECHA_DE_NACIMIENTO'], "text"),
                       GetSQLValueString($_POST['EDAD'], "text"),
                       GetSQLValueString($_POST['SEXO'], "text"),
                       GetSQLValueString($_POST['TELEFONO'], "text"),
                       GetSQLValueString($_POST['EMAIL'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO datos (CEDULA, NOMBRE, APELLIDO, TELEFONO, `FECHA DE NACIMIENTO`, SEXO, EMAIL) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['CEDULA'], "text"),
                       GetSQLValueString($_POST['NOMBRE'], "text"),
                       GetSQLValueString($_POST['APELLIDO'], "text"),
                       GetSQLValueString($_POST['TELEFONO'], "text"),
                       GetSQLValueString($_POST['FECHA_DE_NACIMIENTO'], "date"),
                       GetSQLValueString($_POST['SEXO'], "text"),
                       GetSQLValueString($_POST['EMAIL'], "text"));

  mysql_select_db($database_CONEXIO, $CONEXIO);
  $Result1 = mysql_query($insertSQL, $CONEXIO) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p><img src="imagenes}/FONDO.png" width="753" height="274" />
</p>
<table width="1163" border="1">
  <tr>
    <td width="1153"><ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="Index-1.html" class="MenuBarItemSubmenu">Inicio</a>
        <ul>
          <li><a href="Inicial.html">Informacion</a></li>
          <li><a href="QUIENES.html">Quienes somos</a></li>
          </ul>
        </li>
      <li><a class="MenuBarItemSubmenu" href="#">Ofrecemos</a>
        <ul>
          <li><a class="MenuBarItemSubmenu" href="PRODUCTOS.html">Productos</a>
            <ul>
              <li><a href="#">Elemento 3.1.1</a></li>
              <li><a href="#">Elemento 3.1.2</a></li>
              </ul>
            </li>
          </ul>
        </li>
      <li><a href="#" class="MenuBarItemSubmenu">Contacto</a>
        <ul>
          <li><a href="frm1.php">Formulario</a></li>
          <li><a href="contac.php">Contacto</a></li>
          </ul>
        </li>
    </ul></td>
</tr>
  <tr> </tr>
</table>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">CEDULA:</td>
      <td><input type="text" name="CEDULA" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">NOMBRE:</td>
      <td><input type="text" name="NOMBRE" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">APELLIDO:</td>
      <td><input type="text" name="APELLIDO" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">TELEFONO:</td>
      <td><input type="text" name="TELEFONO" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">FECHA DE NACIMIENTO:</td>
      <td><input type="text" name="FECHA_DE_NACIMIENTO" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">SEXO:</td>
      <td><input type="text" name="SEXO" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">EMAIL:</td>
      <td><input type="text" name="EMAIL" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form2" />
</form>
<p>&nbsp;</p>
<table width="1166" border="1">
  <tr>
    <td width="967" bgcolor="#CCCCCC"><blockquote>
      <blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <blockquote>
                  <blockquote>
                    <blockquote>
                      <blockquote>
                        <blockquote>
                          <p><em><strong>Tienda de accesorios-Dog World . </strong></em></p>
                        </blockquote>
                        <p align="center"><strong><em>Te ofrecemos gran variedad de productos.</em></strong></p>
                        <blockquote>
                          <p><strong><em> dogworld@gmail.com </em></strong></p>
                        </blockquote>
                      </blockquote>
                    </blockquote>
                  </blockquote>
                </blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </blockquote>
    </blockquote></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>