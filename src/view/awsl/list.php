<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp"/>
	<meta name="google" content="notranslate">
	<title>索引：<?php echo urldecode($path);?></title>
	<link rel="stylesheet" href="/view/awsl/css/awsl.min.css">
	<style>
	table.aw-table tr:hover {
		background: #f0f0f0;
	}
	</style>
</head>
<body class="aw-body">
	<div class="aw-container aw-container-ah" style="min-width: 768px">
		<div class="aw-g">
			<div class="aw-g-w-10">
				<h1 class="aw-title" style="font-family: SFMono-Regular, Consolas, Liberation Mono, Menlo, monospace; font-weight: 400; font-size: 20px; word-break: break-all">
					索引：<?php echo urldecode($path);?>
				</h1>
			</div>
			<div class="aw-g-w-2" style="clear: both">
				<a class="aw-btn aw-btn-s aw-bg-luotianyi" style="float: right" href="/admin" target="_blank">登录</a>
			</div>
		</div>
		
		<table class="aw-table aw-table-fixed" style="width: 100%;margin-top: 30px;">
			<tr>
				<th class="file-name" style="min-width: 20em">文件名</th>
				<th class="file-size" style="width: 10em">大小</th>
				<th class="file-date-modified" style="width: 20em">修改日期</th></tr>
			<?php if($path != '/'):?>
				<tr>
					<td colspan="3">
						<a class="aw-link" href="<?php echo get_absolute_path($root.$path.'../');?>">[返回父目录..]</a>
					</td>
				</tr>
			<?php endif;?>
			<?php foreach((array)$items as $item):?>
				<?php if(!empty($item['folder'])):?>
					<tr>
						<td>
							<a class="aw-link" href="<?php echo get_absolute_path($root.$path.rawurlencode($item['name']));?>">
								<?php echo $item['name'];?>
							</a>
						</td>
						<td><?php echo onedrive::human_filesize($item['size']);?></td>
						<td><?php echo date("Y-m-d H:i:s", $item['lastModifiedDateTime']);?></td>
					</tr>
				<?php else:?>
					<tr>
						<td>
							<a class="aw-link" href="<?php echo get_absolute_path($root.$path).rawurlencode($item['name']);?>">
								<?php echo $item['name'];?>
							</a>
						</td>
						<td><?php echo onedrive::human_filesize($item['size']);?></td>
						<td class="file-date-modified"><?php echo date("Y-m-d H:i:s", $item['lastModifiedDateTime']);?></td>
					</tr>
				<?php endif;?>
			<?php endforeach;?>
		</table>
		<?php if($path == '/'):?>
		<div class="aw-pnl" style="margin-top: 100px;">
			<h2 style="aw-title">API 访问</h2>
			<h3 style="aw-title">JSON API</h3>
			<p>使用如下 HTTP Header 访问原地址：<p>
			<p><pre class="aw-code">Accept: application/psr.moe.lty.@microsoft.graph.onedrive.files-list+json</pre></p>
			<p><b>cURL 命令行示例</b><p>
			<p><pre class="aw-code">curl -H "Accept: application/psr.moe.lty.@microsoft.graph.onedrive.files-list+json" -k "https://odi.josephcz.xyz/"</pre></p>
			<p><b>响应类型</b><p>
			<p><pre class="aw-code">Content-Type: application/psr.moe.lty.@microsoft.graph.onedrive.files-list+json</pre></p>
			<p><b>正确响应示例</b><p>
			<p><pre class="aw-code">[
    {
        "name": "Joseph's OSS Builds", 
        "folder": true
    }, 
    {
        "name": "\u54d4\u54e9\u54d4\u54e9\u5907\u4efd\u8ba1\u5212\/dotMOE", 
        "folder": true
    }
]</pre></p>
			<p><b>错误响应示例</b><p>
			<p><pre class="aw-code">{
    "code": 404, 
    "desc": "Not Found"
}</pre></p>
			<h3 style="aw-title">XML API</h3>
			<p>使用如下 HTTP Header 访问原地址：<p>
			<p><pre class="aw-code">Accept: application/psr.moe.lty.@microsoft.graph.onedrive.files-list+xml</pre></p>
			<p><b>cURL 命令行示例</b><p>
			<p><pre class="aw-code">curl -H "Accept: application/psr.moe.lty.@microsoft.graph.onedrive.files-list+xml" -k "https://odi.josephcz.xyz/"</pre></p>
			<p><b>响应类型</b><p>
			<p><pre class="aw-code">Content-Type: application/psr.moe.lty.@microsoft.graph.onedrive.files-list+xml</pre></p>
			<p><b>正确响应示例</b><p>
			<p><pre class="aw-code">&lt;?xml version="1.0" encoding="utf-8"?>
&lt;Response>
  &lt;Folder>
    &lt;Name>Joseph's OSS Builds&lt;/Name>
  &lt;/Folder>
  &lt;Folder>
    &lt;Name>&amp;#x54D4;&amp;#x54E9;&amp;#x54D4;&amp;#x54E9;&amp;#x5907;&amp;#x4EFD;&amp;#x8BA1;&amp;#x5212;/dotMOE&lt;/Name>
  &lt;/Folder>
&lt;/Response></pre></p>
			<p><b>错误响应示例</b><p>
			<p><pre class="aw-code">&lt;?xml version="1.0" encoding="utf-8"?>
&lt;Response>
  &lt;Error>
    &lt;Code>404&lt;/Code>
    &lt;Description>Not Found&lt;/Description>
  &lt;/Error>
&lt;/Response></pre></p>
		</div>
	<?php endif;?>
	</div>
	<footer class="aw-footer">
		<div class="aw-footer-copyright aw-footer-copyright-s">
			<ul>
				<li>&copy; <?php echo date("Y"); ?></li>
				<li><a href="https://josephcz.xyz" target="_blank">Joseph Chris</a> & <a href="https://lty.moe" target="_blank">lty.moe</a></li>
			</ul>
		</div>
	</footer>
</body>
</html>
