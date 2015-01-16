package com.terwer.player.util;

import java.io.IOException;
import java.net.URI;
import java.net.URISyntaxException;
import java.net.URL;

import org.apache.http.HttpEntity;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.CookieStore;
import org.apache.http.client.CredentialsProvider;
import org.apache.http.client.config.RequestConfig;
import org.apache.http.client.methods.CloseableHttpResponse;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.client.methods.HttpPut;
import org.apache.http.client.methods.HttpRequestBase;
import org.apache.http.client.protocol.HttpClientContext;
import org.apache.http.impl.client.BasicCookieStore;
import org.apache.http.impl.client.BasicCredentialsProvider;
import org.apache.http.impl.client.CloseableHttpClient;
import org.apache.http.impl.client.HttpClientBuilder;
import org.apache.http.impl.client.HttpClients;

/**
 * Http工具类 依赖于httpclient
 * 
 * @author Tangyouwei
 *
 */
public class HttpHelper {

	/**
	 * 基地址
	 */
	private static String baseUrl;

	/**
	 * CloseableHttpClient
	 */
	private static CloseableHttpClient httpClient = null;
	/**
	 * RequestConfig
	 */
	private static RequestConfig requestConfig = null;
	/**
	 * HttpClientContext
	 */
	private static HttpClientContext httpClientContext = null;

	/**
	 * @return the baseUrl
	 */
	public static String getBaseUrl() {
		return baseUrl;
	}

	/**
	 * @param baseUrl
	 *            the baseUrl to set
	 */
	public static void setBaseUrl(String baseUrl) {
		System.out.println("开始设置baseUrl...");
		HttpHelper.baseUrl = baseUrl;
	}

	public static void setHttpclient(CloseableHttpClient httpClient) {
		System.out.println("开始设置httpClient...");
		HttpHelper.httpClient = httpClient;
	}



	public static void setRequestConfig(RequestConfig requestConfig) {
		System.out.println("开始设置requestConfig...");
		HttpHelper.requestConfig = requestConfig;
	}

	public static void setHttpClientContext(HttpClientContext httpClientContext) {
		System.out.println("开始设置httpClientContext...");
		HttpHelper.httpClientContext = httpClientContext;
	}

	/**
	 * 静态代码块，初始化默认的http配置
	 */
	static {
		System.out
				.println("开始调用静态代码块,初始化默认的httpclient、requestconfig和httpClientContext配置...");
		// Create an HttpClient with the given custom dependencies and
		// configuration.
		setHttpclient(HttpClients.custom()
		// .setConnectionManager(connManager)
		// .setDefaultCookieStore(cookieStore)
		// .setDefaultCredentialsProvider(credentialsProvider)
		// .setProxy(new HttpHost("myproxy", 8080))
		// .setDefaultRequestConfig(defaultRequestConfig)
				.build());
		setRequestConfig(RequestConfig.custom().setSocketTimeout(5000)
				.setConnectTimeout(5000).setConnectionRequestTimeout(5000)
				// .setProxy(new HttpHost("myotherproxy", 8080))
				.build());

		setHttpClientContext(HttpClientContext.create());
		// Contextual attributes set the local httpClientContext level will take
		// precedence over those set at the client level.
		// httpClientContext.setCookieStore(cookieStore);
		// httpClientContext.setCredentialsProvider(credentialsProvider);
		System.out
				.println("httpclient、requestconfig和httpClientContext初始化完毕...");
	}

	/**
	 * 获取Cookie
	 * 
	 * @return
	 */
	public static CookieStore getCookie() {
		return null;
	}

	/**
	 * 获取响应内容 15-01-16 By 唐有炜 (jdk 1.7.0_71)
	 * @param requestBase 可以传递HttpGet、HttpPost、HttpPut、HttpDelete对象
	 * @param queryString 查询参数
	 * @param postData post数据（当创建HttpPost对象时才需要）
	 * @return 响应结果
	 */
	public static String getContent(HttpRequestBase requestBase,
			String queryString, String postData) {
		String content=getContext(requestBase,queryString,postData).toString();
		return content;
	}

	
	/**
	 * 获取响应内容 15-01-16 By 唐有炜 (jdk 1.7.0_71)
	 * @param requestBase 可以传递HttpGet、HttpPost、HttpPut、HttpDelete对象
	 * @param queryString 查询参数
	 * @param postData post数据（当创建HttpPost对象时才需要）
	 * @return HttpClientContext
	 */
	public static HttpClientContext getContext(HttpRequestBase requestBase,
			String queryString, String postData) {
		if (null == baseUrl) {
			System.out.println("http基地址尚未设置，请使用HttpHelper.setBaseUrl(\"xxx\")设置！");
			return null;
		}
		CloseableHttpResponse response = null;
		try {
			//请求配置
			final URI uri = new URI(baseUrl);
			requestBase.setURI(uri);
			requestBase.setConfig(requestConfig);
			System.out.println("当前请求方法：" + requestBase.getMethod());
			System.out.println("开始执行请求,当前请求地址：" + requestBase.getURI());
			
			//处理请求
			response = httpClient.execute(requestBase, httpClientContext);
			System.out.println("开始接受响应...");

			//接收响应
			HttpEntity entity = response.getEntity();
			System.out.println("----------------------------------------");
			System.out.println(response.getStatusLine());
			if (entity != null) {
				System.out.println("Response content length: "
						+ entity.getContentLength());
			}
			System.out.println("----------------------------------------");

			// Once the request has been executed the local httpClientContext
			// can
			// be used to examine updated state and various objects affected
			// by the request execution.

			// Last executed request
			//httpClientContext.getRequest().getAllHeaders();
			// Execution route
			//httpClientContext.getHttpRoute();
			// Target auth state
			//httpClientContext.getTargetAuthState();
			// Proxy auth state
			//httpClientContext.getTargetAuthState();
			// Cookie origin
			//httpClientContext.getCookieOrigin();
			// Cookie spec used
			//httpClientContext.getCookieSpec();
			// User security token
			//httpClientContext.getUserToken();
			 return httpClientContext;
		} catch (Exception e) {
			System.out.println(e.getMessage());
			return null;
		}

		finally {
			try {
				httpClient.close();
				response.close();
				System.out.println("请求完成，连接已关闭。");
			} catch (IOException e) {
				System.out.println("关闭连接异常！"+e.getMessage());
			}
			
		}
	}
	
	

}
