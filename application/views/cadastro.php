<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
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
            <div class="panel-heading">Cadastro</div>
            <div class="panel-body">
                <form role="form">
                    <fieldset>
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" placeholder="Nome" name="email" type="text" autofocus="" ng-model="CadNome">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" ng-model="CadEmail">
                        </div>

                        <div class="form-group">
                            <label>Senha</label>
                            <input class="form-control" placeholder="Password" name="password" type="password" value="" ng-model="CadSenha">
                        </div>

                        <a ng-click="Cadastrar()" class="btn btn-primary">Login</a>
                    </fieldset>
                </form>

            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->


<script src="<?= base_url() ?>asset/js/jquery-1.11.1.min.js"></script>
<script src="<?= base_url() ?>asset/js/app.js"></script>
<script src="<?= base_url() ?>asset/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>asset/js/chart.min.js"></script>

<script src="<?= base_url() ?>asset/js/easypiechart.js"></script>

<script src="<?= base_url() ?>asset/js/bootstrap-datepicker.js"></script>
<script>
    !function ($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>

</html>
