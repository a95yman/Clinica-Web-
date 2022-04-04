<html>
<head>
    <title>Clinica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="style.css"/>
    </head>
    <body oncontextmenu="return false;">
         <div id="blue-line"></div>
            <div id="box1">
                <div id="dv1">
                    <div id="inner">
                    <img id="logo" src="images/logo.png"/>
                       
                    <h1 >Welcome Back!</h1>
                        <p>Login to your account and manage your tasks easily, or sign up for a new account if you are new here!</p>
                    <button name="bt1" onclick="f()">Sign Up instead</button>
                    </div>
                </div>
                <div id="dv2">
                    <div id="login">
                        <div style="flex:1;height:100%;display:flex;justify-content:center;padding-left:2vw;flex-direction:column">
                        <h1>Login to your account</h1>
                            <p class="p1">Your connection is highly secured, do not worry!</p>
                            <input style="margin-top:2vw" type="text" placeholder="Identifiant"/>
                            <input type="password" placeholder="Mot de passe"/>
                            <button class="bt1">Login</button>
                             <button class="bt2" onclick="f2()">Sign Up</button>
                        </div>
                        <img src="images/sticker1.png" id="sticker1"/>
                    </div>
                    <div id="signup">
                        <div style="flex:1;height:100%;display:flex;justify-content:center;padding-left:2vw;flex-direction:column">
                        <h1 >Create new account</h1>
                            <p class="p1">Get to manage multiple tasks easily, choose your role and start processing from now!</p>
                            <input style="margin-top:2vw" type="text" placeholder="Identifiant"/>
                            <input type="password" placeholder="Mot de passe"/>
                            <input type="password" placeholder="Confitmer mot de passe"/>
                            <button class="bt1">Sign Up</button>
                            <button class="bt2" onclick="f3()">Login</button>
                        </div>
                        <img src="images/sticker1.png" id="sticker1"/>
                    </div>
                </div>
        </div>
        <script type="text/javascript">
            var cs=0;
        function f(){
    if(cs==0){
        document.getElementById("login").style.display="none";
         document.getElementById("signup").style.display="flex";
        document.getElementsByName("bt1")[0].innerHTML="Login Instead";
        cs=1;
    }
            else{
        document.getElementById("login").style.display="flex";
         document.getElementById("signup").style.display="none";
        document.getElementsByName("bt1")[0].innerHTML="Sig Up Instead";
                cs=0;
    }
        }
            function f2(){
        document.getElementById("login").style.display="none";
         document.getElementById("signup").style.display="flex";
        document.getElementsByName("bt1")[0].innerHTML="Login Instead";
        cs=1;
    }
             function f3(){
        document.getElementById("login").style.display="flex";
         document.getElementById("signup").style.display="none";
        document.getElementsByName("bt1")[0].innerHTML="Sig Up Instead";
                cs=0;
    }
</script>
    </body>
</html>