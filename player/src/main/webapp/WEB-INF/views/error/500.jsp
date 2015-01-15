<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ page import="java.lang.Exception"%>
<%@page import="java.util.Arrays"%>
<%
	Exception e = (Exception) request.getAttribute("exception");
	String errorMsg = e.getMessage();
	String localErrorMsg = e.getLocalizedMessage();
	String errorDetail = Arrays.toString(e.getStackTrace());
	String requestFile = application.getRealPath(request
			.getRequestURI());
	String serverInfo = application.getServerInfo();
	String jdkVersion = System.getProperty("java.version");
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>错误页面</title>
<style>
body {
	font-family: "Verdana";
	font-weight: normal;
	font-size: .7em;
	color: black;
}

p {
	font-family: "Verdana";
	font-weight: normal;
	color: black;
	margin-top: -5px
}

b {
	font-family: "Verdana";
	font-weight: bold;
	color: black;
	margin-top: -5px
}

H1 {
	font-family: "Verdana";
	font-weight: normal;
	font-size: 18pt;
	color: red
}

H2 {
	font-family: "Verdana";
	font-weight: normal;
	font-size: 14pt;
	color: maroon
}

pre {
	font-family: "Lucida Console";
	font-size: 1.3em;
	white-space: pre-wrap;
	word-wrap: break-word;
	white-space: pre-wrap;
}

.marker {
	font-weight: bold;
	color: black;
	text-decoration: none;
}

.version {
	color: gray;
}

.error {
	margin-bottom: 10px;
}

.expandable {
	text-decoration: underline;
	font-weight: bold;
	color: navy;
	cursor: hand;
}
</style>
</head>
<body>
	<span><h1>
			“/”应用程序中的服务器错误。
			<hr width="100%" size="1" color="silver">
		</h1>
		<h2>
			<i><%=errorMsg%></i>
		</h2></span>
	<font face="Arial, Helvetica, Geneva, SunSans-Regular, sans-serif ">

		<b> 说明: </b>在分析向此请求提供服务所需资源时出错。请检查下列特定分析错误详细信息并适当地修改源文件。 <br> <br>
		<b> 分析器错误消息: </b><%=localErrorMsg%><br> <br> <b>源错误:</b> <br>
		<table width="100%" bgcolor="#ffffcc">
			<tbody>
				<tr>
					<td><code>
							<pre><%=errorDetail%> </pre>
						</code></td>
				</tr>
			</tbody>
		</table>  <b> 源文件: </b><%=requestFile%> <br>
		<hr width="100%" size="1" color="silver"> <b>版本信息:</b> 服务器版本 <%=serverInfo%>;
		jdk版本 <%=jdkVersion%>;
	</font>
</body>
</html>