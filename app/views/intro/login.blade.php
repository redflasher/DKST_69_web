<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/main.css">
    <style type="text/css">
    .validation-error
    {
        color:red;
    }

    </style>
</head>
<body>
<div class="container-fluid">
    <div class="header row">
        <div class="logo col-md-4">
            <img src="/img/logo_text.png" alt="Netping Logo">
        </div>

        <div class="info col-md-8">
            <div class="row">
                <div class="col-md-3"><h1>DKST 69</h1></div>
            </div>
        </div>

    </div>

    <br><br><br>
    <div class="page row">

    <div class="col-md-offset-4 col-md-4">



        <input type="text" class="form-control" onkeypress="userKeyPress(event)" id="username" placeholder="{{Lang::get('login.username')}}">
        <br>
        <input type="password" class="form-control" onkeypress="userKeyPress(event)" id="password" placeholder="{{Lang::get('login.password')}}">

        <br>
        <button class="col-md-4 pull-right btn btn-default" onclick="login();">{{Lang::get('login.enter')}}</button>

        <div class="validation-error">
        </div>
    </div>


    </div>

</div>


<div class="footer">
    <div class="col-xs-6">{{Lang::get('base.copy')}}</div>
    <div class="col-xs-6 text-right">{{Lang::get('base.uptime')}} 3 {{Lang::get('base.day')}} 14 {{Lang::get('base.hour')}} 33 {{Lang::get('base.minute')}} 15 {{Lang::get('base.second')}}</div>
</div>

<script src="/js/jquery-2.1.3.min.js"></script>
<script src="/js/overlay.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script type="text/javascript">
    
function login()
{
    $(".validation-error").html("");

    var jsonData = {};
    jsonData.username = $("#username").val();
    jsonData.password = $("#password").val();

    $.ajax({
        url:"login",
        method:"POST",
        data:jsonData,
        success:function(data)
        {
            if(data.status =="ok")
            {
                window.location.href="/";
            }
            else
            {
                $(".validation-error").html(data.info);
            }
        }
    })

}


function userKeyPress(event)
{
    if(event.keyCode == 13)
    {
        login();
    }
}

</script>


</body>
</html>