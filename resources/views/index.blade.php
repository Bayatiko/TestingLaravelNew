<!DOCTYPE html>
<html>
<head>
    <title>Todos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-9">
            <h1 id="todos">todos</h1>
            <form id="inputform" name="myform"  method="post" action="/TestingLaravel/public/add">
                {{ csrf_field() }}
                <input type="text" placeholder="What needs to be done?" class="input" name="text" id="target" >
                <input type="checkbox" id="button"  >
            </form>
            {{--<a class="btn btn-success" href="#" onclick="save()">Save</a>--}}
            @foreach($lesson as $lessons)
                <ul class="list-group">
                    <li class="list-group-item">
                        <form method="post" action="/TestingLaravel/public/change">
                            {{ csrf_field() }}
                            <input type="checkbox" name="esiminch" id="checking" class="checking" style="position:absolute;top:25px;">
                            <span><input type="text" name="textarea" class="inputing" value="{{$lessons->text}}" disabled style=" padding-right: 237px;
    padding-top: 15px;"></span>
                            <input type="hidden" name="id" value="{{$lessons->id}}">
                            <a href="/TestingLaravel/public/delete/{{$lessons->id}}" id="icon">x</a>
                        </form></li>
                </ul>
            @endforeach
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <div class="items_count"><span>{{ count($lesson) }}</span> items left</div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-all">All</button>
                        <button type="button" class="btn btn-primary btn-active">Active</button>
                        <button type="button" class="btn btn-primary btn-completed">Completed</button>
                    </div></a><!---<a href="/TestingLaravel/public/deletechecked/">delete completed</a>---></div>

            <p class="text">Double-click to edit a todo</p>
        </div>



<script type="text/javascript">
    $(document).on('click', "#icon", function(event){
        event.preventDefault();

        var $this = $(this);

        $.get($(this).attr('href'), function(){
            $this.parents('ul.list-group').remove();

            $(".items_count span").text($("ul.list-group").filter(function(){
                return !$(this).find(".checking").is(':checked');
            }).length);
        });
    });


    $("#inputform").submit(function(event){
        event.preventDefault();

        var $this = $(this);
        $.ajax({
            type: $this.attr('method'),
            url: $this.attr('action'),
            data: $this.serialize(),
            success: function(res){
                $this.children('.input').val('').blur();

                $("ul.list-group").remove();
                $('#inputform').after($(res).find('ul.list-group'));

                $(".items_count span").text($("ul.list-group").filter(function(){
                    return !$(this).find(".checking").is(':checked');
                }).length);


                $(".list-group span").dblclick(function(){
                    $(this).children('input').prop('disabled', false).focus();
                });


                $('.checking').click(function() {
                    if ($(this).is(':checked')) {
                        $(this).next("span").children(".inputing").css("text-decoration", "line-through");

                    }else{
                        $(this).next("span").children(".inputing").css("text-decoration", "none");
                    }

                    $(".items_count span").text($("ul.list-group").filter(function(){
                        return !$(this).find(".checking").is(':checked');
                    }).length);
                });


                $('.list-group-item > form').submit(function(event){
                    event.preventDefault();

                    var $this = $(this);
                    $.ajax({
                        type: $this.attr('method'),
                        url: $this.attr('action'),
                        data: $this.serialize(),
                        success: function(res){
                            $this.find('span input').prop('disabled', true);
                        }
                    });
                });
            }
        });
    });


    $('.list-group-item > form').submit(function(event){
        event.preventDefault();

        var $this = $(this);
        $.ajax({
            type: $this.attr('method'),
            url: $this.attr('action'),
            data: $this.serialize(),
            success: function(res){
                $this.find('span input').prop('disabled', true);
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(".list-group span").dblclick(function(){
            $(this).children('input').prop('disabled', false).focus();
        });

        $("#button").click(function(){
            $('.checking').prop('checked', true);
        });

        /*checkbox*/
        $('.checking').click(function() {
            if ($(this).is(':checked')) {
                $(this).next("span").children(".inputing").css("text-decoration", "line-through");

            }else{
                $(this).next("span").children(".inputing").css("text-decoration", "none");
            }

            $(".items_count span").text($("ul.list-group").filter(function(){
                return !$(this).find(".checking").is(':checked');
            }).length);
        });
        /*yndhanur checkbox*/
        $('#button').click(function() {
            if ($(this).is(':checked')) {
                $(".inputing").css("text-decoration", "line-through");

            }else{
                $(".inputing").css("text-decoration", "none");
            }
        });

        $(".btn-all").click(function(){
            $("ul.list-group").show();
        });

        $(".btn-active").click(function(){
            $("ul.list-group").hide().filter(function(){
                return !$(this).find(".checking").is(':checked');
            }).show();
        });

        $(".btn-completed").click(function(){
            $("ul.list-group").hide().filter(function(){
                return $(this).find(".checking").is(':checked');
            }).show();
        });
/* function checked(){
 return $(".inputing").css("text-decoration", "none");

 */
    });
</script>
<script type="text/javascript" src="js/script.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
