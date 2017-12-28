<!doctype html>
<!--[if IE 6]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if (gt IE 6)|!(IE)]><!-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style type="text/css">
html,body{
    position: relative;
    height: 100%;
    z-index: -2;
}
.mi_input{
    width: 100%;
    padding: 13px 15px;
    font-family: 'Open Sans', helvetica, arial, sans-serif;
    font-weight: 400;
    font-size: 14px;
    color: #9d9e9e;
    background: #fafafa;
    border: 1px solid #cbcbcb;
    border-radius: 4px;
    box-shadow: inset 0 3px 0px rgba(0,0,0,0.05);
    -moz-box-shadow: inset 0 3px 0px rgba(0,0,0,0.05);
    -webkit-box-shadow: inset 0 3px 0px rgba(0,0,0,0.05);
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    margin-bottom: 13px;
}
.close{
    margin-top: 0px;  -webkit-appearance: none;
    padding: 0;
    cursor: pointer;
    background: 0 0;
    border: 0;float: right;
    font-size: 24px !important;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: .4 !important;
}
.mi_header{
    min-height: 16.43px;
    padding: 20px !important;
    border-bottom: 1px solid #e2e4e6 !important;
    background-color: #f5f7fa !important;
    border-radius: 10px 10px 0px 0px !important
}
.mi_contenedor{
    width: 442px !important;
    margin: auto !important;
    position: relative;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 6px;
    outline: 0;
    -webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5);
    box-shadow: 0 3px 9px rgba(0,0,0,.5);
}
.mi_modal{
    -webkit-transform: translate3d(0,0,0);
    -o-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
    width: 440px;
    margin: 30px auto;
    position: relative;
    z-index: 1522;
}
.modal_home{
    display:none;overflow: hidden;
    position: fixed;
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
    z-index: 1520;
    outline: 0px;
    -webkit-transition: opacity 0.15s linear;
    transition: opacity 0.15s linear;
    background-color: rgba(0, 0, 0, 0.55);
}
.mi_footer{
    padding: 12px 20px !important;
    text-align: right;
    border-top: 1px solid #e5e5e5;
}
.mi_boton{
    border: solid 0px;
    color: #fff;
    background-color: #2387d0;
    border-bottom: 4px solid #2079ba;
    font-weight: 400;
    font-size: 12px !important;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    padding: 9px 18px 9px 18px;
    border-radius: 4px;
    cursor: pointer;
}
.mi_boton_xl{
    width: 46%;
    margin: 4px 8px;
}
.mi_boton:hover{
    background-color: #3098e4;
}
.mi_body{
    position: relative;
    padding: 35px 20px !important;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.mi_titulo{
    font-family: 'Open Sans', helvetica, arial, sans-serif;
    font-weight: 300;
    font-size: 22px;
}
.click{
    cursor: pointer;
}
.mi_full{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
}
.mialertmodal,.mialertmodal_2{
    position: absolute;
    font-weight: 600;
    font-size: 15px;
    width: 100%;
    top: 0;
    z-index: 99999;
    left: 0;
    height: 70px;
    border-radius: 5px 5px 0 0;
    padding: 16px;
    color: white;
    display: none;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.mialertdanger{
    background: #FF4B4B;
}
.mialertsucces{
    background: #4DBD50;
}
.fade{
    opacity: 0;
    -webkit-transition: opacity .15s linear;
    -o-transition: opacity .15s linear;
    transition: opacity .15s linear;
}
.in{
    opacity: 1;
}
</style>
<script type="text/javascript" src="web/custom-js/login.js"></script>
</head>
<body>
<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <a class="navbar-brand" href=""><img src="web/assets/images/logo.png" alt="logo" style="  height: 55px;"></a>
        </div>
    </nav>
</div>
<div id="inSlider" class="carousel slide " data-ride="carousel" data-interval="9000">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-image " >
                    <img src="img/profesora.png" alt="laptop" style="width: 83%;">
                </div>
                <div class="carousel-caption" style="top: 68px !important;">
                  <form autocomplete="off" action="" class="form-validate">
                   <div class="panel panel-body login-form">
                     <div class="text-center">
                       <img width="175" height="93"  src="./web/assets/images/EasyPOS-128.png">
                       <h5 class="content-group">Bienvenido a EasyPOS  - Guatemala<small class="display-block">Iniciar Sesión</small></h5>
                     </div>

                     <div class="form-group has-feedback has-feedback-left">
                       <input type="text" class="form-control" id="username" placeholder="Su Usuario" name="username" required="required">
                       <div class="form-control-feedback">
                         <i class="icon-user text-muted"></i>

                       </div>
                       <span id="error-user" class="label label-danger label-block"></span>
                     </div>

                     <div class="form-group has-feedback has-feedback-left">
                       <input type="password" class="form-control" id="password" placeholder="Su Password" name="password" required="required">
                       <div class="form-control-feedback">
                         <i class="icon-lock2 text-muted"></i>
                       </div>
                     </div>

                     <div class="form-group">
                       <button type="submit" class="btn bg-blue btn-block">Ingresar al Sistema <i class="icon-lock5"></i></button>
                     </div>
                 </form>

                                    <div style="margin-top: 17px;text-align: center;font-size: 13px;font-weight: 500;">
                                        Para padres y apoderados descargar la aplicación desde:
                                        <div style="margin-top: 14px;">
                                            <a href="https://play.google.com/store/apps/details?id=com.rowsis.appoderado" target="_blank"><img src="images/android_logo_1.png" style="width: 100px;margin-right: 16px;"></a>
                                            <a href="https://itunes.apple.com/cl/app/appoderado/id986014721?mt=8" target="_blank"><img src="images/ios_logo_1.png" style="width: 100px;"></a>
                                        </div>
                                    </div>
                                <!--/div>
                            </div>

                    </div-->
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>
        </div>
    </div>
</div>
<section id="contact" class="container services text-center">
    <div class="row features-block container-blue">
        <div class="col-lg-12 features-text">
            <h2 class="m-t-n-md m-b-xl">¿Aún no tienes appoderado en tu establecimiento?</h2>
            <p class="paragraph">Pidele a tu establecimiento que contrate appoderado</p>
            <!--p class="paragraph">Estamos disponibles a través de <span class="weight">convenio marco</span></p-->
            <!--p class="paragraph m-b-md">id de producto: <span class="weight">1136656</span></p-->
            <!--p class="paragraph">Valor licencia anual: 5.000.000 CLP</p-->
            <br>
            <p class="paragraph m-b-md">Escribenos a : <span class="weight">contacto@appoderado.cl</span></p>
            <!--a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">CONTÁCTANOS</a-->
        </div>
    </div>
</section>

<section class="darkGray-section text-center">
    <div class="row features-block container-blue">
        <div class="col-lg-12 features-text">
            <h5 class="m-t-n-md">&copy; 2015 Appoderado &#8226; All Rights Reserved.</h5>
            <p class="paragraphFooter">Desarrollado por Rowsis</p>
            <p class="paragraphFooter">siguenos en</p>
            <div class="icons">
                <a class="facebook" href="https://www.facebook.com/Appoderado/" target="_blank"></a>
            </div>
            <!--a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">CONTÁCTANOS</a-->
        </div>
    </div>
</section>


<!--div class="clear50"></div-->
<!--div id="wrapper">


</div-->

</body>
</html>
