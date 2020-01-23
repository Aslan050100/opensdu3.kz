<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Open Sdu</title>
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
			display: flex;
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
		.post_status3 {
			position: absolute;
			right: 20px;
			top: -5px;
			font-size: 16px;
			color:yellow;
			display:flex;
			flex-direction:row;
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
	<div class="container">
	<div class="post_div_title">
	<h1 class="container_title">Edit Page</h1>
	<a href="{{route('user.logout')}}">Logout</a>
	@foreach ($suggests as $suggest)
	@if($suggest->img != null)
		<div class="post_div">	
			
			<div class="post_div_l">
				@if($suggest->check == 1)
				<h3>Suggest Posted</h3>
				@endif
				<h1 class="post_title">{{ $suggest->title }}</h1>	 
				<p class="post_content">{{$suggest->text}}</p>
				<a href="{{route('glav.get_hashtag',[$suggest->hashtag_id])}}"><h4 clas="post_title">#{{ $suggest->hashtag->hash_title}}</h4></a>
				<a href="{{route('admin.delete',[$suggest->id])}}">Delete</a>
				<a href="{{route('admin.solve',[$suggest->id])}}">Solved!</a>
				<a href="{{route('admin.partialSolve',[$suggest->id])}}">Partial Solved!</a>
				<a href="{{route('admin.post',[$suggest->id])}}">Post</a>
				<a href="{{route('admin.indexEdit',[$suggest->id])}}">Edit</a>
				<button class="like_button">{{$suggest->like}}</button>

			</div>
			<div class="post_div_r">
				<div class="post_status">
					<?php if($suggest->solve == 'solved') : ?>
				    	<h6 class="post_status">{{$suggest->solve}}</h6>

					<?php elseif($suggest->solve == 'unsolved'): ?>
						     <h6 class="post_status2">{{$suggest->solve}}</h6>
					<?php else : ?>
					     <h6 class="post_status3">{{$suggest->solve}}</h6>
					<?php endif; ?>
						
				</div>
				<img class="post-img" src="{{asset('assets/img/'.$suggest->img)}}">
			</div>
		</div>
		@else
		<div class="post_div">	
			
			<div class="post_div_l">
				@if($suggest->check == 1)
				<h3>Suggest Posted</h3>
				@endif
				<h1 class="post_title">{{ $suggest->title }}</h1>	 
				<p class="post_content">{{$suggest->text}}</p>
				<a href="{{route('glav.get_hashtag',[$suggest->hashtag_id])}}"><h4 clas="post_title">#{{ $suggest->hashtag->hash_title}}</h4></a>
				<a href="{{route('admin.delete',[$suggest->id])}}">Delete</a>
				<a href="{{route('admin.solve',[$suggest->id])}}">Solved!</a>
				<a href="{{route('admin.partialSolve',[$suggest->id])}}">Partial Solved!</a>
				<a href="{{route('admin.post',[$suggest->id])}}">Post</a>
				<button class="like_button">{{$suggest->like}}</button>

			</div>
			<div class="post_div_r">
				<div class="post_status">
					<?php if($suggest->solve == 'solved') : ?>
				    	<h6 class="post_status">{{$suggest->solve}}</h6>
					<?php else : ?>
					     <h6 class="post_status2">{{$suggest->solve}}</h6>
					<?php endif; ?>
						
				</div>
				
			</div>
		</div>
	@endif
	@endforeach
	</div>

	</div>
</body>
</html>