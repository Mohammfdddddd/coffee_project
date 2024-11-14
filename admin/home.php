
<html>
    <head>
    <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
     <link href="css/style.css" rel="stylesheet" type="text/css"/>
       <style>

        @keyframes slider {
            0% {left: 0}
            20% {left: 0}
            30% {left: -100%}
            45% {left: -100%}
            55% {left: -200%}
            70% {left: -200%}
            80% {left: -300%}
            100% {left: -400%}

            }

#slider {
	overflow: hidden
}

#slider figure img {
	width: 20%;
	float: left
}

#slider figure {
	position: relative;
	width: 500%;
	margin: 0;
	left: 10;
	text-align: left;
	font-size: 0;
	animation: 10s slider infinite
}

    </style>
    </head>
    <body>
        <div>
        <?php include 'include/header.php'; ?>
        </div>
        <br/><br/>
        <div class="home">
      
     <div style="padding:10px;background-color:#eee;height:auto;">
         <br/><br/><br/><br/><br/>
             <center >       
         <label style="text-align: center;font-size: 2.5rem;">WELCOME to My Admin</label>
        </center> 
        </div>
    <div id="slider">
    <figure>
        <img src="../images/order-img.jpg" alt="" width="700" height="500"/>
        <img src="../images/blog-2.jpeg" alt="" width="700" height="500"/>
        <img src="../images/blog-3.jpeg" alt="" width="700" height="500"/>
        <img src="../images/blog-1.jpeg" alt="" width="700" height="500"/>
        <img src="../images/about-img.jpeg" alt=""width="700" height="500"/>
    </figure>
    </div>
    <hr>
      </div>
</div>

<!-- home section ends -->


<script src="js/script.js" type="text/javascript"></script>

    </body>
</html>
