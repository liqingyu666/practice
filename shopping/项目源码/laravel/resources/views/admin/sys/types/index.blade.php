@extends("admin.public.common")
@section('main')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>系统管理</a> <a href="#" class="current">分类广告列表</a> </div>
  </div>

          <div class="widget-title" style="margin-top:20px"> 
       <a href="/admin/sys/types/create" class="btn btn-info" style="margin-left: 20px">添加分类广告</a>
         
            <a href=""><button type="button" class="btn btn-info" style="margin-left:50px">批量删除</button></a>
    <p class="pull-right tots">共有<span id="tot"></span>条数据</p>
           
          </div>
          <div class="widget-content nopadding" id="poser">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                  <th>ID</th>
                  <th>TITLE</th>
                  <th>TYPE</th>
                  <th>IMG</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach($data as $value)
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>{{$value->id}}</td>
                  <td>{{$value->title}}</td>
                  <td>
                    @if($value->type)
                    大图
                    @else
                    小图
                    @endif
                  </td>
                  <td><img style="width:50px;" src="/Uploads/ads/{{$value->img}}" alt=""></td>
                
         
                    <td><a href="#" data-toggle="modal" data-target="#edit" class="btn btn-success" role="button" onclick="edit()">编辑</a><a href="javascript:;" onclick="deletes()" class="btn btn-danger" role="button">删除</a></td>
      
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