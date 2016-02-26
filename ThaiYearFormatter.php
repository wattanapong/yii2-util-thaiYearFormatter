<?php
 /**
   * ThaiYearFormatter
   *
   * Convert Year to Thai Buddhist Era Year
   *
   * @package    dixonsatit
   * @subpackage thaiYearFormatter
   * @author     Satit Seethaphon <dixonsatit@gmail.com>
   */
namespace wattanapong\util\thaiYearFormatter;
use yii\i18n\Formatter;
use IntlDateFormatter;
use DateTime;
use DateTimeZone;
use yii\helpers\FormatConverter;
use Yii;
class ThaiYearFormatter extends Formatter{

    public function init()
    {
       
    }
    public function asDate($value, $format = null){
        if ($format === null) {
            $format = $this->dateFormat;
        }
        return $this->replaceYear($this->formatDateTimeValue($value, $format));
    }
    public function asDatetime($value, $format = null)
    {
        return $this->replaceYear($this->formatDateTimeValue($value, $format));
    }
    private function formatDateTimeValue($value, $format)
    {
        return Yii::$app->Formatter->asDatetime($value,$format);
    }
    
    public function replaceYear($strDate)
    {
      return str_replace('ค.ศ.','พ.ศ.',$strDate);
    }
}