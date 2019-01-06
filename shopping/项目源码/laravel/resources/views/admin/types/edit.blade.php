 <form action="" onsubmit="return false;" id="formEdit">
          <div class="form-group">
            <label for="">用户名</label>
            <input type="text" name="name" disabled value="{{$data->name}}" class="form-control" placeholder="请输入用户名">
            <input type="hidden" name="id" value="{{$data->id}}">
          </div>
            <div class="form-group">
            <label for="">密码</label>
            <input type="password" name="pass" value="{{$data->pass}}" class="form-control" placeholder="请输入密码">
              <div id="passInfo1"></div>
          </div>
            <div class="form-group">
            <label for="">确认密码</label>
            <input type="password" name="repass" value="{{$data->pass}}" class="form-control" placeholder="请确认密码">
          </div>
            <div class="form-group">
            <label for="">状态</label>
            @if($data->status)
            <input type="radio" name="status" value="0" id="">正常
            <input type="radio" name="status" value="1" checked id="">禁用
            @else
            <input type="radio" name="status" value="0" id="" checked>正常
            <input type="radio" name="status" value="1" id="">禁用
            @endif
          </div>

           <div class="form-group pull-right">
      <input type="submit" value="提交" class="btn btn-success" onclick="save()">
      <input type="reset" value="重置" id="reset1" class="btn btn-danger">
      </div>
        
        </form>