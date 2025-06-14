<?php
header('Content-Type: text/html; charset= UTF-8');
session_start();
include'conexion.php';
$conexion->set_charset("utf8mb4");

if(isset($_SESSION['username'])){
     
}

else {
    
    echo '<script>window.location= "index.php";</script>';


}

$profile = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
    <link rel="stylesheet" href="style/estilo_frame.css"/>
    <title>caja</title>
</head>
<body>
   <section id="contenedor6">
      

          
          
        <form action="agregar_venta.php" method="POST" name="form"  id= "formulario_caja">
           
          
           
           <input type="text" name="codigo_barras" placeholder="Ingrese codigo de barras" id="txt" required >
           
           
           
           <input type="submit" value="Agregar" id="boton2">
          
          
      </form>
      
     
      
      
        <table id='datos'>            
             
             
             
              
                     <tr >
                         <td id ='title2' >Titulo</td>
                         <td id ='title2'>Precio</td>
                                        
                         
                         
                     </tr>
               <?php
             
       
       
            /*
           $result = mysql_query("select * from libros_venta");
             
             while($row = mysql_fetch_array($result)){*/
             
              $result = $conexion->query("select * from libros_venta"); 
            while($row = $result->fetch_array(MYSQLI_ASSOC)){?>
                
                <tr>
                    <td style ="color: black;"><?php echo $row["nombre_libro"]; ?></td>
                    <td style ="color: black;"><?php echo $row["precio"]; ?></td>
                   
                                  
                </tr>
                <?php 
             }
           
       ?>
       
          </table>
          
          <?php
          require 'suma_caja.php';
          ?>
       
       <a>TOTAL: $ <?php echo $total ?> </a>
       
     
       
       
       
        
     
      
           <form action="pago.php" id="formulario_caja2" method="POST" name="form"  >
           
               <legend> Pagar </legend>   
            
         <label> Cantidad </label> <label id="pesos"> $ </label>                     
         
         <input type="text" name="cantidad_pagar" placeholder="Ingrese cantidad a pagar" id="pago" required  >
         <input type="hidden" name="temporal" placeholder="Ingrese cantidad a pagar" id="total" value="<?php echo $total; ?>"   >
         
         
      <script>
	var pago = document.getElementById('pago');
	var total = document.getElementById('total');
	function check() {
		if (/^[0-9]+$/.test(pago.value) && Number(pago.value) >= Number(total.value)) {
			pago.style.color = '#000';
		} else {
			pago.style.color = '#FF0000';
		}
	}
	pago.addEventListener('blur', check);
	check();
</script> 

        
          <label id="tipo"> Tipo de Pago: </label> 
         
         <select type="text" name="tipo_pago" placeholder=""  id="seleccion" required >
         
         <option value="No seleccionado">Seleccione tipo de pago</option>
         <option value="Efectivo">Efectivo</option>
         <option value="Credito">Credito</option>
         <option value="Debito">Debito</option>
         
     
                  
               </select>          
                     
           
           
              
           
           <input type="submit" value="Procesar" id="boton2" >


           <input type="reset" value="Cancelar" id="boton2" onclick="location.href='cancelar_venta.php'">
    
       </form>
       
   </section>
    
</body>