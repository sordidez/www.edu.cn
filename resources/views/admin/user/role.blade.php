<form action="" method='post'>
    @csrf
    <ul>
        @foreach ($role as $item)
        <li>
            <input type="radio" @if($item->id==$user->role_id) checked @endif name="ids" value="{{$item->id}}">
            {{$item->role_name}}
        </li>
        @endforeach
    </ul>
    <button type="submit" value="分配权限" class="btn">分配权限</button>
</form>

