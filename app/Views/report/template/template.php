<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            color: #333;
        }

        h1 {
            font-size: 3rem;
            text-align: center;
            color: #4caf50;
        }

        p {
            text-align: center;
            font-size: 0.8rem;
            color: #3333339f;
            margin-top: -10px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 5rem;
            max-width: 600px;
            background-color: #fff;
            padding: 2rem;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card {
            padding: 1rem;
            padding-top: 0;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .card-subtitle {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .card-text {
            margin-bottom: 1rem;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <h1><?= $title ?></h1>
    <p>This is an example of a <?= $title ?>.</p>
    <p>Generate Date: <?= date('Y-m-d H:i:s') ?></p>
    <hr />

    <?= $this->renderSection('table') ?>

</body>

</html>