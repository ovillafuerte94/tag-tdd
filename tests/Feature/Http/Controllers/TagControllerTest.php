<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        /*
            insertar etiqueta,
            verificar que redirecciona a la ruta
            especificada
        */
        $this->post('tags', [
            'name' => 'Php'
        ])->assertRedirect('/');

        /*
            verificar que existe
            en la tabla de etiquetas
        */
        $this->assertDatabaseHas('tags', ['name' => 'Php']);
    }
}
