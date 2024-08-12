<?php
include 'db.php'; // Incluye el archivo de conexión

// Obtener el código del parámetro GET
$codigo = isset($_GET['codigo']) ? $_GET['codigo'] : '';

// Consulta para obtener la información de la tumba
$sql = "SELECT nombre, fecha, ubicacion, codigo, foto FROM tumbas WHERE codigo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $codigo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    $row = null;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Tumba</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Información de la Tumba</h1>
        <?php if ($row) : ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($row['nombre']); ?></h5>
                    <p class="card-text"><strong>Fecha:</strong> <?php echo htmlspecialchars($row['fecha']); ?></p>
                    <p class="card-text"><strong>Ubicación:</strong> <?php echo htmlspecialchars($row['ubicacion']); ?></p>
                    <p class="card-text"><strong>Código:</strong> <?php echo htmlspecialchars($row['codigo']); ?></p>
                    <?php if ($row['foto']) : ?>
                        <img src="assets/img/20f27a80fe0205700fdcd85a2788332d.jpg"<?php echo htmlspecialchars($row['foto']); ?>" alt="imagen" class="img-thumbnail">
                    <?php endif; ?>
                </div>
            </div>
        <?php else : ?>
            <p>No se encontró información para el código proporcionado.</p>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>