<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel import</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--need Composer visit php spreadsheet documentation to get composer
    install composer 
    check version type on terminal: composer -V
    run composer require phpoffice/phpspreadsheet
    you may face error solve it using online or chatgpt-->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <?php
            if(isset($_SESSION['message'])){
                echo "<h4>".$_SESSION['message']."</h4>";
                unset($_SESSION['message']);
            }
            
            
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>How to import data into database in php</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="import_file" class="form-control" />
                        <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="js/bootstrap.js"></script>
    
</body>
</html>