<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Tag;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    public function testDestroy()
    {
        /*
            crear etiqueta
        */
        $tag = Tag::factory()->create();

        /*
            eliminar etiqueta creada
            verificar que redirecciona
        */
        $this->delete("tags/$tag->id", [
            'name' => 'Php'
        ])->assertRedirect('/');


        /*
            verificar que no existe
        */
        $this->assertDatabaseMissing('tags', ['name' => $tag->name]);
    }
}
