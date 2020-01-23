<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Open Sdu</title>
	<style type="text/css">
		body {
			margin:0;
			padding:0;
			font-family: 'Montserrat', sans-serif;
		}
		.post_div{
			border: 1px solid red;
			width: 800px;
			height: 300px;
			display: inline-flex;
		}
		.post_div_r img{
			width: 400px;
			height: 300px;
		}
		.post_div_r{
			display: block;
		}
		.post_div_l{
			display: block;
		}
		.header{
			display: flex;
		}
		header {
			position:relative;
		}
		.header_block {
			display: flex;
			position: absolute;
			right: 30px;			
		}
		a {
			text-decoration:none;
			color: #C65312;
			text-align: center;
		}
		a:hover {
			cursor:pointer;
			border-bottom: 1px solid #C65312;
			padding-bottom: 2px;
		}
		.header{
			height:57px;
			border-bottom: 1px solid #C65312;
			box-shadow:-2px 2px 15px grey;  
		}
		.header a{
			margin: 20px 20px;
		}
		header a{
			color: black;
			font-weight:bolder;
		}
		header a:hover {
			cursor:pointer;
			border-bottom: 1px solid #E26B27;
			padding-bottom: 2px;
			color:#C65312;
		}
		.container {
			display:flex;
			justify-content: center;
			padding: 100px;
		}
		.form-group {
			display:flex;
			flex-direction: column;
		}
		.form_class {
			width: 450px;
			height: 700px;
			position:relative;
		}
		.form_label {
			font-weight: 600;
			margin: 15px 0 10px 0;
			font-size: 18px;
			color: #532003;
		}
		.form-title {
			height: 25px;
		}
		.form-text-area {
			padding: 7px;
			height: 70px;
		}
		.form-options {
			height: 30px;
			background-color: white;
		}
		.add-sug {
			background-color: #CA500B;
			color: white;
			width: 300px;
			height: 40px;
			position: absolute;
			left: 17%;
			margin: 30px;
			margin-left:0px;
			padding: 5px;
			font-size:12px;
			border-radius:5px;
		}
		.add-sug:hover {
			color:black;
			background-color: white;
			border: 1px solid #E26B27;
			cursor:pointer;
		}
		.card-title {
			text-align:center;
			font-weight: bolder;
			font-size: 35px;
			color:#C65312;
		}
		.add_img_block {
			margin: 20px 0;
		}
		.add_sug:hover {
			color:#C65312;
			cursor: pointer;
			border: 1px solid #C65312;
			background-color: white;
		}
		.area {
			border-radius: 5px;
			border:1px solid #AEABAB;
		}
	</style>
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
<header>
	<div class="header">
		<div class="header_block">
			<a href="{{route('glav.get_post')}}" class="active">Home</a>
			<a>About Us</a>
			<a>Contacts</a>
		</div>
		</div>
	</header>
	<div class="container">
		<article class="card-body">
			<h1 class="card-title">Add Your Suggest! :)</h1>
            <form method="post" class="form_class" action="{{ route('glav.ad_post') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col form-group">
					<div class="form-group col-md-6">
                    <label class="form_label">Hashtag</label>
                    <select name="hash" id="inputState" class="form-options area">
                    	<option> Choose hashtag...</option>
                    	@foreach($hashtag_titles as $hashtag_title)
 							<option>{{$hashtag_title->hash_title}}</option>
                    	@endforeach
                    </select>
                </div>
                        <label class="form_label">Title </label>
                        <input name="title" type="text" class="form-title area" placeholder="">
                    </div> <!-- form-group end.// -->
                    <div class="col form-group">
                        <label class="form_label">Your Suggest</label>
                        <textarea type="text" name="text" class="form-text-area area" placeholder="Write here..."></textarea>
                    </div> <!-- form-group end.// -->
                </div > <!-- form-row end.// -->
				<div class="add_img_block">
                  <label class="form_label">Add Image</label> 
				  <input type="file" name="img"><br>
                  <input type ="hidden" name = "_token" value="{{ csrf_token() }}">
				</div>
			<button class="add-sug" type="submit">Add Your Suggest</button>				
            </form>

	</div>
</body>
</html>