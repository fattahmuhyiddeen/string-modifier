<?php

namespace App\Services;

class ModifierService
{
  protected $text;

  function __construct($text)
  {
    $this->text = $text;
  }

  /**
   * Convert text to uppercase
   * @param string text
   * @return string
   */
  public function convertToUpperCase()
  {
    return strtoupper($this->text);
  }

  /**
   * Convert text to alternating case
   * @param string text
   * @return string
   */
  public function convertToAlternatingCase()
  {
    $text = $this->text;

    for ($i = 0; $i < strlen($text); $i++) {
      // if index is even, use strtolower, if odd, use strtoupper
      $converter = ($i % 2 == 0) ? 'strtolower' : 'strtoupper';

      $text[$i] = $converter($text[$i]);
    }
    return $text;
  }

  /**
   * Convert text to alternating case
   * @param string text
   * @return void
   */
  public function generateCSV()
  {
    $textCSV = join(',', str_split($this->text));
    $csv_file = fopen('output.csv', 'w');
    fwrite($csv_file, $textCSV);
    fclose($csv_file);
  }
}
