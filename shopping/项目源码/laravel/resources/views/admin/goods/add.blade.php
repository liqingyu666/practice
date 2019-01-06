@extends("admin.public.common")
@section('main')
<link rel="stylesheet" href="/up/uploadify.css">
<script src="/up/jquery.uploadify.min.js"></script>
   <script type="text/javascript" charset="utf-8" src="/baidu/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/baidu/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/baidu/lang/zh-cn/zh-cn.js"></script>
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>商品管理</a> <a href="#" class="current">商品添加</a> </div> </div>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
         
        </div>
        <div class="widget-content nopadding">
          <form action="/admin/goods" method="post" class="form-horizontal">
              {{csrf_field()}}
            <div class="control-group">
              <label class="control-label">商品名 :</label>
              <div class="controls">
                <input type="text" name="title" class="span11" placeholder="请输入商品名" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">商品简介 :</label>
              <div class="controls">
              <textarea name="info" id="" placeholder="请输入商品的简介" cols="30" rows="10"></textarea>

              </div>
            </div>
            <div class="control-group">
              <label class="control-label">商品所属分类 :</label>
              <div class="controls">
                <select name="cid" id="">
                  <option value="">请选择商品分类</option>
                  @foreach($data as $value)
                  @if($value->size==2)
                  <option value="{{$value->id}}">{{$value->html}}</option>
                  @else
                  <option disabled value="{{$value->id}}">{{$value->html}}</option>
                  @endif
                  
                  @endforeach
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">商品价格 :</label>
              <div class="controls">
                <input type="text" name="price" placeholder="请输入商品价格" class="span11" />
               
            </div>
              <div class="control-group">
              <label class="control-label">商品库存 :</label>
              <div class="controls">
                <input type="text" name="num" placeholder="请输入商品库存" class="span11" />
               
            </div>
             <div class="control-group">
              <label class="control-label">商品封面图片 :</label>
              <div class="controls">
                <input type="file" placeholder="请输入商品图片" class="span11" id="uploads" />
                <div id="main">
                  
                </div>
                <input type="hidden" name="img" id="imgs">
               
            </div>
             <div class="control-group">
              <label class="control-label">商品多图片 :</label>
              <div class="controls">
                <input type="file" placeholder="请输入商品图片" class="span11" id="uploads1" />
                <div id="main1">
                  
                </div>
                <input type="hidden" name="imgs" id="imgs1">
               
            </div>
            <div class="control-group">
              <label class="control-label">商品简介 :</label>
              <div class="controls">
                 <script id="editor" type="text/plain" name="text" style="width:100%;height:260px;"></script>
             

              </div>
               <div class="control-group">
              <label class="control-label">商品的配置信息 :</label>
              <div class="controls">
                 <script id="editor1" type="text/plain" name="config" style="width:100%;height:260px;"></script>
             

              </div>
                <div class="form-group pull-right">
                <input type="submit" value="提交" class="btn btn-success" onclick="add()">
                <input type="reset" value="重置" id="reset" class="btn btn-danger">
                </div>
            </div>
       <script>
  //当所有的HTML代码都加载完毕
   $(function() {
    //商品详情的百度编辑器的使用
    var ue=UE.getEditor('editor');
    var ue1=UE.getEditor('editor1');
    //声明字符串
    var imgs='';
    //使用uploadify 插件
    $('#uploads').uploadify({
      // //设置文本
      'buttonText' : '商品图片上传',
      //设置文件传输数据
      'formData'   :{
        '_token':'{{csrf_token()}}',
        'files':'goods',
      },
      //上传的flash动画
      'swf':"/up/uploadify.swf",
      //文件上传的地址
      'uploader' : "/admin/shangchuan",
      //当文件上传成功
      'onUploadSuccess' : function(file, data, response){
        //拼接图片
        imgs="<img width='200px' src='/Uploads/goods/"+data+"'/>";
        //展示图片
        $("#main").html(imgs);
        $("#imgs").val(data);
      }
    });
    //商品的多图片上传

     //声明字符串
    var imgs1='';
    var arr=[];
    //使用uploadify 插件
    $('#uploads1').uploadify({
      // //设置文本
      'buttonText' : '多图片上传',
      //设置文件传输数据
      'formData'   :{
        '_token':'{{csrf_token()}}',
        'files':'goods',
      },
      //上传的flash动画
      'swf':"/up/uploadify.swf",
      //文件上传的地址
      'uploader' : "/admin/shangchuan",
      //当文件上传成功
      'onUploadSuccess' : function(file, data, response){
        //拼接图片
        imgs1+="<img width='200px' src='/Uploads/goods/"+data+"'/>";
        arr.push(data);
        //展示图片
        $("#main1").html(imgs1);
        $("#imgs1").val(arr.join(','));
      }
    });
  });

</script>


  @endsection