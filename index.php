<?php
error_reporting(1);
include 'lib/print_lib.php';
include 'lib/date_valid.php';
include 'lib/connection.php';
include 'classes/Laureate.php';

//create_workspace();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nobel Laureate</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <script src="js/jquery-3.4.1.js"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2a6681130e.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="">
        <img src="img/logo.svg" width="30" height="30" class="d-inline-block align-top"
             alt="">
        Nobel Laureates
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul id="filter" class="navbar-nav mr-auto">
            <li class="nav-item">
                <select id="category" class="custom-select">
                    <option>category</option>
                    <?php
                    foreach (get_options('category') as $option)
                        echo $option;
                    ?>
                </select>
            </li>
            <li class="nav-item">
                <select id="year" class="custom-select">
                    <option>year</option>
                    <?php
                    foreach (get_options('year') as $option)
                        echo $option;
                    ?>
                </select>
            </li>
            <li class="nav-item">
                <select id="country" class="custom-select">
                    <option>country</option>
                    <?php
                    foreach (get_options('country') as $option)
                        echo $option;
                    ?>
                </select>
            </li>
        </ul>
        <button id="search" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </div>
</nav>
<div id="container" class="container">
    <div class="row">
        <table class="table table-hover table-sm table-responsive-sm">
            <thead>
            <tr>
                <th scope="col">more</th>
                <th scope="col">firstname</th>
                <th scope="col">surname</th>
                <th scope="col">year</th>
                <th scope="col">category</th>
                <th scope="col">country</th>
            </tr>
            </thead>
            <tbody id="resultTable" data-start="0">
            </tbody>
        </table>
    </div>
</div>
<div id="resultModal">
</div>
<script>
    function loadLaureateInfo(index) {
        $.ajax({
            url: 'ajax/laureate.php',
            type: 'POST',
            data: {
                id: index
            },
        }).done(function (data) {
            data = JSON.parse(data);
            console.log(data);
            $('#resultModal').html(data);
            $('#laureate').modal('show');
        }).fail(function () {
            console.log('fail')
        })
    }

    function ajaxLoadTable(append = 0) {
        $.ajax({
            url: 'ajax/table.php',
            type: 'POST',
            data: {
                category: $('#category').val(),
                year: $('#year').val(),
                country: $('#country').val(),
                start: $('#resultTable').attr('data-start')
            },
        }).done(function (data) {
            // console.log(data);
            data = JSON.parse(data);
            console.log('done');
            if (append == 0) {
                $('#resultTable').html(data);
            } else {
                $('#resultTable').find('.btn-dark').replaceWith(data);
            }
            $('#resultTable').find('.btn-default').each(function () {
                console.log('row loaded');
                $(this).click(function () {
                    loadLaureateInfo($(this).attr('data-laureate'));
                })
            })
            $('#resultTable').find('.btn-dark').each(function () {
                $(this).click(function () {
                    $('#resultTable').attr('data-start', $(this).attr('data-start'));
                    console.log($('#resultTable').attr('data-start'));
                    ajaxLoadTable(1);
                })
            });
        }).fail(function () {
            console.log('fail')
        })
    }

    $(document).ready(function () {
        ajaxLoadTable();
        console.log($('#resultTable').attr('data-start'));
    });
    $('#filter').find('select').each(function () {
        $(this).on('change', function () {
            console.log($(this).val());
        })
    });
    $('#search').click(function () {
        console.log($(this).attr('id') + ' click');
        $('#resultTable').attr('data-start', 0);
        ajaxLoadTable();
        $('.navbar-toggler').click();
    });
</script>
</body>
</html>
