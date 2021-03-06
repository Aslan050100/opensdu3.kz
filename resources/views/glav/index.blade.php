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
.posts{

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
#myBtn {
  display: none; /* Hidden by default */
  position: fixed; /* Fixed/sticky position */
  bottom: 20px; /* Place the button at the bottom of the page */
  right: 30px; /* Place the button 30px from the right */
  z-index: 99; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  background-color: red; /* Set a background color */
  color: white; /* Text color */
  cursor: pointer; /* Add a mouse pointer on hover */
  padding: 15px; /* Some padding */
  border-radius: 10px; /* Rounded corners */
  font-size: 18px; /* Increase font size */
}

#myBtn:hover {
  background-color: #555; /* Add a dark-grey background on hover */
}
.post_status_sign3 {
    width: 14px;
    height: 14px;    
    background-color: yellow;
    border-radius: 50%;
    box-shadow:
    -1px -1px 0 #fff,  
     1px -1px 0 #fff,
     -1px 1px 0 #fff,
      1px 1px 0 #fff;
      margin-right: 5px;
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
                <h1 class='project_title'>Open Sdu</h1>
                <p class="project_desc">Here short obisanye nawego projecta. Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                <form method="post" class="form_class" action="{{ route('glav.ad_post') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="rows">
                    <div class='row-one'>
                            <div class="input-box">
                                    <label class='input-box-label'>Hashtag</label>
                                    <!-- <input class='input-box-area' type="text" placeholder="Choose a hashtag..."> -->
                                    <select name="hash" id="inputState" class="form-options area">
				                    	<option> Choose hashtag...</option>
				                    	@foreach($hashtag_titles as $hashtag_title)
				 							<option>{{$hashtag_title->hash_title}}</option>
				                    	@endforeach
				                    </select>
                            </div>
                            <div class="input-box">
                                    <label class='input-box-label'>Title</label>
                                    <input class='input-box-area' name="title" type="text" placeholder="Enter your title...">
                            </div>
                            <div class="add_img_block">
				                  <label class="form_label">Add Image</label> 
				                  <input type="file" name="img"><br>
				                  <input type ="hidden" name = "_token" value="{{ csrf_token() }}">
			                </div>
                    </div>
                    <div class='row-two'>
                        <textarea class='text-area' name="text" placeholder="Write your suggest here..."></textarea>
                        <button class='button-suggest' type="submit">Suggest</button>
                    </div>
                </div>
                  </form>
                <div class='help-block'>
                    <h6 class='help-text'>If you have some problems, please go to <a href="#">Help</a>.</h6>
                    
                </div>
           
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
                                <a href="{{route('glav.add_like',[$suggest->id])}}">Like</a>
                                <span>{{$suggest->like}}</span>
                            </div>    
                            <div class='post_footer'>
                                 <!-- <a href="#"><h6 class='comments_title'>Comments  </h6></a>     -->
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

							
                                <a href="{{route('glav.get_hashtag',[$suggest->hashtag_id])}}">
                                	<h6 class="hash_name">#{{ $suggest->hashtag->hash_title}}</h6></a>
                                <!-- <a href="{{route('glav.report',[$suggest->id])}}">Report {{$suggest->report}}</a> -->

                            </div>
                        </div>
                        <div class='post_div_right'>
                            <div class="post_status">
								        <?php if($suggest->solve == 'solved') : ?>
                                    <span class="post_status_sign"></span>
                                    <a href="{{route('glav.active')}}"><h6 class='post_status_title'>{{$suggest->solve}}</h6></a>
								        <?php elseif($suggest->solve == 'unsolved'): ?>
                        <span class="post_status_sign2"></span>
                                    <h6 class='post_status_title'>{{$suggest->solve}}</h6>
                        <?php else : ?>
									<span class="post_status_sign3"></span>
                                    <h6 class='post_status_title'>{{$suggest->solve}}</h6>
								        <?php endif; ?>
                                
                            </div>
                            <img class='post_img' src="{{asset('assets/img/'.$suggest->img)}}"> 
                            <div><a href="{{route('glav.report',[$suggest->id])}}">Report {{$suggest->report}}</a></div>
                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <span class="pagination">{{$suggests->links()}}</span>
            <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
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
//Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
    </script>
</body>
</html>