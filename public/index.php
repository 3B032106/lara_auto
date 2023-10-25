<?php
//引入自動載入
require '../vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Carbon\Carbon;

//initiative import namespace
use Demo\Hello\Lara;
use Demo\Hello\Someone;
$lara = new Lara();
$vincent = new Someone('Vincent');

//passive import namespace
$mary = new \Demo\Hello\Someone('Mary');
$john = new Demo\Hello\Someone('John');
$hello = new Demo\HelloWorld();

//類別別名
use Demo\HelloWorld as World;
$world = new World();

//monolog/monolog

// create a log channel
$log = new Logger('WISD');
$log->pushHandler(new StreamHandler('../Log/my.log', Level::Warning));

// add records to the log
$log->warning('Foo');
$log->error('Bar');

// Carbon\Carbon;

printf("<br/> Right now is %s", Carbon::now()->toDateTimeString());
printf("<br/>Right now in Vancouver is %s <br/>", Carbon::now('America/Vancouver'));  //implicit __toString()
$tomorrow = Carbon::now()->addDay();
$lastWeek = Carbon::now()->subWeek();
$nextSummerOlympics = Carbon::createFromDate(2016)->addYears(4);

$officialDate = Carbon::now()->toRfc2822String();

$howOldAmI = Carbon::createFromDate(1975, 5, 21)->age;

$noonTodayLondonTime = Carbon::createFromTime(12, 0, 0, 'Europe/London');

$internetWillBlowUpOn = Carbon::create(2038, 01, 19, 3, 14, 7, 'GMT');

// Don't really want this to happen so mock now
Carbon::setTestNow(Carbon::createFromDate(2000, 1, 1));

// comparisons are always done in UTC
if (Carbon::now()->gte($internetWillBlowUpOn)) {
    die();
}

// Phew! Return to normal behaviour
Carbon::setTestNow();

if (Carbon::now()->isWeekend()) {
    echo 'Party!';
}
// Over 200 languages (and over 500 regional variants) supported:
echo Carbon::now()->subMinutes(2)->diffForHumans(). "<br>"; // '2 minutes ago'
echo Carbon::now()->subMinutes(2)->locale('zh_CN')->diffForHumans(). "<br>"; // '2分钟前'
echo Carbon::parse('2019-07-23 14:51')->isoFormat('LLLL'). "<br>"; // 'Tuesday, July 23, 2019 2:51 PM'
echo Carbon::parse('2019-07-23 14:51')->locale('fr_FR')->isoFormat('LLLL'). "<br>"; // 'mardi 23 juillet 2019 14:51'

// ... but also does 'from now', 'after' and 'before'
// rolling up to seconds, minutes, hours, days, months, years

$daysSinceEpoch = Carbon::createFromTimestamp(0)->diffInDays();