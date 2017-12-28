<?php
session_start();
$usuario = $_SESSION['user_name'];
require('../model/Venta_model.php');
require('../controller/Venta_controller.php');
require __DIR__ . '/ticket/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$idventa =  base64_decode(isset($_GET['venta']) ? $_GET['venta'] : '');




$objVenta = new Venta();

if($idventa == ""){
  $detalle = $objVenta->Imprimir_Ticket_DetalleVenta('0');
  $datos = $objVenta->Imprimir_Ticket_Venta('0');
} else {
  $detalle = $objVenta->Imprimir_Ticket_DetalleVenta($idventa);
  $datos = $objVenta->Imprimir_Ticket_Venta($idventa);
}

foreach ($datos as $row => $column) {

  $tipo_comprobante = $column["p_tipo_comprobante"];
  $empresa = $column["p_empresa"];
  $propietario = $column["p_propietario"];
  $direccion = $column["p_direccion"];
  $nit = $column["p_numero_nit"];
  $fecha_resolucion = $column["p_fecha_resolucion"];
  $numero_resolucion_fact = $column["p_numero_resolucion_fact"];
  $numero_resolucion = $column["p_numero_resolucion"];
  $serie = $column["p_serie"];
  $numero_comprobante = $column["p_numero_comprobante"];
  $empleado = $column["p_empleado"];
  $numero_venta = $column["p_numero_venta"];
  $fecha_venta = $column["p_fecha_venta"];
  $subtotal = $column["p_subtotal"];
  $exento = $column["p_exento"];
  $descuento = $column["p_descuento"];
  $total = $column["p_total"];
  $numero_productos = $column["p_numero_productos"];
$tipo_pago = $column["p_tipo_pago"];
$efectivo = $column["p_pago_efectivo"];
$pago_tarjeta = $column["p_pago_tarjeta"];
$numero_tarjeta = $column["p_numero_tarjeta"];
$tarjeta_habiente = $column["p_tarjeta_habiente"];
$cambio = $column["p_cambio"];
$moneda = $column["p_moneda"];
$estado = $column["p_estado"];
$cliente= $column["p_cliente"];
$cliente_nit = $column["p_numero_nit_C"];
$direccion_cliente = $column["p_direccion_cliente"];
$desde = $column["p_desde"];
$hasta = $column["p_hasta"];
}

$nit =  substr($nit, 0, 7).'-'.substr($nit, 7,9);
$cliente_nit =  substr($cliente_nit, 0, 7).'-'.substr($cliente_nit, 7,9);
$numero_tarjeta = substr($numero_tarjeta,0,4).'-XXXX-XXXX-'.substr($numero_tarjeta,12,16);

if($cliente == ""):
$cliente = 'CONSUMIDOR FINAL';
endif;

if($cliente_nit == ""):
$cliente_nit = '';
endif;

if($direccion_cliente == ""):
$direccion_cliente = '';
endif;

$nombre_impresora = trim(file(__DIR__ . '/impresora.ini')[0]);
/* Fill in your own connector here */
$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);

/* Name of shop */
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer->setEmphasis(true);
$printer->setTextSize(2, 2);
$printer -> text($empresa."\n");
$printer->setEmphasis(false);
$printer -> selectPrintMode();
$printer -> text($direccion."\n");
$printer -> selectPrintMode();
$printer->text("Soluciones Empresariales \n");
//$printer -> text('NIT : '.$nit."\n");
$printer -> selectPrintMode();
//$printer -> text('Resolucion '.$numero_resolucion_fact.' del '.$fecha_resolucion."\n");
$printer -> text("Computadoras, Accesorios Y Servicio Técnico \n");
$printer -> selectPrintMode();
//$printer -> text('Serie : '.$serie.' de '.$desde.' a '.$hasta."\n");
$printer -> text("www.senet.com.gt \n");
$printer -> selectPrintMode();
//$printer -> text("Resolucion del Sistema \n");
$printer -> text("Tel: 5432 9000 \n");
$printer -> selectPrintMode();
//$printer -> text($numero_resolucion.' de'.$fecha_resolucion."\n");
$printer -> selectPrintMode();
$printer -> text("------------------------------------------------");
$printer -> feed();
/* Title of receipt */
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> selectPrintMode();
//$printer -> text("FACTURA SERIE  ".$serie.'                  NO.'.$numero_comprobante."\n");
$printer -> selectPrintMode();
$printer -> text('FECHA DE EMISION : '.$fecha_venta."\n");
$printer -> selectPrintMode();
$printer -> text("CAJA NO.: 1                   CAJERO : ".$usuario."\n");
$printer -> selectPrintMode();
$printer -> text('TRANSACCION : '.$numero_venta."\n");
$printer -> selectPrintMode();
$printer -> text('Nombre : '.$cliente."\n");
$printer -> selectPrintMode();
$printer -> text('NIT : '.$cliente_nit."\n");
$printer -> selectPrintMode();
$printer -> text('Direccion : '.$direccion_cliente."\n");
$printer -> selectPrintMode();
$printer -> text("------------------------------------------------");
$printer -> selectPrintMode();
$printer -> text("CANTID  DESCRIPCION             PRECIO    TOTAL \n");
$printer -> selectPrintMode();
$printer -> text("------------------------------------------------");
$printer -> selectPrintMode();
while($row = $detalle->fetch(PDO::FETCH_ASSOC)) {
  $printer->setJustification(Printer::JUSTIFY_LEFT);
  $printer -> text($row['descripcion']."                                        ".$row['cantidad']." * ".$row['precio_unitario']." = ".$row['importe'],2, ".", ",");
  $printer -> text("\n");
}
$printer -> selectPrintMode();
$printer -> text("------------------------------------------------ \n");

