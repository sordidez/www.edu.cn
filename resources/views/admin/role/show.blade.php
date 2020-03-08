<form action="{{route('admin.role.add_auth',$role)}}" method='post'>
    @csrf
    <dl>
        @foreach ($auth as $item)
        <dt>
            <input type="checkbox" 
            @if(in_array($item['id'],$my_auth)) checked @endif name="ids[]" value="{{$item['id']}}">
            {{$item['auth_name']}}
        </dt>
            @foreach($item['sub'] as $val)
            <dd>
                <input type="checkbox"
                @if(in_array($val['id'],$my_auth)) checked @endif name="ids[]" value="{{$val['id']}}">
                {{$val['auth_name']}}
            </dd>
            @endforeach
        @endforeach
    </dl>
    <button type="submit" value="分配权限" class="btn">分配权限</button>
</form>


