<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Open Sdu</title>
	  <script src="{{ asset('js/app.js') }}"></script>
	  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		body{
			margin:0;
			padding:0;
			font-family: 'Montserrat', sans-serif;
		}
		a {
			text-decoration:none;
			color: #E26B27;
			text-align: center;
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
			display: block;
			flex-direction: row;
			justify-content: left;
			margin-left: 10%;
		}
		.post_div{
			border: 1px solid #E26B27;
			width: 600px;
			height: 230px;
			display: flex;
			flex-direction:row;
			padding:20px 30px;
			margin: 35px 0;
			position: relative;
			box-shadow:-2px 2px 15px grey;  
			border-radius: 7px;
			transition: all .5s ease-in-out;
  			transform: scale(1);

		}
		.post_div:hover {
			transform: scale(1.03);
		}

		.post-img{
			width: 160px;
			height: 160px;
			position:absolute;
			right: 20px;
			bottom: 45px;
		}
		.post_div_r{
			display: flex;
			flex-direction:column;
		}
		.post_div_l{
			display: block;
		}
		header {
			position:relative;
		}
		.header_block {
			display: flex;
			position: absolute;
			right: 30px;			
		}
		.header{
			height:57px;
			box-shadow:-2px 2px 15px grey;  
		}
		.header a{
			margin: 20px 20px;
		}
		.plus-png {
			width:15px;
			height:15px;
			margin:0 2px;
		}
		.like_button {
			background-color: white;
			border: 1px solid green;
			border-radius: 20px;
			text-align:center;
			font-size: 18px;
			color: green;
			padding: 0px 10px;
			position:absolute;
			bottom:30px;
		}
		.fixed-box {
			border: 2px solid #E26B27;
			border-right:none;
			border-top-left-radius:5px;
			border-bottom-left-radius:5px;
			padding: 15px;
			width: 330px;
			height: 250px; 
			position:fixed;
			right: 0;
			top: 35%;
		}
		.container_title {
			font-size: 40px;
			color: #C65312;
		}
		.pen-img {
			width:22px;
			height: 22px;
			padding: 0 7px;
		}
		
		.add_post {
			width: 100%;
			text-align: center;
			font-size: 20px;
			font-weight: 200;
			background-color: #CA500B;
			color: white;
			padding: 10px;
			box-shadow:-2px 2px 15px grey;  
			border-radius: 7px;
		}
		.add_post:hover {
			color:black;
			background-color: white;
			border: 1px solid #E26B27;
			cursor:pointer;
		}
		.add_post:hover .pen-img {
			filter: brightness(0%);
		}
		.post_status {
			position: absolute;
			right: 20px;
			top: -5px;
			font-size: 16px;
			color:green;
			display:flex;
			flex-direction:row;
		}
		.post_status2 {
			position: absolute;
			right: 20px;
			top: -5px;
			font-size: 16px;
			color:red;
			display:flex;
			flex-direction:row;
		}
		.pagination{
			display: flex;
			padding-left: 100px;
		}
		.pagination li{
			margin-right: 40px;

		}
		
		/* .post_status_sign {
			width:10px;
			height:10px;
			border-radius:50%;
			background-color: green;
			margin: 36.5px 0 36px 5px;
		} */
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
	<div class="post_div_title">
	<h1 class="container_title">{{ $suggest->title }}</h1>
		<div class="post_div">	
			<div class="post_div_l">
				<h1 class="post_title">{{ $suggest->title }}</h1>	 
				<p class="post_content">{{$suggest->text}}</p>
				<a href="{{route('glav.get_hashtag',[$suggest->hashtag_id])}}"><h4 clas="post_title">#{{ $suggest->hashtag->hash_title}}</h4></a>
			<!-- <button onclick="actOnChirp(event);" data-chirp-id="{{ $suggest->id }}">Like</button>
                    <span id="likes-count-{{ $suggest->id }}">{{ $suggest->like }}</span> -->
					<a href="{{route('glav.add_like',[$suggest->id])}}"><button class="like_button"><img class="plus-png" src="assets/img/plus.png">{{$suggest->like}}</button></a>
					<a href="{{route('glav.report',[$suggest->id])}}">Report {{$suggest->report}}</a>
			</div>
			<div class="post_div_r">
				<div class="post_status">
					<?php if($suggest->solve == 'active') : ?>
				    	<h6 class="post_status">{{$suggest->solve}}</h6>
					<?php else : ?>
					     <h6 class="post_status2">{{$suggest->solve}}</h6>
					<?php endif; ?>
						
				</div>
				<img class="post-img" src="{{asset('assets/img/'.$suggest->img)}}">

			</div>
		</div>
	
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@foreach($suggest->comments as $comment)
				<div class="comment">
					<p><strong>Name: </strong>{{$comment->name}}</p>
					<p><strong>Comment: </strong></br> {{$comment->comment}}</p>
				</div>
			@endforeach

		</div>
	</div>

	<div class="row">
		<div class="comment-form" class='col-md-8 col-md-offset-2' style="margin-top:50px;">
			{{Form::open(['route'=>['comments.store',$suggest->id],'method'=>'POST'])}}
				<div class="row">
					<div class='col-md-6'>
						{{Form::label('name',"Name: ")}}
						{{Form::text('name',null,['class'=>'form-control'])}}
					</div>
					<div class="col-md-12">
						{{Form::label('comment',"Comments: ")}}
						{{Form::textarea('comment',null,['class'=>'form-control'])}}
						{{Form::submit('Add comment',['class'=> 'btn btn-success btn-block','style'=>'margin-top:15px;'])}}
					</div>
				</div>
			{{Form::close()}}
		</div>
	</div>
	<div class="fixed-box">
		<p>If problems have solved, please contact to us. So we will remove them.</p>
	</div>
	</div>

	
</body>
</html>