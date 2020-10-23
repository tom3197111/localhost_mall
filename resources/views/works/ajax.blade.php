<html><head>

    <head>
        <meta charset="UTF-8">
        <title>hello </title>
        <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
    </head>
   
    <div style="text-align:center;">
　<div style="margin:0 auto; width:200px;"> <h1>AJAX練習</h1></div>
</div>
    <body bgcolor="#cccccc">

        <h1>文章查詢</h1>
        請輸入文章編號：<input type="text" id="art_id">
        <input type="button" onclick="clickRadio()" id="cate" value="按鈕">
        <br>
        <h1><div id="a"></div></h1>
        <br>
        <div id="b"></div>
        <br>
        <div id="c"></div>

      


      <script type="text/javascript">
    function clickRadio(){
        var iid=$("#art_id").val();
        //$("#art_title").style.display=block;
        $.ajax({
            type:"GET",
            url:"/falcon/ajax/"+iid,
            //data: {'_token':"{{csrf_token()}}"},
            dataType:"html",
            success:function(result){
                if(result=='false'){
                    alert('請輸入正確文章編號')
            }else{
                
                var result1=$.parseJSON(result);
                $("#a").html(result1.art_tag);
                $("#b").html(result1.art_content);
                $("#c").html("<img src="+result1.file_upload+">");
            }           
            },

        });
    }

    </script>
    </body>
</html>
