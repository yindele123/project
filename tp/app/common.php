<?php
// 应用公共文件

/***
 * 通用化API数据格式输出
 * @param int $status
 * @param string $message
 * @param array $data
 * @param int $code
 * @return \think\response\Json
 */
if (!function_exists('show')) {
    function show($status=0, $message='error', $data = [], $code = 200)
    {
        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
        return json($result, $code);
    }
}