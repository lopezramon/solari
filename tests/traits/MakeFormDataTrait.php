<?php

use Faker\Factory as Faker;
use App\Models\Admin\FormData;
use App\Repositories\Admin\FormDataRepository;

trait MakeFormDataTrait
{
    /**
     * Create fake instance of FormData and save it in database
     *
     * @param array $formDataFields
     * @return FormData
     */
    public function makeFormData($formDataFields = [])
    {
        /** @var FormDataRepository $formDataRepo */
        $formDataRepo = App::make(FormDataRepository::class);
        $theme = $this->fakeFormDataData($formDataFields);
        return $formDataRepo->create($theme);
    }

    /**
     * Get fake instance of FormData
     *
     * @param array $formDataFields
     * @return FormData
     */
    public function fakeFormData($formDataFields = [])
    {
        return new FormData($this->fakeFormDataData($formDataFields));
    }

    /**
     * Get fake data of FormData
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFormDataData($formDataFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'email' => $fake->text,
            'name' => $fake->text,
            'lastname' => $fake->text,
            'phone' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $formDataFields);
    }
}
