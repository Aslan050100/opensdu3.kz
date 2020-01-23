<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
</head>
<body>

<div class="mainbody container-fluid">
        <div class="row">
            <div style="padding-top:50px;"> </div>
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="panel-title pull-left" style="font-size:30px;"><i class="fa fa-cogs" aria-hidden="true"></i> Edit Suggest</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="panel-title pull-left" style="font-size:30px;">Suggest</h1>
                    </div>
                </div>
                <form action = "{{route('admin.edit',[$suggest->id])}}" method = "post">
                    {{csrf_field()}}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="panel-title pull-left">Your Title</h3>
                        <br><br>

                        <label for="title">Your Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$suggest->title}}" value="">
                        <label>Your Text</label>
                        <textarea name="text" class="form-control" rows="3">{{$suggest->text}}</textarea>
                        <label for="Last_name">Hashtag</label>
                        <input type="text" name="hashtag" class="form-control" id="hashtag" value="{{$suggest->hashtag->hash_title}}" value="">
                    </div>
                </div>
                
                

                <hr>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="{{route('admin.index')}}" class="btn btn-default"><i class="fa fa-fw fa-times" ></i> Cancel</a>
                        <button type = "submit" class="btn btn-primary"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Update Suggest</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
