<?php

require_once "../../model/security.php";
global $SECURITY_SECRETARY_LEVEL;

$SECURITY_SECRETARY_LEVEL->authorize();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/static/js/forms_checks/pre_admission/form-0-check.js" defer></script>
</head>

<body class="bg-white">
    <div class="container mx-auto p-4">
        <img src="/static/images/LPFS_logo.png" alt="LPFS Logo" class="mx-auto my-8 w-96">
        <img src="/static/images/derou1.png" alt="Derou1" class="mx-auto mb-8 w-128">

        <form action="./pre_admission_step1.php" method="post" class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
            <!-- Partie dates/médecin -->
            <div class="mb-4">
                <label for="admission_type" class="block text-sm font-semibold text-gray-600">Type d'admission :</label>
                <select name="admission_type" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    <?php
                    require_once "../../lib/relay_post.php";
                    require_once "../../lib/config.php";

                    use lib\db;

                    $db = db\get_db();
                    $stmt = $db->prepare("SELECT * from `type_hospitalisation`");
                    $result = $stmt->execute();
                    $rows = $stmt->fetchAll();

                    foreach ($rows as $row) {
                        extract($row);
                        echo "<option value='$id'>$type</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="admission_date" class="block text-sm font-semibold text-gray-600">Date d'admission :</label>
                <input type="date" name="admission_date" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" />
            </div>
            <div class="mb-4">
                <label for="admission_time" class="block text-sm font-semibold text-gray-600">Heure de l'intervention :</label>
                <input type="time" name="admission_time" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" />
            </div>
            <div class="mb-4">
                <label for="nom_medecin" class="block text-sm font-semibold text-gray-600">Nom du médecin :</label>
                <select name="nom_medecin" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    <?php
                    $stmt = $db->prepare("SELECT * from `medecins`");
                    $result = $stmt->execute();
                    $rows = $stmt->fetchAll();

                    foreach ($rows as $row) {
                        extract($row);
                        echo "<option value='$id'>$nom $prenom</option>";
                    }
                    ?>
                </select>
            </div>

            <input type="submit" class="w-full p-2 enabled:bg-blue-400 enabled:hover:bg-blue-500 text-white rounded disabled:hover:cursor-not-allowed disabled:bg-gray-200" />
        </form>
    </div>
</body>

</html>