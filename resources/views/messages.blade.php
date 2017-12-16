<html>

<head>
    <title>Demo chat</title>
</head>
<body>
    <div class="container">
        <div style="font-size: 25px" align="center">
            <script type="text/javascript">
                farbbibliothek = new Array();
                farbbibliothek[0] = new Array("#FF0000","#FF1100","#FF2200","#FF3300","#FF4400","#FF5500","#FF6600","#FF7700","#FF8800","#FF9900","#FFaa00","#FFbb00","#FFcc00","#FFdd00","#FFee00","#FFff00","#FFee00","#FFdd00","#FFcc00","#FFbb00","#FFaa00","#FF9900","#FF8800","#FF7700","#FF6600","#FF5500","#FF4400","#FF3300","#FF2200","#FF1100");
                farbbibliothek[1] = new Array("#00FF00","#000000","#00FF00","#00FF00");
                farbbibliothek[2] = new Array("#00FF00","#FF0000","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00");
                farbbibliothek[3] = new Array("#FF0000","#FF4000","#FF8000","#FFC000","#FFFF00","#C0FF00","#80FF00","#40FF00","#00FF00","#00FF40","#00FF80","#00FFC0","#00FFFF","#00C0FF","#0080FF","#0040FF","#0000FF","#4000FF","#8000FF","#C000FF","#FF00FF","#FF00C0","#FF0080","#FF0040");
                farbbibliothek[4] = new Array("#FF0000","#EE0000","#DD0000","#CC0000","#BB0000","#AA0000","#990000","#880000","#770000","#660000","#550000","#440000","#330000","#220000","#110000","#000000","#110000","#220000","#330000","#440000","#550000","#660000","#770000","#880000","#990000","#AA0000","#BB0000","#CC0000","#DD0000","#EE0000");
                farbbibliothek[5] = new Array("#000000","#000000","#000000","#FFFFFF","#FFFFFF","#FFFFFF");
                farbbibliothek[6] = new Array("#0000FF","#FFFF00");
                farben = farbbibliothek[4];
                function farbschrift(){for(var b=0;b<Buchstabe.length;b++){document.all["a"+b].style.color=farben[b]}farbverlauf()}function string2array(b){Buchstabe=new Array();while(farben.length<b.length){farben=farben.concat(farben)}k=0;while(k<=b.length){Buchstabe[k]=b.charAt(k);k++}}function divserzeugen(){for(var b=0;b<Buchstabe.length;b++){document.write("<span id='a"+b+"' class='a"+b+"'>"+Buchstabe[b]+"</span>")}farbschrift()}var a=1;function farbverlauf(){for(var b=0;b<farben.length;b++){farben[b-1]=farben[b]}farben[farben.length-1]=farben[-1];setTimeout("farbschrift()",30)}var farbsatz=1;function farbtauscher(){farben=farbbibliothek[farbsatz];while(farben.length<text.length){farben=farben.concat(farben)}farbsatz=Math.floor(Math.random()*(farbbibliothek.length-0.0001))}setInterval("farbtauscher()",5000);

            text= "LARAVEL CHAT"; //h
            string2array(text);
            divserzeugen();
            //document.write(text);
            </script>
        </div>
        <div id="data" class="row">
            <div class="col-md-12 col-xs-8">
                @foreach($messages as $message)
                <p id="{{$message->id}}"><strong>{{$message->author}}</strong>: {{$message->content}}</p>
                @endforeach
            </div>
            {{$messages->links()}}
        </div>
        <a href="{{asset('del')}}" class="btn btn-danger" >Xóa cuộc trò chuyện</a>
        <div class="row">
            <div class="col-md-6 col-xs-8">
                <form action="send-message" method="POST">
                {{csrf_field()}}
                Tên của bạn: <input type="text" name="author" class="form-control" required >
                <br>
            </div>
            <div class="col-md-8 col-xs-10">
                Nhập nội dung: <textarea name="content" rows="5" style="width:100%" class="form-control" required ></textarea>
                <br><button type="submit" name="send" class="btn btn-primary">Send</button>
            </div>
            </form>
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.1/socket.io.js"></script>

            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script>
                
            var socket = io('http://localhost:6001')
            socket.on('chat:message',function(data){
                //console.log(data)
                if($('#'+data.id).length == 0){
                    $('#data').append('<p><strong>'+data.author+'</strong>: '+data.content+'</p>')
                }
                else{
                    console.log('Đã có tin nhắn')
                }
            })

            </script>
        </div>
    </div>
</body>

</html>