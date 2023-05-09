<?php
require '/var/www/zabibuPhp.test/vendor/autoload.php';
use Sirius\Validation\Validator;

class MyFormValidator
{
    protected $validator;

    public function __construct()
    {
        $this->validator = new Validator();
    }

    public function validate(array $data)
    {


        $this->validator->add('name', 'required')
            ->add('email', 'required | email')
            ->add('phone', 'required')
            ->add('address', 'required');

        $this->validator->validate($data);

        return $this->validator->getMessages();
    }
}
$validator = new MyFormValidator();


?>