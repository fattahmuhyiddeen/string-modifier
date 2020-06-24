<?php

namespace Tests\Unit;

use App\Services\ModifierService;
use Tests\TestCase;


class ModifierTest extends TestCase
{
  public function testConvertToUpperCaseInputLowerCase()
  {
    $input = 'hello world';
    $expected_output = 'HELLO WORLD';
    $modifier = new ModifierService($input);
    $real_output = $modifier->convertToUpperCase();
    $this->assertEquals($real_output, $expected_output);
  }

  public function testConvertToUpperCaseInputUpperCase()
  {
    $input = 'HELLO WORLD';
    $expected_output = 'HELLO WORLD';
    $modifier = new ModifierService($input);
    $real_output = $modifier->convertToUpperCase();
    $this->assertEquals($real_output, $expected_output);
  }

  public function testConvertToUpperCaseInputMixCase()
  {
    $input = 'helLo WorLD';
    $expected_output = 'HELLO WORLD';
    $modifier = new ModifierService($input);
    $real_output = $modifier->convertToUpperCase();
    $this->assertEquals($real_output, $expected_output);
  }

  public function testConvertToUpperCaseInputContainSpecialNonAlpha()
  {
    $input = '1h9op ("*^$5';
    $expected_output = '1H9OP ("*^$5';
    $modifier = new ModifierService($input);
    $real_output = $modifier->convertToUpperCase();
    $this->assertEquals($real_output, $expected_output);
  }

  public function testConvertToUpperCaseInputEmpty()
  {
    $input = '';
    $expected_output = '';
    $modifier = new ModifierService($input);
    $real_output = $modifier->convertToUpperCase();
    $this->assertEquals($real_output, $expected_output);
  }

  public function testConvertToAlternatingCaseInputLowerCase()
  {
    $input = 'hello world';
    $expected_output = 'hElLo wOrLd';
    $modifier = new ModifierService($input);
    $real_output = $modifier->convertToAlternatingCase();
    $this->assertEquals($real_output, $expected_output);
  }

  public function testConvertToAlternatingCaseInputUpperCase()
  {
    $input = 'HELLO WORLD';
    $expected_output = 'hElLo wOrLd';
    $modifier = new ModifierService($input);
    $real_output = $modifier->convertToAlternatingCase();
    $this->assertEquals($real_output, $expected_output);
  }

  public function testConvertToAlternatingCaseInputMixCase()
  {
    $input = 'helLo WorLD';
    $expected_output = 'hElLo wOrLd';
    $modifier = new ModifierService($input);
    $real_output = $modifier->convertToAlternatingCase();
    $this->assertEquals($real_output, $expected_output);
  }

  public function testConvertToAlternatingCaseInputContainSpecialNonAlpha()
  {
    $input = '1h9op ("*^$5';
    $expected_output = '1H9Op ("*^$5';
    $modifier = new ModifierService($input);
    $real_output = $modifier->convertToAlternatingCase();
    $this->assertEquals($real_output, $expected_output);
  }

  public function testConvertToAlternatingCaseInputEmpty()
  {
    $input = '';
    $expected_output = '';
    $modifier = new ModifierService($input);
    $real_output = $modifier->convertToAlternatingCase();
    $this->assertEquals($real_output, $expected_output);
  }

  public function testGenerateCSVInputUpperCase()
  {
    $input = 'hello world';
    $expected_output = 'h,e,l,l,o, ,w,o,r,l,d';
    $modifier = new ModifierService($input);
    $modifier->generateCSV();
    $real_output =  file('output.csv')[0];
    $this->assertEquals($real_output, $expected_output);
  }

  public function testGenerateCSVInputSpecialCharacter()
  {
    $input = 'k*(fh k(';
    $expected_output = 'k,*,(,f,h, ,k,(';
    $modifier = new ModifierService($input);
    $modifier->generateCSV();
    $real_output =  file('output.csv')[0];
    $this->assertEquals($real_output, $expected_output);
  }
}
