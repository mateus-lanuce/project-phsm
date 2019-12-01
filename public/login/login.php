  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <title>Entrar</title>
      <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
      
  <style>

* {
  margin: 0;
  padding: 0;
  list-style: none;
}
body {
   background-color: rgb(52, 58, 64);
   font-family: Roboto, Arial, sans-serif;
}
.login {
  width: 400px;
  padding: 1% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 400px;
  margin: 0 auto 100px;
  padding: 45px;
  margin-top: 48px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #363636;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #1E90FF;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 16px;
}
.form .message a {
  color: #4169E1;
  text-decoration: none;
}
.form .messagea a {
  color: #4169E1;
  text-decoration: none;
  font-size: 26px;
}
.form .registro {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
.botao01{
  border-radius: 3px;
  box-shadow: 0 3px 0 rgba(0, 0, 0, .3), 0 2px 7px rgba(0, 0, 0, 0.2);
  color: #191970;
  display: block;
  font-family: "Trebuchet MS";
  font-size: 20px;
  font-weight: bold;
  line-height: 25px;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  text-shadow:1px 1px 0 #FFF;
  padding: 5px 15px;
  position: relative;
  width: 100px;
}
#a-login {
  color: black;
  text-decoration: none;
}
  </style>
</head>

  <body>
     <section class="form-section">
     <div class="login">
     <div class="form"> 
          <form>
            <center>
              <img src="../imgs/icon3.png" height="200px"><br>
              <h5>ENTRAR</h5><br>
            </center>

            <input type="password" placeholder="Email" id="login-email"/>

            <input type="text" placeholder="Senha" id="login-password"/>

            <button type="submit" class="btn-login">Entrar</button>

            <center>
              <br>
              <a href="../Register/Register.php" id="a-login">Cadastre-se</a>
            </center>
          </form>
    
      </section>

      <script src="script.js"></script>
    </body>
  </html>
