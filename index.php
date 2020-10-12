<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up/In</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="FA/css/all.min.css">
    <link rel="stylesheet" href="CSS/custom.css">
    <script src="FA/js/all.min.js"></script>
    <script src="JS/jquery-3.5.1.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
</head>
<body id='ThyBody'>
    <?php 
 //   if(isset($_SESSION['logedin']))
   // include 'pages/home.html';
   // else
  //  include 'pages/signin.html';
    ?>

    <script src="JS/custom.js"></script>
    <script>
        var user,userid;
        if (document.cookie) {
		user = document.cookie
			.split('; ')
			.find(row => row.startsWith('username'))
            .split('=')[1];
        userid = document.cookie.split('; ')
        .find(row => row.startsWith('userid')).split('=')[1];    
	}
        if(sessionStorage.getItem('username') && sessionStorage.getItem('logedin') )
        gotoHome();
        else if(user!=null && userid!=null){
            sessionStorage.setItem("logedin", 1);
            sessionStorage.setItem("userid", userid);
            sessionStorage.setItem("username", user);
            gotoHome();
        }
        else
        gotoSignIn();
    </script>
</body>
</html>