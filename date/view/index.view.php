<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Krepsinio Turnyro Dalyviu Forma</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<section class="container">
    <h2>Krepsinio Turnyro Dalyviu Forma</h2>
    <form method="post">
        <div>
            <label for="vardas"></label>
            <input type="text" name="vardas" class="form-control" placeholder="Vardas" required>
        </div>
        <div>
            <label for="pavarde"></label>
            <input type="text" name="pavarde" class="form-control" placeholder="Pavardė"  required>
        </div>
        <div>
            <label for="komanda"></label>
            <input type="text" name="komanda" class="form-control" placeholder="Komanda"  required>
        </div>
        <div class="mb-4">
            <label for="amzius"></label>
            <input type="number" name="amzius" class="form-control" placeholder="Amžius"  required>
        </div>
        <button class="btn btn-primary w-100" type="submit" value="Pateikti">Pateikti</button>
    </form>
</section>
<section class="container mt-5">
    <h2>Dalyviai</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Komanda</th>
                <th>Amžius</th>
                <th>Veiksmai</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dalyviai as $dalyvis): ?>
                <?php list($vardas, $pavarde, $komanda, $amzius) = explode(' ', $dalyvis); ?>
                <tr>
                    <td><?php echo $vardas; ?></td>
                    <td><?php echo $pavarde; ?></td>
                    <td><?php echo $komanda; ?></td>
                    <td><?php echo $amzius; ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="vardas" value="<?php echo $vardas; ?>">
                            <input type="hidden" name="pavarde" value="<?php echo $pavarde; ?>">
                            <input type="hidden" name="komanda" value="<?php echo $komanda; ?>">
                            <input type="hidden" name="amzius" value="<?php echo $amzius; ?>">
                            <input type="submit" name="show_card" class="btn btn-primary" value="Kortelė">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['show_card'])) {
    $vardas = $_POST['vardas'];
    $pavarde = $_POST['pavarde'];
    $komanda = $_POST['komanda'];
    $amzius = $_POST['amzius'];
    
    echo "<section class='container'>";
    echo "<h2>Dalyvio Kortelė</h2>";
    echo "<p><strong>Vardas:</strong> $vardas</p>";
    echo "<p><strong>Pavardė:</strong> $pavarde</p>";
    echo "<p><strong>Komanda:</strong> $komanda</p>";
    echo "<p><strong>Amžius:</strong> $amzius</p>";
    echo "</section>";
}
?>
</body>
</html>
