<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><{$title}></title>
	</head>
	<body>
		<{* 这是个注释 *}>
		<h1>
			<{$content}>
		</h1>
		<p>
		<{$arr1.a}>
		</p>
		<p>
		<{$arr2[0]}>
		</p>
		<p>
		<{$arr3[0][0]}>
		</p>
		<p>
		<{$arr4.aa[0]}>
		</p>
		
		<p style="color:red;">
			<{foreach from=$arr1 item=v key=k}>
				<{$v}><br>
			<{/foreach}>
		</p>
		
		<p style="color:green;">
			<{section name=i loop=$arr3}>
				<{$arr3[i][1]}><br/>
			<{/section}>
		</p>
		
		
		<p style="color:yellow;">
			<{if $value>15}>
				<{$arr3[1][1]}><br/>
			<{/if}>
		</p>
		
	</body>
</html>