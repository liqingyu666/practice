@extends("admin.public.common")
@section('main')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>商品管理</a> <a href="#" class="current">商品列表</a> </div>
  </div>

          <div class="widget-title" style="margin-top:20px"> 
          
           <a href="/admin/goods/create" class="btn btn-info" style="margin-left: 20px">添加商品</a>
         
            <a href=""><button type="button" class="btn btn-info" style="margin-left:50px">批量删除</button></a>
    <p class="pull-right tots">共有<span id="tot"></span>条数据</p>
           
          </div>
          <div class="widget-content nopadding" id="poser">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                  <th>id</th>
                  <th>Title</th>
                  <th>INFO</th>
                  <th>IMG</th>
                  <th>PRTCE</th>
                  <th>NUM</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach($data as $value)
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>{{$value->id}}</td>
                  <td>{{$value->title}}</td>
                  <td>{{$value->info}}</td>
                  <td><img style="width:50px;" src="/Uploads/goods/{{$value->img}}" alt=""><br>
                    @foreach($value->tupian as $val)
                    <img style="width:20px;" src="/Uploads/goods/{{$val->img}}" alt="">
                    @endforeach
                  </td>
                  <td>{{$value->price}}</td>
                  <td>{{$value->num}}</td>
                
         
                    <td><a href="#" data-toggle="modal" data-target="#edit" class="btn btn-success" role="button">编辑</a><a href="" class="btn btn-danger" role="button">删除</a></td>
      
                </tr>
             @endforeach
                 
              </tbody>
            </table>
          </div>
      
  <div class="pagination" id="poter">
           {!! $data->render() !!}
  </div>

        </div>

     



  @endsection