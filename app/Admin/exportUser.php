<?php
session_start();
$admin = isset($_SESSION['admin'])?$_SESSION['admin']:'';
if(!$admin){
    header('location:login.php');
}

include_once '../../mysql/Mysql.php';
$keyword = isset($_GET['sk'])?trim($_GET['sk']):'';
$sql = "select `realname`,`mobile` from `user` order by `id` DESC";
$data = (new Mysql())->select($sql);
if(!$data)die('数据为空');

$header_data = array('姓名','手机号码');
$file_name = "报名用户表_".date('YmdHis').'.csv';
export_csv($data,$header_data,$file_name);

function export_csv($data = [], $header_data = [], $file_name = '')
{
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename='.$file_name);
    header('Cache-Control: max-age=0');
    $fp = fopen('php://output', 'a');
    if (!empty($header_data)) {
        foreach ($header_data as $key => $value) {
            $header_data[$key] = iconv('utf-8', 'gbk', $value);
        }
        fputcsv($fp, $header_data);
    }
    $num = 0;
    //每隔$limit行，刷新一下输出buffer，不要太大，也不要太小
    $limit = 100000;
    //逐行取出数据，不浪费内存
    $count = count($data);
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $num++;
            //刷新一下输出buffer，防止由于数据过多造成问题
            if ($limit == $num) {
                ob_flush();
                flush();
                $num = 0;
            }
            $row = $data[$i];
            foreach ($row as $key => $value) {
                $row[$key] = iconv('utf-8', 'gbk', $value."\t");
            }
            fputcsv($fp, $row);
        }
    }
    fclose($fp);
}
?>