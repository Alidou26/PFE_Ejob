<!DOCTYPE html>
<html>
<head>
	<title>Nous Contacter</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
		body{
			line-height: 1.5;
			font-family: 'Poppins', sans-serif;
		}
		*{
			margin:0;
			padding:0;
			box-sizing: border-box;
		}
		.container{
			max-width: 1170px;
			margin:auto;
		}
		.row{
			display: flex;
			flex-wrap: wrap;
		}
		ul{
			list-style: none;
		}
		.footer{
			background-color: #111;
			padding: 70px 0;
		}
		.footer-col{
		   width: 25%;
		   padding: 0 15px;
		}
		.footer-col h4{
			font-size: 18px;
			color: #ffffff;
			text-transform: capitalize;
			margin-bottom: 35px;
			font-weight: 500;
			position: relative;
		}
		.footer-col h4::before{
			content: '';
			position: absolute;
			left:0;
			bottom: -10px;
			background-color: #2a41e8;
			height: 2px;
			box-sizing: border-box;
			width: 50px;
		}
		.footer-col ul li:not(:last-child){
			margin-bottom: 10px;
		}
		.footer-col ul li a{
			font-size: 16px;
			font-weight: bold;
			text-transform: capitalize;
			color: #ffffff;
			text-decoration: none;
			font-weight: 300;
			color: #fff;
			display: block;
			transition: all 0.3s ease;
		}
		.footer-col ul li a:hover{
			color: #ebedf8;
			padding-left: 8px;
		}
		.footer-col .social-links a{
			display: inline-block;
			height: 40px;
			width: 40px;
			background-color: rgba(255,255,255,0.2);
			margin:0 10px 10px 0;
			text-align: center;
			line-height: 40px;
			border-radius: 50%;
			color: #ffffff;
			transition: all 0.5s ease;
		}
		.footer-col .social-links a:hover{
			color: #2a41e8;
			background-color: #ebedf8;
		}
		
		/*responsive*/
		@media(max-width: 767px){
		  .footer-col{
			width: 50%;
			margin-bottom: 30px;
		}
		}
		@media(max-width: 574px){
		  .footer-col{
			width: 100%;
		}
		}
		</style>
</head>
<body>
	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Nous Contacter</h2>
				<form action="contactAction.php" method="POST">
				<input type="text" class="field" placeholder="Votre Nom" name="nom">
				<input type="text" class="field" placeholder="Votre Email" name="email">
				<input type="text" class="field" placeholder="Numéro de Téléphone" name="telephone">
				<textarea placeholder="Votre Message" class="field" name="message"></textarea>
				<button type="submit" class="btn">Envoyer</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>