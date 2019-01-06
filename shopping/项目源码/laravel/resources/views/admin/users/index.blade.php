@extends("admin.public.common")
@section('main')


 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 会员管理</a> <a href="#" class="current">会员列表</a> </div>
  
  </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon">
          
            </span>
            <button type="button" class="btn btn-lg btn-primary" disabled="disabled">会员展示</button>
            <p class="pull-right tots">共有<span id="tot">{{$tot}}</span>条数据</p>

             <form action="" class="form-inline pull-right">
      <div class="form-group">
         <input type="text" name="search" class="form-control" placeholder="请输入你想搜索的内容">
         <input type="submit" value="搜索" class="btn btn-success">
      </div>
     
    </form>
          </div>
          <div class="widget-content nopadding" id="poser">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                 
                  <th>ID</th>
                  <th>手机号</th>
                  <th>EMAIL</th>
                  <th>注册时间</th>
                  <th>状态</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($data as $value)
                <tr>
                  <td>{{$value->id}}</td>
                  <td>{{$value->tel}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{date('Y-m-d H:i:s',$value->time)}}</td>
                  @if($value->status==0)
                  <td><span class="btn btn-primary">未激活</span></td>
                  @elseif($value->status==1)
                   <td><span class="btn btn-success">激活</span></td>
                  @else
                   <td><span class="btn btn-danger">黑名单</span></td>
                  @endif
                 
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