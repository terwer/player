<%@ page language="java" contentType="text/html; charset=UTF-8"
         pageEncoding="UTF-8" isELIgnored="false" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>视频搜索</title>
    <style type="text/css">
        #searchForm{

        }
        #searchForm .inp{
            width: 100%;
            height: 50px;
            margin: 5px;
        }
        #searchForm .btn{
            width: 100px;
            height: 50px;
            font-size: 18px;
        }
    </style>
</head>
<body>
<form action="/video/result.do" method="get" id="searchForm">
    视频URL：<input type="text" id="keyword" name="keyword" class="inp" value="http://localhost:8080/temp.flv">
    <br/>
    <input type="submit" class="btn" value="播放一下">
    <br/>
    <p>示例：</p>
    <p>http://localhost:8080/temp.flv</p>
    <p>http://f5.r.56.com/f5.c127.56.com/flvdownload/24/11/sc_138632158682hd_clear.flv?v=1&t=hbL9yThTkWZ1dwzBcPe9Bw&r=22937&e=1428077397&tt=2765&sz=191745133&vid=102074155</p>
</form>
</body>
</html>