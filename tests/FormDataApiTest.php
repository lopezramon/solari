<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormDataApiTest extends TestCase
{
    use MakeFormDataTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFormData()
    {
        $formData = $this->fakeFormDataData();
        $this->json('POST', '/api/v1/formDatas', $formData);

        $this->assertApiResponse($formData);
    }

    /**
     * @test
     */
    public function testReadFormData()
    {
        $formData = $this->makeFormData();
        $this->json('GET', '/api/v1/formDatas/'.$formData->id);

        $this->assertApiResponse($formData->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFormData()
    {
        $formData = $this->makeFormData();
        $editedFormData = $this->fakeFormDataData();

        $this->json('PUT', '/api/v1/formDatas/'.$formData->id, $editedFormData);

        $this->assertApiResponse($editedFormData);
    }

    /**
     * @test
     */
    public function testDeleteFormData()
    {
        $formData = $this->makeFormData();
        $this->json('DELETE', '/api/v1/formDatas/'.$formData->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/formDatas/'.$formData->id);

        $this->assertResponseStatus(404);
    }
}
