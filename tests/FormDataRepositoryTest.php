<?php

use App\Models\Admin\FormData;
use App\Repositories\Admin\FormDataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormDataRepositoryTest extends TestCase
{
    use MakeFormDataTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FormDataRepository
     */
    protected $formDataRepo;

    public function setUp()
    {
        parent::setUp();
        $this->formDataRepo = App::make(FormDataRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFormData()
    {
        $formData = $this->fakeFormDataData();
        $createdFormData = $this->formDataRepo->create($formData);
        $createdFormData = $createdFormData->toArray();
        $this->assertArrayHasKey('id', $createdFormData);
        $this->assertNotNull($createdFormData['id'], 'Created FormData must have id specified');
        $this->assertNotNull(FormData::find($createdFormData['id']), 'FormData with given id must be in DB');
        $this->assertModelData($formData, $createdFormData);
    }

    /**
     * @test read
     */
    public function testReadFormData()
    {
        $formData = $this->makeFormData();
        $dbFormData = $this->formDataRepo->find($formData->id);
        $dbFormData = $dbFormData->toArray();
        $this->assertModelData($formData->toArray(), $dbFormData);
    }

    /**
     * @test update
     */
    public function testUpdateFormData()
    {
        $formData = $this->makeFormData();
        $fakeFormData = $this->fakeFormDataData();
        $updatedFormData = $this->formDataRepo->update($fakeFormData, $formData->id);
        $this->assertModelData($fakeFormData, $updatedFormData->toArray());
        $dbFormData = $this->formDataRepo->find($formData->id);
        $this->assertModelData($fakeFormData, $dbFormData->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFormData()
    {
        $formData = $this->makeFormData();
        $resp = $this->formDataRepo->delete($formData->id);
        $this->assertTrue($resp);
        $this->assertNull(FormData::find($formData->id), 'FormData should not exist in DB');
    }
}
