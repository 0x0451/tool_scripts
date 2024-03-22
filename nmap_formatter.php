<?php 

$port= shell_exec('cat ' . $argv[1] . ' | grep -e tcp -e udp | grep -e open | sed \'s/\( \)*/\1/g\' | cut -d \' \' -f 1');
echo "\n";
$prot = shell_exec('cat ' . $argv[1] . ' | grep -e tcp -e udp | grep -e open | sed \'s/\( \)*/\1/g\' | cut -d \' \' -f 3');
echo "\n";
$vers = shell_exec('cat ' . $argv[1] . ' | grep -e tcp -e udp | grep -e open | sed \'s/\( \)*/\1/g\' | cut -d \' \' -f 7-');      

$ptArr = explode(PHP_EOL, $port); 
$prArr = explode(PHP_EOL, $prot); 
$vrArr = explode(PHP_EOL, $vers); 

shell_exec('clear');
echo "## NMAP Scan \n\n```\n\n";
system('cat ' . $argv[1]);

echo "\n\n```";
echo '
|Port|Protocol|Version|Notes|
|-|-|-|-|';
for ($i=0;$i<sizeof($ptArr)-1;$i++)
{
echo'
|' . $ptArr[$i] . '|' . $prArr[$i] . '|' . $vrArr[$i] . '||';
}

echo "\n\n";

for ($i=0;$i<sizeof($ptArr)-1;$i++)
{
echo'
## ' . $ptArr[$i] . '' . "\n\n" . '';
}

?>
