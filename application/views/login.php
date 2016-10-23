<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acesso</title>
    <script src="<?= base_url() ?>asset/js/angular.min.js"></script>
    <script src="<?= base_url() ?>asset/js/angular-md5.js"></script>
    <link href="<?= base_url() ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/css/datepicker3.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/css/styles.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="<?= base_url() ?>asset/js/html5shiv.js"></script>
    <script src="<?= base_url() ?>asset/js/respond.min.js"></script>

    <![endif]-->

</head>

<body ng-controller="Main as mn">

<div class="row" ng-init="isLogged()">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Log in</div>
            <div class="panel-body">
                <form role="form">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" ng-model="LoginUsuario">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="" ng-model="LoginSenha">
                        </div>

                        <a ng-click="Login()" class="btn btn-primary">Login</a>
                    </fieldset>
                </form>
                <hr>
                <fieldset>
                    <center>para cadastrar-se <a href="cadastro.php">Clique Aqui</a></center>
                </fieldset>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->


<script src="<?= base_url() ?>asset/js/jquery-1.11.1.min.js"></script>
<script src="<?= base_url() ?>asset/js/app.js"></script>
<script src="<?= base_url() ?>asset/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>asset/js/chart.min.js"></script>

<script src="<?= base_url() ?>asset/js/easypiechart.js"></script>


</body>

</html>
