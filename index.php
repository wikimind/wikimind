<?$N='wiki';$P='$2y$12$c5Zq/0ggJcT.tbUpr3igaefZG0xy1WLkzTc/yx5YwrA4A1.ZF2UuO';//WikiMind 2023.03
function p($r){return preg_match('/^<\/?(ul|ol|li|h|p|bl)/',trim($r[1]))?"\n".$r[1]."\n": sprintf("\n<p>%s</p>\n",trim($r[1]));}
function u($r){return sprintf("\n<ul>\n\t<li>%s</li>\n</ul>",trim($r[1]));}
function o($r){return sprintf("\n<ol>\n\t<li>%s</li>\n</ol>",trim($r[1]));}
function q($r){return sprintf("\n<blockquote>%s</blockquote>",trim($r[2]));}
function v($r){return sprintf("\n<div id=v>%s</div>",trim($r[2]));}
function h($r){list($z,$c,$h)=$r;return sprintf('<a name="%s"></a><h%d>%s</h%d>',trim($h),strlen($c),trim($h),strlen($c));}
function r($t){$t="\n".$t."\n";$l=['/\n(#+)(.*)/'=>'h','/\n-{3,}/'=>"\n<hr/>",'/!\[([^\[]+)\]\(([^\)]+)\)/'=>'<img src=\'\2\' alt=\'\1\'>','/\[([^\]]+)\]\(([^\)]+)\)/'=>'<a href=\'\2\'>\1</a>','/\[\[([^\]]+)\]\]/'=>'<a href=\'?\1\'>\1</a>','/(\*\*)(.*?)\1/'=>'<b>\2</b>','/\n\*(.*)/'=>'u','/\n\-(.*)/'=>'u','/\n[0-9]+\.(.*)/'=>'o','/(\*)(.*?)\1/'=>'<i>\2</i>','/\n(&gt;|\>)(.*)/'=>'q','/\n(&gt;|\!!!)(.*)/'=>'v','/\n([^\n]+)\n/'=>'p','/<\/ul>\s?<ul>/'=>'','/<\/ol>\s?<ol>/'=>'','/<\/blockquote><blockquote>/'=>"<br>"];foreach ($l as $r=>$s)$t=is_callable($s)?preg_replace_callback($r,$s,$t):preg_replace($r,$s,$t);return trim($t);}
function f($f){return @file_get_contents("$f.w");}
function e($p){global $N; echo "<form action=?$p method=post><p><b>$p</b> | <a href=./>$N</a><input style='float:right' type=submit value=save accesskey=e><input style='float:right' type=password autocomplete=current-password name=P placeholder=pwd size=8></p>\n<textarea rows=15 autofocus name=c placeholder='Syntax: #title, *i*, **b**, * or 1. list, &#62; quote, [[page]], [name](url), ![img](url), --- line, !!! note.'>".htmlspecialchars(f($p))."</textarea>\n</form>\n";}
$p=preg_replace('~(e|b)=(.*)~','',$_SERVER['QUERY_STRING']);
$e=@$_GET['e'];$p=!$p?"home":$p;$p=isset($e)?$e:urldecode($p);
$f="$p.w";$c=@$_POST['c'];?>
<!DOCTYPE html><html lang=en><head><meta charset=utf-8 name=viewport content="width=device-width,initial-scale=1">
<title><?=$p?> | <?=$N?></title>
<style>body{color:#444;font-size:1.2em;max-width:30em;margin:0 auto;line-height:1.4;padding:0 1em}textarea{width:100%;font:1em "Times New Roman"}a{color:#4070a0}blockquote{font-family:monospace;background:#EEE;margin:0;padding:1px 1em}div#v {background:#fdf5e6;padding:1em}@media (prefers-color-scheme: dark){body{background:#494949;color:#f2f2f2;}a{color:#E1B256}div#v {background:#490000}blockquote{background:#180e0e}textarea,input{background-color:#494949;color:#f2f2f2}}</style></head>
<body>
<?if(@password_verify($_POST['P'],$P)){if(!empty($c)){@file_put_contents($f,htmlspecialchars_decode($c));header("Location: ?$p");}
elseif(empty($c)){unlink($f);header("Location: ?home");}}
elseif(!isset($e)){echo file_exists($f)?"<p><b>$p</b> | <a href=./>$N</a><a style='float:right' href='?e=$p' accesskey=e>edit</a></p>\n".r(f($p))."<hr>":e($p);}
else e($e);?></body></html>
