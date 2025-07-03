    <?php 
    $codigoEncriptado = $_GET['codigo'];
    $codigo = base64_decode($codigoEncriptado);

    if(!empty($codigo)){
    $sql = "SELECT * FROM animal WHERE codigo_animal = ?";
    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param("s", $codigo);
    $stmt -> execute();
    $result = $stmt -> get_result();

    if($result-> num_rows > 0){
      $animal = $result -> fetch_assoc();
      $codigoAntiguo = $animal['codigo_animal'];
      $nombre=$animal['nombre'];
      $proposito = $animal['proposito'];
      $edad = $animal['etapa_edad'];
      $estado = $animal['estado'];
      $color =$animal['color']; 
      $imagen = $animal['imagen_animal'];  
    } else{
        echo "Animal no encontrado";
    }

    $stmt->close();
    $conn->close();
  } else{
    echo "Codigo no encontrado.";
    exit;
  }

  ?>