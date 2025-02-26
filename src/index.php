<?php
// Set the header to allow CSS
header('Content-Type: text/html; charset=utf-8');

$dir = '.';
if (isset($_GET['dir'])) {
    $dir = $_GET['dir'];
}

$files = array_diff(scandir($dir), array('.', '..')); // Get files and directories

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Source Index</title>
    <style>
        body {
            font-family: monospace;
            background-color: black;
            color: white;
        }
        a {
            color: #31aa33;
            text-decoration: none;
        }
        a:hover {
            text-decoration: none;
        }
        table {
            width: 100%;
            border: none;
            border-collapse: collapse; /* Collapses borders */
            border-spacing: 0; /* Removes spacing between cells */
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: none; /* Removes any borders */
        }
        th {
            background-color: black;
            font-weight: bold;
        }
        tr:hover {
            background-color: black;
        }
        img {
            display: none; /* Hides any icons */
        }
        /* Files */
        a {
            color: white;
        }
        /* Directories */
        a[href$="/"] {
            color: #31aa33;
        }
    </style>
</head>
<body>
    <h1>Project Source Files</h1>
    <table>
        <tbody>
            <?php foreach ($files as $file): ?>
                <tr>
                    <td>
                        <?php if (is_dir($file)): ?>
                            <a href="?dir=<?php echo urlencode($file); ?>/"><?php echo $file; ?>/</a>
                        <?php else: ?>
                            <a href="<?php echo $file; ?>"><?php echo $file; ?></a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
