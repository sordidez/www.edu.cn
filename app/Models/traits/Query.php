<?php

namespace App\Models\traits;

trait Query
{
    // 查询
    public function search($request, $qname)
    {
        $kw = $request->get('kw', '');
        $datemin = empty($request->get('datemin')) ? '2018-12-22' : $request->get('datemin');
        $datemax = empty($request->get('datemax')) ? date('Y - m - d') : $request->get('datemax');
        $datemin .= ' 00:00:00';
        $datemax .= ' 23:59:59';

        $start = $request->get('start');
        $length = $request->get('length');

        // 得到了排序的字段id号和当前排序的规则
        $order = $request->order[0];  // 点击第几列时会发起ajax请求，携带order参数,order含有：column（第几列）和dir（顺序）
        // 得到了以序号为数组的字段
        $dir = $request->columns[$order['column']]['data'];

        $map = [];
        if ($kw) {
            $map[] = [$qname, 'like', "%{$kw}%"];
        }
        $query = $this->whereBetween('created_at', [$datemin, $datemax])->where($map);
        return [
            'draw' => $request->get('draw'),
            'recordsTotal' => $query->count(),
            'recordsFiltered' => $query->count(),          // 在服务器端进行分页              // 把数据全部返回，包括软删除的
            'data' => $query->orderBy($dir, $order['dir'])->offset($start)->limit($length)->withTrashed()->get(), // 集合對象
        ];                   // 获得参数进行，排序
    }
}
