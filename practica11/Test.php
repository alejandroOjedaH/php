<?php namespace Test;
use PHPUnit\Framework\TestCase;
use Miscelanea\Miscelanea;
require_once "Miscelanea.php";
class Test extends TestCase{
    public function testFactorial(){
        $this->assertEquals(1, Miscelanea::calcularFactorial(0));
        $this->assertEquals(1, Miscelanea::calcularFactorial(1));
        $this->assertEquals(24, Miscelanea::calcularFactorial(4));
        $this->assertEquals(40320, Miscelanea::calcularFactorial(8));
    }
    public function testPalindromo(){
        $this->assertEquals(true, Miscelanea::esPalindromo("DabaleArrozalaZorraelAbad"));
        $this->assertEquals(true, Miscelanea::esPalindromo("aaaaa"));
        $this->assertEquals(false, Miscelanea::esPalindromo("abaa"));
        $this->assertEquals(false, Miscelanea::esPalindromo("Esto no es un palindromo"));
        $this->expectException(InvalidArgumentException::class);
    }
}