$printer -> selectPrintMode();
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer -> text("G = GRAVADO      E = EXENTO \n \n");
$printer -> selectPrintMode();
$printer->setEmphasis(true);
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer -> text("SUBTOTAL :                              ".$subtotal,2,  '.', ',');
$printer -> text("\n");
$printer->setEmphasis(false);
$printer -> selectPrintMode();
$printer->setEmphasis(true);
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer -> text("EXENTO :                                ".$exento,2,  '.', ',');
$printer -> text("\n");
$printer->setEmphasis(false);
$printer -> selectPrintMode();
$printer->setEmphasis(true);
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer -> text("GRAVADO :                               ".$subtotal,2,  '.', ',');
$printer -> text("\n");
$printer->setEmphasis(false);
$printer -> selectPrintMode();
$printer->setEmphasis(true);
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer -> text("DESCUENTO :                               ".$descuento,2,  '.', ',');
$printer -> text("\n");
$printer->setEmphasis(false);
$printer -> selectPrintMode();
$printer->setEmphasis(true);
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer -> text("TOTAL A PAGAR:                          ".$total,2,  '.', ',');
$printer -> text("\n");
$printer->setEmphasis(false);

$printer -> selectPrintMode();
$printer -> text("------------------------------------------------ \n");
$printer -> selectPrintMode();
$printer->setEmphasis(true);
$printer -> text("Numero de Productos:      ".$numero_productos."\n");
$printer->setEmphasis(false);
if($tipo_pago == 'EFECTIVO'){

  $printer -> selectPrintMode();
  $printer->setEmphasis(true);
  $printer -> text("Efectivo:                ".$efectivo."\n");
  $printer->setEmphasis(false);
  $printer -> selectPrintMode();
  $printer->setEmphasis(true);
  $printer -> text("Cambio:                   ".$cambio."\n");
  $printer->setEmphasis(false);

} else if ($tipo_pago == 'TARJETA'){

  $printer -> selectPrintMode();
  $printer->setEmphasis(true);
  $printer -> text("No. Tarjeta :   ".$numero_tarjeta."\n");
  $printer->setEmphasis(false);
  $printer -> selectPrintMode();
  $printer->setEmphasis(true);
  $printer -> text("Debitado :                ".$total."\n");
  $printer->setEmphasis(false);

}  else if ($tipo_pago == 'EFECTIVO Y TARJETA'){

  $printer -> selectPrintMode();
  $printer->setEmphasis(true);
  $printer -> text("Venta realizada con dos metodos de pago \n");
  $printer->setEmphasis(false);
  $printer -> selectPrintMode();
  $printer->setEmphasis(true);
  $printer -> text("Efectivo:                ".$efectivo."\n");
  $printer->setEmphasis(false);
  $printer -> selectPrintMode();
  $printer->setEmphasis(true);
  $printer -> text("No. Tarjeta :   ".$numero_tarjeta."\n");
  $printer->setEmphasis(false);
  $printer -> selectPrintMode();
  $printer->setEmphasis(true);
  $printer -> text("Debitado :                ".$total."\n");
  $printer->setEmphasis(false);

}
$printer -> selectPrintMode();
$printer -> text("------------------------------------------------ \n");
$printer -> selectPrintMode();
$printer->setEmphasis(true);
$printer -> text("PRECIOS EN :        ".$moneda."\n");
$printer->setEmphasis(false);
if($estado == '2'):
  $printer->setEmphasis(true);
  $printer -> text("Esta Venta ha sido al credito \n");
  $printer->setEmphasis(false);
endif;
/* Footer */
$printer -> feed(2);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer->setEmphasis(true);
$printer -> text("GRACIAS POR SU COMPRA\n");
$printer->setEmphasis(false);
$printer->barcode($numero_venta, Printer::BARCODE_CODE39);
$printer -> feed();
$printer -> text($numero_venta."\n");
$printer -> feed(2);
//$printer -> text($date . "\n");
/* Cut the receipt and open the cash drawer */
$printer -> cut();
$printer -> pulse();
$printer -> close();

	echo "<script>window.location.href = '../?View=POS'</script>";
