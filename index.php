<!DOCTYPE html>
<?php require "./Producto.php" ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestión de Productos</title>
        
        <!-- CSS -->
        <link rel="stylesheet" href="./style.css">

        <!-- GFonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">

        <!-- Javascript -->
        <script>
            function limpiarFormulario() {
                document.fmProductos.txtGanancia.value = "";
                document.fmProductos.txtPrecioVenta.value = "";
                document.fmProductos.cbProducto.value = "";
                document.fmProductos.txtGanancia.focus();
            }
        </script>
    </head>
    <body>
        <h1>Gestión de productos</h1>

        <form id="fmProductos" name="fmProductos" method="get">
            <table>
                <tr>
                    <td>Ganancia:</td>
                    <td>
                        <input type="text" id="txtGanancia" name="txtGanancia"
                               placeholder="20%" autofocus
                               value="<?php echo filter_input(INPUT_GET, 'txtGanancia'); ?>"
                               >
                    </td>
                </tr>
                <tr>
                    <td>Productos:</td>
                    <td>
                        <select name="cbProducto">
                            <option value="1"
                            <?php
                            if (filter_input(INPUT_GET, 'cbProducto') == 1) {
                                echo 'Selected';
                            }
                            ?>
                                    >Short
                            </option>
                            <option value="2"
                            <?php
                            if (filter_input(INPUT_GET, 'cbProducto') == 2) {
                                echo 'Selected';
                            }
                            ?>
                                    >Camisa
                            </option>
                            <option value="3"
                            <?php
                            if (filter_input(INPUT_GET, 'cbProducto') == 3) {
                                echo 'Selected';
                            }
                            ?>
                                    >Jeans
                            </option>
                            <option value="4"
                            <?php
                            if (filter_input(INPUT_GET, 'cbProducto') == 4) {
                                echo 'Selected';
                            }
                            ?>
                                    >Polo
                            </option>
                        </select>
                    </td>
                </tr>

                <?php
                //Guardar el contenido de los controles en variables:
                $valGanancia = filter_input(INPUT_GET, 'txtGanancia');
                $idProducto = filter_input(INPUT_GET, 'cbProducto');
                $costo = 0;

                if (!empty($valGanancia) && !empty($idProducto)) {
                    $costo = "ola";
                    if (is_numeric($valGanancia)) {
                        $productoNuevo = new Producto($valGanancia, $idProducto);
                        $productoNuevo->calcularCosto();
                        $costo = $productoNuevo->getPrecioVenta();
                    } else {
                        $costo = "Solo se permite dígitos";
                    }
                }
                ?>

                <tr>
                    <td>Precio venta:</td>
                    <td>
                        <input type="text" name="txtPrecioVenta" readonly disabled
                               value="<?php echo $costo; ?>"       
                               >
                    </td>
                </tr>
            </table>
            <p>                        
                <input type="button" name="btnNuevo" value="Nuevo" onclick="limpiarFormulario();">
                <input type="submit" name="btnCalcular" value="Calcular">
            </p>
        </form>

    </body>
</html>