<?php

use PHPUnit\Framework\TestCase;

include './src/Enana.php';

class EnanaTest extends TestCase {

    public function testHeridaLeveVive() {
       
        #Se probará el efecto de una herida leve a una Enana con puntos de vida suficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es mayor que 0 y además que su situación es viva

        $enana = new Enana("Enana 1", 50, "viva");
        $enana->heridaLeve();
        $this->assertTrue($enana->puntosVida > 0);
        $this->assertEquals($enana->situacion, "viva");
    

    }

    public function testHeridaLeveMuere() {
       
        #Se probará el efecto de una herida leve a una Enana con puntos de vida insuficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es menor que 0 y además que su situación es muerta

        $enana = new Enana("Enana 2", 20, "viva");
        $enana->heridaLeve();
    
        $this->assertTrue($enana->puntosVida < 0);
        $this->assertEquals("muerta", $enana->situacion);
    }

    public function testHeridaGrave() {
       
        #Se probará el efecto de una herida grave a una Enana con una situación de viva.
        #Se tendrá que probar que la vida es 0 y además que su situación es limbo

        $enana = new Enana("Enana 3", 100, "viva");
        $enana->heridaGrave();
        $this->assertEquals(0, $enana->puntosVida);
        $this->assertEquals("limbo", $enana->situacion);
    }
    
    public function testPocimaRevive() {
       
        #Se probará el efecto de administrar una pócima a una Enana muerta pero con una vida mayor que -10 y menor que 0
        #Se tendrá que probar que la vida es mayor que 0 y que su situación ha cambiado a viva

        $enana = new Enana("Enana 4", -5, "muerta");
        $enana->pocima();
        $this->assertGreaterThan(0, $enana->puntosVida);
        $this->assertEquals("viva", $enana->situacion);

    }

    public function testPocimaExtraLimbo() {
       
        #Se probará el efecto de administrar una pócima Extra a una Enana en el limbo.
        #Se tendrá que probar que la vida es 50 y la situación ha cambiado a viva.

        $enana = new Enana("Enana 5", 0, "limbo");
        $enana->pocimaExtra();
        $this->assertEquals(50, $enana->puntosVida);
        $this->assertEquals("viva", $enana->situacion);
    }
}

?>