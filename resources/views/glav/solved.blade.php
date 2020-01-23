<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Open SDU</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<style type="text/css">
		.pagination{
            display: flex;
            padding-left: 100px;

        }
.pagination li{
    margin-right: 40px;
color:red;
}
.post_div {
    
    display:flex;
    justify-content:space-between;
    
}
.project_title{
	font-size: 75px;
}
.collapsible {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .collapsible:hover {
  background-color: #ccc;
}

/* Style the collapsible content. Note: hidden by default */
.content {
  padding: 0 18px;
  display: none;
  color: black;
  overflow: visible;
  background-color: #f1f1f1;
}
	</style>

</head>
<body>
    <header> 
        <div class='header'>
            <a href="{{route('glav.get_post')}}"><img class='sdu-logo' src="{{ asset('assets/img/sdu-logo.png') }}"></a>
            <button class="button-join">Join</button>
        </div>
    </header>
        <div class="container"> 
        	<div class='add_suggest'>
                <h1 class='project_title'>Solved Suggests</h1>
            </div>
       	@foreach ($suggests as $suggest)
            <div class="posts">
                <div class='post'>
                    <div class='like_block'>
                    </div>
                    <div class="post_div">
                        <div class='post_div_left'>
                            <div class='post_content'>
                                <h1 class='post_title'>{{ $suggest->title }}</h1>

                                <p class="post_text">{{$suggest->text}}</p>
                            </div>    
                            <div class='post_footer'>
                                <button type="button" class="collapsible">Comments</button>
                                    <div class="content">
                                         <div class="col-md-8 col-md-offset-2">
                                            @foreach($suggest->comments as $comment)
                                                <div class="comment">
                                                    <p><strong>Name: </strong>{{$comment->name}}</p>
                                                    <p><strong>Comment: </strong></br> {{$comment->comment}}</p>
                                                </div>
                                            @endforeach
                                         </div>
                                    </div>
                                    <button type="button" class="collapsible">Add comment</button>
                                    <div class="content">
                                         <div class="col-md-8 col-md-offset-2">
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
                                <!-- <a href="#"><h6 class='comments_title'>Comments  </h6></a> -->
                                <a href="{{route('glav.get_hashtag',[$suggest->hashtag_id])}}">
                                	<h6 class="hash_name">#{{ $suggest->hashtag->hash_title}}</h6></a>
                            </div>
                        </div>
                        <div class='post_div_right'>
                            <div class="post_status">
								<?php if($suggest->solve == 'solved') : ?>
                                    <span class="post_status_sign"></span>
								<?php else : ?>
									<span class="post_status_sign2"></span>
								<?php endif; ?>
                                <h6 class='post_status_title'>{{$suggest->solve}}</h6>
                            </div>
                            <img class='post_img' src="{{asset('assets/img/'.$suggest->img)}}"> 
                            <div><a href="{{route('glav.report',[$suggest->id])}}">Report {{$suggest->report}}</a></div>
                             <!-- <a href="{{route('glav.add_like',[$suggest->id])}}"><button class="like_button"><img class="plus-png" src="assets/img/plus.png">{{$suggest->like}}</button></a> -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <span class="pagination">{{$suggests->links()}}</span>
        </div>
    <footer>
        <div class='footer'>
            contact us: +77773332211 gmail:opensdu@gmail.com
        </div>
    </footer>
    <script type="text/javascript">
        var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
    </script>
</body>
</html>