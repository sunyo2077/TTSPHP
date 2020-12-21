<?php
require ('TTSUtil.php');
# 1. 先修改好Config.php文件中的配置值。
# 2. TEXT为每次请求的文本，SESSION_ID建议每次请求修改成唯一id，例如uuid。
Config :: $TEXT = "中文语音测试";
Config :: $SESSION_ID = guid();
//echo "Session id : " . Config :: $SESSION_ID . "\n";

# 2. 调用获取pcm格式音频
$result = getVoice();
$pcm_file = fopen('./test2.pcm', "w");
fwrite($pcm_file, $result);



# 3 .pcm转wav
require_once 'PcmToWave.php';
use PcmToWave\PcmToWave;
$pcm_file = 'test2.pcm';
$wav_file = 'test2.wav';
try {
    $data = PcmToWave::init($pcm_file, $wav_file);
} catch (\Exception $e) {
    var_dump($e);
}
var_dump($data);






?>
 