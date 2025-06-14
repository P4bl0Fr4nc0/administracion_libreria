<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
     <link rel="stylesheet" href="style/estilo_frame.css"/>
    <title>Agreagar Datos Cliente</title>
    

</head>
<body>
   
       
    
    <section id="contenedor_agregar_cliente">
    <h1> Agrega los datos del cliente </h1>
    
    <form  action ="insertar_cliente.php" method="post">
         <input type="text" name="nombre" placeholder="Nombre Cliente" id="txt" required >
           
           <input type="text" name="email" placeholder="E-mail"  id="txt" required   >
           
           <input type="text" name="telefono" placeholder="Telefono"  id="txt" required   >
           
           <input type="text area" name="direccion" placeholder="Direccion"  id="txt"    >
           
           <button type ="submit" value ="Agregar" > Agregar</button>
           
           
           <button type ="button" value ="No_agregar" onclick="javascript: window.close()"> No agregar</button>
    </form>
    </section>
    
</body>
</html>