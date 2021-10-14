<?php
    require "includes/dbConnect.php";
    session_start();

    if ((isset($_GET['accion']))&&($_GET['accion']=='limpiar')) {               //Esto es para poder limpiar todos los productos del carrito y se pone ant5es del boton 
        unset($_SESSION['carrito']);                                            //porque sino habría que darle dos veces.
    }


    if(isset($_GET['iprod'])){ 
        $id=intval($_GET['iprod']); 
        if(isset($_SESSION['carrito'][$id])){ 
           $_SESSION['carrito'][$id]['cantidad']++;
           header("Location: ./listaProductos.php"); 
        }else{ 
           $sql1="SELECT * FROM productos WHERE id_producto=$id"; 
           $resul1 = $db->query($sql1);
            if($row1 = $resul1->fetch_assoc()){
              $_SESSION['carrito'][$row1['id_producto']]=array( 
                "cantidad" => 1,
                "idProducto" => $row1['id_producto'],
                "precio" => $row1['precio'],
                "imagen" => $row1['imagen'],
                "nombre" => $row1['nombre']);
           }
           header("Location: ./listaProductos.php");
       }
    } 

    if(isset($_GET['iprod2'])){ 
        $id=intval($_GET['iprod2']); 
        if(isset($_SESSION['carrito'][$id])){ 
           $_SESSION['carrito'][$id]['cantidad']--;             //Esto es para eliminar los productos del carrito de 1 en 1.
           if ($_SESSION['carrito'][$id]['cantidad']<=0){
               unset($_SESSION['carrito'][$id]);
           }
        }
    }

    require "cabecera.php";

    if ((!isset($_SESSION['carrito']))&&(empty($_SESSION['carrito']))) {
?>

<div class="xs100 flex xs_jcCenter">
    <div class="centrado flex xs_jcCenter pTop40 pBottom40">
        <div class="xs80 flex xs_fCol xs_aiCenter" id="secCarrito">
            <h2 class="mBottom40">Carrito de la Compra</h2>
            <div class="xs100 flex xs_fCol xs_jcSpabet cajaProd_Carrito">
                <h3 class="txCentrado textoNegro">Carrito de la Compra Vacío</h3>
            </div>
            <div class="xs35 flex xs_filaWrap xs_jcSpabet xs_aiCenter mTop40">
                <a href="listaProductos.php" class="linkNegro">Volver al Listado</a>
                <a href="carrito.php?accion=limpiar" class="linkAzul fondoCian">Limpiar Carrito</a>
            </div>
        </div>
    </div>
</div>

<?php
    } else {
?>

<div class="xs100 flex xs_jcCenter">
    <div class="centrado flex xs_jcCenter pTop40 pBottom40">
        <div class="xs80 flex xs_fCol xs_aiCenter" id="secCarrito">
            <h2 class="mBottom40">Carrito de la Compra</h2>
            <div class="xs100 flex xs_fCol xs_jcSpabet cajaProd_Carrito">
                <?php
                      $total = 0;
                     foreach($_SESSION['carrito'] as $lineaCarrito){ 
                        $subTotal = $lineaCarrito['cantidad'] * $lineaCarrito['precio'];
                        $total = $total + $subTotal; //Le suma al total los subtotales de cada producto.
                ?>

                <div class="flex xs_filaWrap mBottom40">
                    <div class="xs10 overhide">
                        <img src="images/productosImg<?php echo $lineaCarrito['imagen']?>" alt="imgProducto" class="xs100">
                    </div>
                    <div class="xs70 flex xs_fCol txProdCarrito">
                        <h3><?php echo $lineaCarrito['nombre']?></h3>
                        <div class="flex xs_filaWrap">
                            <span class="txGris">Cantidad: <?php echo $lineaCarrito['cantidad']?></span>
                            <span class="txGris">Precio: <?php echo $lineaCarrito['precio']?> €</span>
                            <a href="carrito.php?iprod2=<?php echo $lineaCarrito['idProducto']?>" class="txGris">Eliminar</a>
                        </div>
                        <?php if ($lineaCarrito['cantidad']>1){?>
                        <span class="txDerecha precioSub_Tot">Subtotal: <?php echo $subTotal;?> €</span>
                        <?php
                            }    
                        ?>
                    </div>
                </div>

                <?php
                    }
                ?>
                <span class="txDerecha precioTot">Total: <?php echo $total?> €</span>
            </div>
            <div class="xs35 flex xs_filaWrap xs_jcSpabet xs_aiCenter mTop40">
                <a href="listaProductos.php" class="linkNegro">Volver al Listado</a>
                <a href="carrito.php?accion=limpiar" class="linkAzul fondoCian">Limpiar Carrito</a>
            </div>
        </div>
    </div>
</div>

<?php
    }
    require "pie.php";
?>