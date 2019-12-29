<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nobel Laureate</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2a6681130e.js" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
<div data-request = "<?php print_r($_REQUEST) ?>"></div>
<br><br><br><br><br><br><br><br><br><br>
<!-- Button trigger modal -->
<p class="text-center">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#laureate">
        Open
    </button>
</p>
<p class="text-center">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#laureateEdit">
        Open
    </button>
</p>
<!-- Modal -->
<div class="modal fade" id="laureate" tabindex="-1" role="dialog" aria-labelledby="laureateLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="laureateLabel">{Firstname Surname}</h5>
                <button data-toggle="modal" data-target="#laureateEdit" type="button" class="btn btn-primary">Edit</button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <h1>{firstname surname}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <h2>Info</h2>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    name <span class="badge badge-pill">{firstname}</span>
                                </li>
                                <li class="list-group-item">
                                    surname <span class="badge  badge-pill">{surname}</span></li>
                                <li class="list-group-item">
                                    born <span class="badge  badge-pill">{born}</span>
                                </li>
                                <li class="list-group-item">
                                    bornCountry <span class="badge  badge-pill">{bornCountry}</span>
                                </li>
                                <li class="list-group-item">
                                    bornCountryCode <span class="badge  badge-pill">{bornCountryCode}</span>
                                </li>
                                <li class="list-group-item">
                                    bornCity <span class="badge  badge-pill">{bornCity}</span>
                                </li>
                                <li class="list-group-item">
                                    died <span class="badge  badge-pill">{died}</span>
                                </li>
                                <li class="list-group-item">
                                    diedCountry <span class="badge  badge-pill">{diedCountry}</span>
                                </li>
                                <li class="list-group-item">
                                    diedCountryCode <span class="badge  badge-pill">{diedCountryCode}</span>
                                </li>
                                <li class="list-group-item">
                                    diedCity <span class="badge  badge-pill">{diedCity}</span>
                                </li>
                                <li class="list-group-item">
                                    gender <span class="badge  badge-pill">{gender}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <h2>Prizes</h2>
                            <h3>{year}</h3>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    year <span class="badge  badge-pill">{year}</span>
                                </li>
                                <li class="list-group-item">
                                    category <span class="badge  badge-pill">{category}</span>
                                </li>
                                <li class="list-group-item">
                                    share <span class="badge  badge-pill">{share}</span>
                                </li>
                                <li class="list-group-item">
                                    motivation <span class="badge  badge-pill">{motivation}</span>
                                </li>
                            </ul>
                            <h3>Affiliation</h3>
                            <h4>{name}</h4>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    name <span class="badge  badge-pill">{name}</span>
                                </li>
                                <li class="list-group-item">
                                    city <span class="badge  badge-pill">{city}</span>
                                </li>
                                <li class="list-group-item">
                                    country <span class="badge  badge-pill">{country}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="laureateEdit" tabindex="-1" role="dialog" aria-labelledby="laureateEditLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="laureateEditLabel">Edit : {Firstname Surname}!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <h1>Edit : {Firstname Surname}!</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <h2>Info</h2>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        name <input id="firstname" name="firstname" type="text" value="{firstname}">
                                    </li>
                                    <li class="list-group-item">
                                        surname <input id="surname" name="surname" type="text" value="{surname}">
                                    </li>
                                    <li class="list-group-item">
                                        born <input id="born" name="born" type="date" value="{born}">
                                    </li>
                                    <li class="list-group-item">
                                        bornCountry <input id="bornCountry" name="bornCountry" type="text"
                                                           value="{bornCountry}">
                                    </li>
                                    <li class="list-group-item">
                                        bornCountryCode <input id="bornCountryCode" name="bornCountryCode" type="text"
                                                               value="{bornCountryCode}">
                                    </li>
                                    <li class="list-group-item">
                                        bornCity <input id="bornCity" name="bornCity" type="text" value="{bornCity}">
                                    </li>
                                    <li class="list-group-item">
                                        died <input id="died" name="died" type="date" value="{died}">
                                    </li>
                                    <li class="list-group-item">
                                        diedCountry <input id="diedCountry" name="diedCountry" type="text"
                                                           value="{diedCountry}">
                                    </li>
                                    <li class="list-group-item">
                                        diedCountryCode <input id="diedCountryCode" name="diedCountryCode" type="text"
                                                               value="{diedCountry}">
                                    </li>
                                    <li class="list-group-item">
                                        diedCity <input id="diedCity" name="diedCity" type="text" value="{diedCity}">
                                    </li>
                                    <li class="list-group-item">
                                        gender <input id="gender" name="gender" type="text" value="{gender}">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <h2>Prizes</h2>
                                <h3>{year{laureate_prize_number}}</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        year <input id="year{laureate_prize_number}" name="year{laureate_prize_number}"
                                                    type="date" value="{year{laureate_prize_number}}">
                                    </li>
                                    <li class="list-group-item">
                                        category <input id="category{laureate_prize_number}"
                                                        name="category{laureate_prize_number}" type="text"
                                                        value="{category{laureate_prize_number}}">
                                    </li>
                                    <li class="list-group-item">
                                        share <input id="share{laureate_prize_number}"
                                                     name="share{laureate_prize_number}" type="number"
                                                     value="{share{laureate_prize_number}}">
                                    </li>
                                    <li class="list-group-item">
                                        motivation <input id="motivation{laureate_prize_number}"
                                                          name="motivation{laureate_prize_number}" type="text"
                                                          value="{motivation{laureate_prize_number}}">
                                    </li>
                                </ul>
                                <h3>Affiliation</h3>
                                <h4>{name{laureate_prize_number}}</h4>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        name <input id="name{laureate_prize_number}" name="name{laureate_prize_number}"
                                                    type="text" value="{name{laureate_prize_number}}">
                                    </li>
                                    <li class="list-group-item">
                                        city <input id="city{laureate_prize_number}" name="city{laureate_prize_number}"
                                                    type="text" value="{city{laureate_prize_number}}">
                                    </li>
                                    <li class="list-group-item">
                                        country <input id="country{laureate_prize_number}"
                                                       name="country{laureate_prize_number}" type="text"
                                                       value="{country{laureate_prize_number}}">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>